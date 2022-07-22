<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
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
        $this->data['title'] = 'User List';

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, email, username, fullname, user_image, no_tlp, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $this->data['users'] = $query->getResult();

        return view('admin/index', $this->data);
    }

    public function detail($id = 0)
    {
        $this->data['title'] = 'User Detail';

        $this->builder->select('users.id as userid, email, username, fullname, user_image, no_tlp, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query    = $this->builder->get();

        $this->data['user'] = $query->getRow();

        if (empty($this->data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $this->data);
    }
}
