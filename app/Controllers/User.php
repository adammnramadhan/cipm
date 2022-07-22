<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $db, $builder;
    protected $userModel;

    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->builder  = $this->db->table('users');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $this->data['title'] = 'My Profile';

        return view('user/index', $this->data);
    }

    public function edit($id = 0)
    {
        $this->data = [
            'title' => 'Edit Profile',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel
        ];

        $this->builder->select('users.id as userid, email, username, fullname, no_tlp');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $this->data['user'] = $query->getRow();

        return view('user/edit', $this->data);
    }

    public function update($id = 0)
    {
        if (!$this->validate([
            'username' => 'required',
            'email' => 'required',
            'fullname' => 'required',
            'no_tlp' => 'required'
        ])) {
            $this->validation = \Config\Services::validation();
            return redirect()->to('/user/edit' . $this->request->getVar('id'))->withInput();
        }

        $this->userModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'no_tlp' => $this->request->getVar('no_tlp')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');

        return redirect()->to('/');
    }
}
