<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => session()->getFlashdata('_ci_validation_errors') ?? [],
        ];
        // dd($data);
        return view('login', $data);
    }

    public function logging()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_not_unique[petugas.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_not_unique' => 'Username tidak terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('/login')->withInput();
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataPetugas = $this->AdminModel->getAdmin($username);

        if ($dataPetugas['password'] !== md5($password)) {
            session()->setFlashdata(['_ci_validation_errors' => ['password' => 'Password tidak valid']]);
            return redirect()->to('/login')->withInput();
        }

        session()->set($dataPetugas);
        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
