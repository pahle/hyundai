<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\RoomModel;

class Room extends BaseController
{
    protected $roomModel;

    public function __construct()
    {
        $this->roomModel = model(RoomModel::class);
    }

    public function index()
    {
        $room = $this->roomModel->findAll();

        $data = [
            'title' => 'Room',
            'room' => $room
        ];

        return view('admin/room/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Room',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/room/create', $data);
    }

    public function save()
    {
        $rules = [
            'type' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Type harus diisi.',
                    'min_length' => 'Type minimal 3 karakter.',
                ]
            ],
            'rate' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Rate harus diisi.',
                    'min_length' => 'Rate minimal 3 karakter.',
                ]
            ],
            'room_left' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Room Left harus diisi.',
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|uploaded[image]',
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'mime_in' => 'File yang diupload bukan gambar.',
                    'uploaded' => 'Gambar harus diisi.',
                ]
            ],
        ];

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Room',
                'validation' => $this->validator,
            ];

            return view('admin/room/create', $data);
        } else {
            $fileGambar = $this->request->getFile('image');

            if (!$fileGambar->isValid()) {
                throw new \RuntimeException($fileGambar->getErrorString() . '(' . $fileGambar->getError() . ')');
            }

            $fileGambar->move('img', $fileGambar->getRandomName());
            $namaGambar = $fileGambar->getName();

            $this->roomModel->save([
                'type' => $this->request->getVar('type'),
                'rate' => $this->request->getVar('rate'),
                'room_left' => $this->request->getVar('room_left'),
                'image' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

            return redirect()->to(base_url() . 'admin/room');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Room',
            'room' => $this->roomModel->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/room/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'type' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Type harus diisi.',
                    'min_length' => 'Type minimal 3 karakter.',
                ]
            ],
            'rate' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Rate harus diisi.',
                    'min_length' => 'Rate minimal 3 karakter.',
                ]
            ],
            'room_left' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Room Left harus diisi.',
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File yang diupload bukan gambar.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'mime_in' => 'File yang diupload bukan gambar.',
                ]
            ],
        ];

        if ($this->validate($rules) === false) {
            $data = [
                'title' => 'Room',
                'room' => $this->roomModel->find($id),
                'validation' => $this->validator,
            ];

            return view('admin/room/edit', $data);
        } else {
            $room = $this->roomModel->find($id);

            $fileGambar = $this->request->getFile('image');

            if (!$fileGambar->isValid()) {
                $namaGambar = $room['image'];
            } else {
                unlink('img/' . $room['image']);
                $fileGambar->move('img', $fileGambar->getRandomName());
                $namaGambar = $fileGambar->getName();
            }

            $this->roomModel->save([
                'id' => $id,
                'type' => $this->request->getVar('type'),
                'rate' => $this->request->getVar('rate'),
                'room_left' => $this->request->getVar('room_left'),
                'image' => $namaGambar,
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah.');

            return redirect()->to(base_url() . 'admin/room');
        }
    }

    public function delete($id)
    {
        $room = $this->roomModel->find($id);
        unlink('img/' . $room['image']);
        $this->roomModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . 'admin/room');
    }
}
