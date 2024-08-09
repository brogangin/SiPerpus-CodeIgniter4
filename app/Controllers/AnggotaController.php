<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AnggotaController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Anggota',
            'anggotas' => $this->AnggotaModel->findAll(),
        ];
        return view('anggota/index', $data);
    }

    public function detail($nik)
    {
        $data = [
            'title' => 'Edit Anggota',
            'anggota' => $this->AnggotaModel->getAnggota($nik),
            'validation' => session()->getFlashdata('_ci_validation_errors') ?? [[]],
        ];
        return view('anggota/ubah', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Anggota',
            'validation' => session()->getFlashdata('_ci_validation_errors') ?? [],
        ];
        return view('anggota/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
            'nik' => [
                'rules' => 'required|is_unique[anggota.nik]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'is_unique' => 'NIK telah terdaftar',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus dipilih',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'is_unique[anggota.email]|valid_email',
                'errors' => [
                    'is_unique' => 'Email telah terdaftar',
                    'valid_email' => 'Masukkan email yang valid'
                ]
            ],
        ])) {
            return redirect()->to('/anggota/tambah')->withInput();
        }

        $this->AnggotaModel->save([
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/anggota');
    }

    public function update($id)
    {
        $anggotaLama = $this->AnggotaModel->find($id);
        if ($anggotaLama['nik'] == $this->request->getVar('nik'))
            $ruleNik = 'required';
        else $ruleNik = 'required|is_unique[anggota.nik]';
        if ($anggotaLama['email'] == $this->request->getVar('email'))
            $ruleEmail = 'required';
        else $ruleEmail = 'required|is_unique[anggota.email]';

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
            'nik' => [
                'rules' => $ruleNik,
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'is_unique' => 'NIK telah terdaftar',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'email' => [
                'rules' => $ruleEmail,
                'errors' => [
                    'is_unique' => 'Email telah terdaftar',
                    'valid_email' => 'Masukkan email yang valid'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $this->AnggotaModel->save([
            'id_anggota' => $id,
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/anggota');
    }

    public function delete($id)
    {
        $this->AnggotaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/anggota');
    }
}
