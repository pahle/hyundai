<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\GreenhouseModel;

use Config\Validation;

class Greenhouse extends BaseController
{
    protected $greenhouseModel;

    public function __construct()
    {
        $this->greenhouseModel = model(GreenhouseModel::class);
    }

    public function index()
    {
        $greenhouse = $this->greenhouseModel->findAll();

        $data = [
            'title' => 'Greenhouse',
            'greenhouse' => $greenhouse
        ];

        return view('admin/greenhouse/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Greenhouse',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/greenhouse/create', $data);
    }

    public function save()
    {
        $rules = [
            'nama_tanaman' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama tanaman harus diisi.',
                    'min_length' => 'Nama tanaman minimal 3 karakter.',
                ]
            ],
            'nama_latin' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama latin harus diisi.',
                    'min_length' => 'Nama latin minimal 3 karakter.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.',
                    'min_length' => 'Deskripsi minimal 3 karakter.',
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|uploaded[gambar]',
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'mime_in' => 'File yang diupload bukan gambar.',
                    'uploaded' => 'Gambar harus diisi.',
                ]
            ]
        ];
        

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Greenhouse',
                'validation' => $this->validator,
            ];

            return view('admin/greenhouse/create', $data);
        } else {
            $fileGambar = $this->request->getFile('gambar');

            $fileGambar->move('img', $fileGambar->getRandomName());
            $namaGambar = $fileGambar->getName();

            $this->greenhouseModel->save([
                'nama_tanaman' => $this->request->getVar('nama_tanaman'),
                'nama_latin' => $this->request->getVar('nama_latin'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to(base_url() . 'admin/greenhouse');
        }
    }

    public function edit($id)
    {
        $greenhouse = $this->greenhouseModel->find($id);

        $data = [
            'title' => 'greenhouse',
            'greenhouse' => $greenhouse,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/greenhouse/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_tanaman' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama tanaman harus diisi.',
                    'min_length' => 'Nama tanaman minimal 3 karakter.',
                ]
            ],
            'nama_latin' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Nama latin harus diisi.',
                    'min_length' => 'Nama latin minimal 3 karakter.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.',
                    'min_length' => 'Deskripsi minimal 3 karakter.',
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                    'mime_in' => 'File yang diupload bukan gambar.',
                ]
            ]
        ];

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Greenhouse',
                'greenhouse' => $this->greenhouseModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/greenhouse/edit', $data);
        } else {
            $greenhouse = $this->greenhouseModel->find($id);

            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                $namaGambar = $greenhouse['gambar'];
            } else {
                unlink('img/' . $greenhouse['gambar']);
                $fileGambar->move('img', $fileGambar->getRandomName());
                $namaGambar = $fileGambar->getName();
            }

            $this->greenhouseModel->save([
                'id' => $id,
                'nama_tanaman' => $this->request->getVar('nama_tanaman'),
                'nama_latin' => $this->request->getVar('nama_latin'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . 'admin/greenhouse');
        }
    }

    public function delete($id)
    {
        $greenhouse = $this->greenhouseModel->find($id);
        unlink('img/' . $greenhouse['gambar']);
        $this->greenhouseModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . 'admin/greenhouse');
    }
}
