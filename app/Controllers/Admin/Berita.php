<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = model(BeritaModel::class);
    }

    public function index()
    {
        $berita = $this->beritaModel->findAll();

        $data = [
            'title' => 'Berita',
            'berita' => $berita
        ];

        return view('admin/berita/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Berita',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/berita/create', $data);
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
            'isi' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Isi harus diisi.',
                    'min_length' => 'Isi minimal 3 karakter.',
                ],
            ],
        ];

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Berita',
                'validation' => $this->validator,
            ];

            return view('admin/berita/create', $data);
        } else {
            $this->beritaModel->save([
                'title' => $this->request->getVar('title'),
                'isi' => $this->request->getVar('isi'),
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to(base_url() . 'admin/berita');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Berita',
            'berita' => $this->beritaModel->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/berita/edit', $data);
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
            'isi' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Isi harus diisi.',
                    'min_length' => 'Isi minimal 3 karakter.',
                ]
            ],
        ];

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Berita',
                'berita' => $this->beritaModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/berita/edit', $data);
        } else {
            $berita = $this->beritaModel->find($id);

            $this->beritaModel->save([
                'id' => $id,
                'title' => $this->request->getVar('title'),
                'isi' => $this->request->getVar('isi'),
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . 'admin/berita');
        }
    }

    public function delete($id)
    {
        $this->beritaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . 'admin/berita');
    }
}
