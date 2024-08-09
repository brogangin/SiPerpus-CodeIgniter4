<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PeminjamanController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Peminjaman',
            'daftar_p' => $this->PeminjamanModel->where(['status_kembali' => 0])->findAll(),
        ];
        return view('peminjaman/index', $data);
    }

    public function detail($kode)
    {
        $peminjaman = $this->PeminjamanModel->getPeminjaman($kode);

        $details = $this->PeminjamanDetailModel->where(['id_peminjaman' => $peminjaman['id_peminjaman']])->findAll();
        foreach ($details as $i => $detail) {
            $daftar_buku[$i] = $this->BukuModel->find($detail['id_buku']);
        }
        $data = [
            'title' => 'Detail Peminjaman',
            'peminjaman' => $this->PeminjamanModel->getPeminjaman($kode),
            'anggota' => $this->AnggotaModel->find($peminjaman['id_anggota']),
            'admin' => $this->AdminModel->find($peminjaman['id_petugas']),
            'daftar_buku' => $daftar_buku,
        ];
        return view('peminjaman/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Peminjaman',
            'daftar_buku' => $this->BukuModel->findAll(),
            'validation' =>  session()->getFlashdata('_ci_validation_errors') ?? [],

        ];
        return view('peminjaman/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'peminjam' => [
                'rules' => 'required|is_not_unique[anggota.nik]',
                'errors' => [
                    'required' => 'NIK Peminjam harus diisi',
                    'is_not_unique' => 'NIK belum terdaftar',
                ]
            ],
            'tgt_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tenggat harus diisi',
                ]
            ],
            'pilihBuku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan pilih buku',
                ]
            ],
        ])) {
            return redirect()->to('/peminjaman/tambah')->withInput();
        }

        $this->PeminjamanModel->insert([
            'kode' => time(),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgt_kembali' => $this->request->getVar('tgt_kembali'),
            'id_petugas' => session()->get('id_petugas'),
            'id_anggota' => $this->AnggotaModel->getAnggota($this->request->getVar('peminjam'))['id_anggota'],
        ]);
        $idPeminjaman = $this->PeminjamanModel->getInsertId();

        foreach ($this->request->getVar('pilihBuku') as $buku) {
            $buku = $this->BukuModel->getBuku($buku);
            $this->PeminjamanDetailModel->save([
                'id_peminjaman' => $idPeminjaman,
                'id_buku' => $buku['id_buku'],
            ]);
            $this->BukuModel->save([
                'id_buku' => $buku['id_buku'],
                'jumlah_stok' => $buku['jumlah_stok'] - 1,
            ]);
        }

        return redirect()->to('/peminjaman');
    }

    public function update($id)
    {
        $details = $this->PeminjamanDetailModel->where(['id_peminjaman' => $id])->findAll();
        foreach ($details as  $detail) {
            $buku = $this->BukuModel->find($detail['id_buku']);
            $this->BukuModel->save([
                'id_buku' => $buku['id_buku'],
                'jumlah_stok' => $buku['jumlah_stok'] + 1,
            ]);
        }
        $this->PeminjamanModel->save([
            'id_peminjaman' => $id,
            'status_kembali' => 1,
        ]);
        $this->PengembalianModel->insert([
            'kode' => time(),
            'tgl_kembali' => date('Y-m-d'),
            'denda' => $this->request->getVar('denda'),
            'id_peminjaman' => $id,
            'id_anggota' => $this->request->getVar('id_anggota'),
            'id_petugas' => session()->get('id_petugas'),
        ]);
        return redirect()->to('/peminjaman');
    }
}
