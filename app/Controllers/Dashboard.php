<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'jumlah_pinjam' => $this->PeminjamanModel->where(['status_kembali' => 0])->countAllResults(),
            'jumlah_kembali' => $this->PengembalianModel->countAllResults(),
            'jumlah_buku' => $this->BukuModel->countAllResults(),
            'daftar_p' => $this->PeminjamanModel->where(['status_kembali' => 0])->findAll(),
        ];
        return view('dashboard', $data);
    }
}
