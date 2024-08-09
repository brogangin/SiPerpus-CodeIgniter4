<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profile',
            'admin' => $this->AdminModel->find(session()->get('id_petugas')),
            'validation' => session()->getFlashdata('_ci_validation_errors'),
        ];
        return view('profile/index', $data);
    }

    public function update()
    {
        $adminLama = $this->AdminModel->find(session()->get('id_petugas'));
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
        $adminBaru = [
            'id_petugas' => $adminLama['id_petugas'],
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'password' => $password,
        ];

        $this->AdminModel->save($adminBaru);
        session()->set($adminBaru);
        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/profile');
    }
}
