<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\InformationModel;

class Information extends BaseController
{
    protected $informationModel;

    public function __construct()
    {
        $this->informationModel = new InformationModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Information',
            'information' => $this->informationModel->getInformation(),
        ];

        return view('admin/information/index', $data);
    }

    public function create($id_mobil)
    {
        $data = [
            'title' => 'Information',
            'id_mobil' => $id_mobil,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/information/create', $data);
    }

    public function save()
    {
        $id_mobil = $this->request->getVar('id_mobil');

        if (!$this->validate([
            'information' => [
                'rules' => 'required|is_unique[information.information]',
                'errors' => [
                    'required' => '{field} mobil harus diisi.',
                    'is_unique' => '{field} mobil sudah terdaftar.'
                ]
            ],
        ])) {
            return redirect()->to('/admin/information/create/' . $id_mobil)->withInput();
        }

        $this->informationModel->save([
            'id_mobil' => $this->request->getVar('id_mobil'),
            'information' => $this->request->getVar('information'),
        ]);

        session()->setFlashdata('message', 'Data berhasil ditambahkan.');

        return redirect()->to('/admin/mobil/show/' . $id_mobil);
    }

    public function edit($id)
    {
        $information = $this->informationModel->find($id);

        $data = [
            'title' => 'Information',
            'information' => $information,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/information/edit', $data);
    }

    public function update($id)
    {
        $information = $this->informationModel->find($id);

        if (!$this->validate([
            'information' => [
                'rules' => 'required|is_unique[information.information]',
                'errors' => [
                    'required' => '{field} mobil harus diisi.',
                    'is_unique' => '{field} mobil sudah terdaftar.'
                ]
            ],
        ])) {
            return redirect()->to('/admin/information/edit/' . $id)->withInput();
        }

        $this->informationModel->save([
            'id' => $id,
            'information' => $this->request->getVar('information'),
        ]);

        session()->setFlashdata('message', 'Data berhasil diubah.');

        return redirect()->to('/admin/mobil/show/' . $information['id_mobil']);
    }

    public function delete($id)
    {    
        $information = $this->informationModel->find($id);

        $this->informationModel->delete($id);

        session()->setFlashdata('message', 'Data berhasil dihapus.');

        return redirect()->to('/admin/mobil/show/' . $information['id_mobil']);
    }
}



   