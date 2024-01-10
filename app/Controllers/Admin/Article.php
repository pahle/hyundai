<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ArticleModel;

use Config\Validation;

class Article extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = model(ArticleModel::class);
    }

    public function index()
    {
        $article = $this->articleModel->findAll();

        $data = [
            'title' => 'Article',
            'article' => $article
        ];

        return view('admin/article/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'Article',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/article/create', $data);
    }

    public function save()
    {
        $rules = [
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Title tanaman harus diisi.',
                    'min_length' => 'Title tanaman minimal 3 karakter.',
                ]
            ],
            'isi' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Isi harus diisi.',
                    'min_length' => 'Isi minimal 3 karakter.',
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
                'title' => 'Article',
                'validation' => $this->validator,
            ];

            return view('admin/article/create', $data);
        } else {
            $fileGambar = $this->request->getFile('gambar');

            $fileGambar->move('img', $fileGambar->getRandomName());
            $namaGambar = $fileGambar->getName();

            $this->articleModel->save([
                'title' => $this->request->getVar('title'),
                'isi' => $this->request->getVar('isi'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to(base_url() . 'admin/article');
        }
    }

    public function edit($id)
    {
        $article = $this->articleModel->find($id);

        $data = [
            'title' => 'Article',
            'article' => $article,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/article/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Title tanaman harus diisi.',
                    'min_length' => 'Title tanaman minimal 3 karakter.',
                ]
            ],
            'isi' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Isi harus diisi.',
                    'min_length' => 'Isi minimal 3 karakter.',
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
                'title' => 'Article',
                'article' => $this->articleModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/article/edit', $data);
        } else {
            $article = $this->articleModel->find($id);

            $fileGambar = $this->request->getFile('gambar');

            if (!$fileGambar->isValid()) {
                $namaGambar = $article['gambar'];
            } else {
                unlink('img/' . $article['gambar']);
                $fileGambar->move('img', $fileGambar->getRandomName());
                $namaGambar = $fileGambar->getName();
            }

            $this->articleModel->save([
                'id' => $id,
                'title' => $this->request->getVar('title'),
                'isi' => $this->request->getVar('isi'),
                'gambar' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . 'admin/article');
        }
    }

    public function delete($id)
    {
        $article = $this->articleModel->find($id);
        unlink('img/' . $article['gambar']);
        $this->articleModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . 'admin/article');
    }
}
