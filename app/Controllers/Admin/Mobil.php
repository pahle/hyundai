<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\MobilModel;
use App\Models\TypeModel;
use App\Models\InformationModel;

class Mobil extends BaseController
{
    protected $mobilModel;
    protected $typeModel;
    protected $informationModel;

    public function __construct()
    {
        $this->mobilModel = model(MobilModel::class);
        $this->typeModel = model(TypeModel::class);
        $this->informationModel = model(InformationModel::class);
    }

    public function index()
    {
        $mobil = $this->mobilModel->findAll();

        $data = [
            'title' => 'Mobil',
            'mobil' => $mobil
        ];

        return view('admin/mobil/index', $data);
    }

    public function show($id)
    {
        $mobil = $this->mobilModel->find($id);
        $type = $this->typeModel->where('id_mobil', $id)->findAll();
        $information = $this->informationModel->where('id_mobil', $id)->findAll();


        $data = [
            'title' => 'Mobil',
            'mobil' => $mobil,
            'type' => $type,
            'information' => $information,
        ];

        return view('admin/mobil/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Mobil',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/mobil/create', $data);
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
                'title' => 'Mobil',
                'validation' => $this->validator,
            ];

            return view('admin/mobil/create', $data);
        } else {
            // Ambil gambar
            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                throw new \RuntimeException($fileGambar->getErrorString() . '(' . $fileGambar->getError() . ')');
            }

            $fileGambar->move('img', $fileGambar->getRandomName());

            $namaGambar = $fileGambar->getName();

            $this->mobilModel->save([
                'nama' => $this->request->getVar('nama'),
                'harga' => $this->request->getVar('harga'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to(base_url() . 'admin/mobil');
        }
    }

    public function edit($id)
    {
        $mobil = $this->mobilModel->find($id);

        $data = [
            'title' => 'Mobil',
            'mobil' => $mobil,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/mobil/edit', $data);
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
                'title' => 'Mobil',
                'mobil' => $this->mobilModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/mobil/edit', $data);
        } else {
            $mobil = $this->mobilModel->find($id);

            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                $namaGambar = $mobil['gambar'];
            } else {
                unlink('img/' . $mobil['gambar']);
                $fileGambar->move('img', $fileGambar->getRandomName());
                $namaGambar = $fileGambar->getName();
            }

            $this->mobilModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'harga' => $this->request->getVar('harga'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . 'admin/mobil');
        }
    }

    public function delete($id)
    {
        $mobil = $this->mobilModel->find($id);
        $type = $this->typeModel->where('id_mobil', $id)->findAll();
        $information = $this->informationModel->where('id_mobil', $id)->findAll();
        foreach ($type as $t) {
            $this->typeModel->delete($t['id']);
        }
        foreach ($information as $i) {
            $this->informationModel->delete($i['id']);
        }
        unlink('img/' . $mobil['gambar']);
        $this->mobilModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . 'admin/mobil');
    }
}
