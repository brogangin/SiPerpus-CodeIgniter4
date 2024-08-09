<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BukuController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'daftar_buku' => $this->BukuModel->findAll(),
        ];
        return view('buku/index', $data);
    }

    public function detail($isbn)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->BukuModel->getBuku($isbn),
            'validation' =>  session()->getFlashdata('_ci_validation_errors') ?? [],
        ];
        return view('buku/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' =>  session()->getFlashdata('_ci_validation_errors') ?? [],
        ];
        return view('buku/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => ['required' => 'Penulis harus diisi']
            ],
            'isbn' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => 'ISBN harus diisi',
                    'is_unique' => 'ISBN telah terdaftar',
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah harus diisi',
                ]
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Hanya menerima file gambar',
                    'mime_in' => 'Gambar harus format jpg/jpeg/png'
                ]
            ],
        ])) {
            return redirect()->to('/buku/tambah')->withInput();
        }

        $file = $this->request->getFile('cover');
        if ($file->getError() == 4) {
            $fileName = 'buku.png';
        } else {
            $fileName = $file->getRandomName();
            $file->move('assets/img', $fileName);
        }

        $this->BukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'isbn' => $this->request->getVar('isbn'),
            'jumlah_awal' => $this->request->getVar('jumlah'),
            'jumlah_stok' => $this->request->getVar('jumlah'),
            'cover' => $fileName
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/buku');
    }

    public function update($id)
    {
        $BukuLama = $this->BukuModel->getBuku($this->request->getVar('isbnLama'));

        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => ['required' => 'Penulis harus diisi']
            ],
            'isbn' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => 'ISBN harus diisi',
                    'is_unique' => 'ISBN telah terdaftar',
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah harus diisi',
                ]
            ],
            'cover' => [
                'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Hanya menerima file gambar',
                    'mime_in' => 'Gambar harus format jpg/jpeg/png'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/buku/detail/' . $this->request->getVar('isbn'))->withInput();
        }

        $file = $this->request->getFile('cover');
        if ($file->getError() == 4) {
            $fileName = $BukuLama['cover'];
        } else {
            $fileName = $file->getRandomName();
            $file->move('assets/img', $fileName);
            unlink('assets/img/' . $BukuLama['cover']);
        }

        $jumlah_stok = $BukuLama['jumlah_stok'];

        if ($BukuLama['jumlah_awal'] < $this->request->getVar('jumlah')) {
            $jumlah_stok = $jumlah_stok + ($this->request->getVar('jumlah') - $BukuLama['jumlah_awal']);
        } else if ($BukuLama['jumlah_awal'] > $this->request->getVar('jumlah')) {
            $jumlah_stok = $jumlah_stok - ($BukuLama['jumlah_awal'] - $this->request->getVar('jumlah'));
        }

        $this->BukuModel->save([
            'id_buku' => $id,
            'judul' => $this->request->getVar('judul'),
            'penulis' => $this->request->getVar('penulis'),
            'isbn' => $this->request->getVar('isbn'),
            'jumlah_awal' => $this->request->getVar('jumlah'),
            'jumlah_stok' => $jumlah_stok,
            'cover' => $fileName
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/buku');
    }

    public function delete($id)
    {
        $buku = $this->BukuModel->find($id);
        if ($buku['cover'] != 'buku.png')
            unlink('assets/img/' . $buku['cover']);
        $this->BukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/buku');
    }
}
