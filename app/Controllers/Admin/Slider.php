<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\SliderModel;

class Slider extends BaseController
{
    protected $sliderModel;

    public function __construct()
    {
        $this->sliderModel = model(SliderModel::class);
    }

    public function index()
    {
        $slider = $this->sliderModel->findAll();

        $data = [
            'title' => 'Slider',
            'slider' => $slider
        ];

        return view('admin/slider/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Slider',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/slider/create', $data);
    }

    public function save()
    {
        $rules = [
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Title harus diisi.',
                    'min_length' => 'Title minimal 3 karakter.',
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
                'title' => 'Slider',
                'validation' => $this->validator,
            ];

            return view('admin/slider/create', $data);
        } else {
            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                throw new \RuntimeException($fileGambar->getErrorString() . '(' . $fileGambar->getError() . ')');
            }

            $fileGambar->move('img', $fileGambar->getRandomName());
            $namaGambar = $fileGambar->getName();

            $this->sliderModel->save([
                'title' => $this->request->getVar('title'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to(base_url() . 'admin/slider');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Slider',
            'slider' => $this->sliderModel->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/slider/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Title harus diisi.',
                    'min_length' => 'Title minimal 3 karakter.',
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
                'title' => 'Slider',
                'slider' => $this->sliderModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/slider/edit', $data);
        } else {
            $slider = $this->sliderModel->find($id);

            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                $namaGambar = $slider['gambar'];
            } else {
                unlink('img/' . $slider['gambar']);
                $fileGambar->move('img', $fileGambar->getRandomName());
                $namaGambar = $fileGambar->getName();
            }

            $this->sliderModel->save([
                'id' => $id,
                'title' => $this->request->getVar('title'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . 'admin/slider');
        }
    }

    public function delete($id)
    {
        // delete image
        $slider = $this->sliderModel->find($id);
        unlink('img/' . $slider['gambar']);
        $this->sliderModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . 'admin/slider');
    }
}
