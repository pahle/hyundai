<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\TypeModel;

class Type extends BaseController
{
    protected $typeModel;

    public function __construct()
    {
        $this->typeModel = new TypeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Type',
            'type' => $this->typeModel->getType(),
        ];

        return view('admin/type/index', $data);
    }

    public function create($id_mobil)
    {
        $data = [
            'title' => 'Type',
            'id_mobil' => $id_mobil,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/type/create', $data);
    }

    public function save()
    {
        $id_mobil = $this->request->getVar('id_mobil');

        if (!$this->validate([
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
        ])) {
            return redirect()->to('/admin/type/create/' . $id_mobil)->withInput();
        }

        $this->typeModel->save([
            'id_mobil' => $this->request->getVar('id_mobil'),
            'nama' => $this->request->getVar('nama'),
            'harga' => $this->request->getVar('harga'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/mobil/show/' . $id_mobil);
    }

    public function edit($id)
    {
        $type = $this->typeModel->find($id);

        $data = [
            'title' => 'Type',
            'type' => $type,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/type/edit', $data);
    }

    public function update($id)
    {
        $type = $this->typeModel->find($id);

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
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Type',
                'type' => $this->typeModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/type/edit', $data);
        } else {
            $this->typeModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'harga' => $this->request->getVar('harga'),
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . '/admin/mobil/show/' . $type['id_mobil']);
        }
    }

    public function delete($id)
    {   
        $type = $this->typeModel->find($id);

        $this->typeModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to(base_url() . '/admin/mobil/show/' . $type['id_mobil']);
    }
}