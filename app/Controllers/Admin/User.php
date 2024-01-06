<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $user = $this->userModel->findAll();

        $data = [
            'title' => 'User',
            'user' => $user
        ];

        return view('admin/user/index', $data);
    }

    public function create()
    {

        $data = [
            'title' => 'User',
        ];

        return view('admin/user/create', $data);
    }

    public function save()
    {

        $this->userModel->save([
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'password' => $this->request->getVar('password'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('admin/users');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        $data = [
            'title' => 'User',
            'user' => $user,
        ];

        return view('admin/user/edit', $data);
    }

    public function update($id)
    {
        $this->userModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'password' => $this->request->getVar('password'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to(base_url().'admin/users');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url().'admin/users');
    }
}
