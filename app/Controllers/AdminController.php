<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Admin',
            'admins' => $this->AdminModel->findAll(),
        ];
        return view('admin/index', $data);
    }

    public function detail($username)
    {
        $data = [
            'title' => 'Edit Admin',
            'admin' => $this->AdminModel->getAdmin($username),
            'validation' => session()->getFlashdata('_ci_validation_errors') ?? [],
        ];
        return view('admin/ubah', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Admin',
            'validation' => session()->getFlashdata('_ci_validation_errors') ?? [],
        ];
        return view('admin/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[petugas.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username telah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
            'nik' => [
                'rules' => 'required|is_unique[petugas.nik]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'is_unique' => 'NIK telah terdaftar',
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus dipilih',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('/admin/tambah')->withInput();
        }

        $this->AdminModel->save([
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'role' => $this->request->getVar('role'),
            'password' => md5($this->request->getVar('password')),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/admin');
    }

    public function update($id)
    {

        $adminLama = $this->AdminModel->find($id);
        if ($adminLama['username'] == $this->request->getVar('username'))
            $ruleUsername = 'required';
        else $ruleUsername = 'required|is_unique[petugas.username]';
        if ($adminLama['nik'] == $this->request->getVar('nik'))
            $ruleNik = 'required';
        else $ruleNik = 'required|is_unique[petugas.nik]';

        if (!$this->validate([
            'username' => [
                'rules' => $ruleUsername,
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username telah terdaftar'
                ]
            ],
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
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus dipilih',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        if ($adminLama['password'] == $this->request->getVar('password')) {
            $password = $adminLama['password'];
        } else {
            $password = md5($this->request->getVar('password'));
        }
        $this->AdminModel->save([
            'id_petugas' => $id,
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'role' => $this->request->getVar('role'),
            'password' => $password,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        $this->AdminModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin');
    }
}
