<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PengembalianController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Pengembalian',
            'daftar_p' => $this->PengembalianModel->findAll(),
        ];
        return view('pengembalian/index', $data);
    }

    public function detail($kode)
    {
        $pengembalian = $this->PengembalianModel->getPengembalian($kode);
        $details = $this->PeminjamanDetailModel->where(['id_peminjaman' => $pengembalian['id_peminjaman']])->findAll();
        foreach ($details as $i => $detail) {
            $daftar_buku[$i] = $this->BukuModel->find($detail['id_buku']);
        }
        $data = [
            'title' => 'Pengembalian Detail',
            'pengembalian' => $pengembalian,
            'anggota' => $this->AnggotaModel->find($pengembalian['id_anggota']),
            'admin' => $this->AdminModel->find($pengembalian['id_petugas']),
            'daftar_buku' => $daftar_buku,
        ];
        return view('pengembalian/detail', $data);
    }
}
