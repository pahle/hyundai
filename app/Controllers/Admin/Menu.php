<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\MenuModel;

class Menu extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = model(MenuModel::class);
    }

    public function index()
    {
        $menu = $this->menuModel->findAll();

        $data = [
            'title' => 'Menu',
            'menu' => $menu
        ];

        return view('admin/menu/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Menu',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/menu/create', $data);
    }

    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama minimal 3 karakter.',
                ]
            ],
            'bahan' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Bahan harus diisi.',
                    'min_length' => 'Bahan minimal 3 karakter.',
                ]
            ],
            'kategori' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Kategori harus diisi.',
                    'min_length' => 'Kategori minimal 3 karakter.',
                ]
            ],
            'harga' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'min_length' => 'Harga minimal 3 karakter.',
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|uploaded[gambar]',
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'mime_in' => 'File yang diupload bukan gambar.',
                    'uploaded' => 'Gambar harus diisi.',
                ]
            ]
        ];

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Menu',
                'validation' => $this->validator,
            ];

            return view('admin/menu/create', $data);
        } else {
            // Ambil gambar
            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                throw new \RuntimeException($fileGambar->getErrorString() . '(' . $fileGambar->getError() . ')');
            }

            $fileGambar->move('img', $fileGambar->getRandomName());

            $namaGambar = $fileGambar->getName();

            $this->menuModel->save([
                'nama' => $this->request->getVar('nama'),
                'bahan' => $this->request->getVar('bahan'),
                'kategori' => $this->request->getVar('kategori'),
                'harga' => $this->request->getVar('harga'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to(base_url() . 'admin/menu');
        }
    }

    public function edit($id)
    {
        $menu = $this->menuModel->find($id);

        $data = [
            'title' => 'menu',
            'menu' => $menu,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/menu/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama minimal 3 karakter.',
                ]
            ],
            'bahan' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Bahan harus diisi.',
                    'min_length' => 'Bahan minimal 3 karakter.',
                ]
            ],
            'kategori' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Kategori harus diisi.',
                    'min_length' => 'Kategori minimal 3 karakter.',
                ]
            ],
            'harga' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'min_length' => 'Harga minimal 3 karakter.',
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'mime_in' => 'File yang diupload bukan gambar.',
                ]
            ]
        ];

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Menu',
                'menu' => $this->menuModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/menu/edit', $data);
        } else {
            $menu = $this->menuModel->find($id);

            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                $namaGambar = $menu['gambar'];
            } else {
                unlink('img/' . $menu['gambar']);
                $fileGambar->move('img', $fileGambar->getRandomName());
                $namaGambar = $fileGambar->getName();
            }

            $this->menuModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'bahan' => $this->request->getVar('bahan'),
                'kategori' => $this->request->getVar('kategori'),
                'harga' => $this->request->getVar('harga'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . 'admin/menu');
        }
    }

    public function delete($id)
    {
        $menu = $this->menuModel->find($id);
        unlink('img/' . $menu['gambar']);
        $this->menuModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . 'admin/menu');
    }
}
