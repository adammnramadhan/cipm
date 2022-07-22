<?php

namespace App\Controllers;

use App\Models\KendaraanModel;
use App\Models\UserModel;

class Kendaraan extends BaseController
{
    protected $db, $builder;
    protected $kendaraanModel;

    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->kendaraanModel = new KendaraanModel();
        $this->userModel = new UserModel();
        $this->builder  = $this->db->table('kendaraan');
    }

    public function index()
    {

        $this->data = [
            'title' => 'Kendaraan',
            'kendaraan' => $this->kendaraanModel->getKendaraan()
        ];

        $this->builder->select('id_kendaraan, jenis_kendaraan, nopol');
        $query = $this->builder->get();

        $this->data['$k'] = $query->getResult();

        return view('kendaraan/index', $this->data);
    }

    public function detail($slug)
    {
        $this->data = [
            'title' => 'Detail Kendaraan',
            'kendaraan' => $this->kendaraanModel->getKendaraan($slug)
        ];

        if (empty($this->data['kendaraan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nomor Polisi ' . $slug . ' tidak ditemukan.');
        }

        return view('kendaraan/detail', $this->data);
    }

    public function tambah()
    {
        $this->data = [
            'title' => 'Form Tambah Data Kendaraan',
            'validation' => \Config\Services::validation()
        ];

        return view('kendaraan/tambah', $this->data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'jenis_kendaraan' => 'required',
            'nopol' => 'required|is_unique[kendaraan.nopol]'
        ])) {
            $this->validation = \Config\Services::validation();
            return redirect()->to('/kendaraan/tambah')->withInput();
        }

        $slug = url_title($this->request->getVar('nopol'), '-', true);
        $this->kendaraanModel->save([
            'jenis_kendaraan' => $this->request->getVar('jenis_kendaraan'),
            'nopol' => $this->request->getVar('nopol'),
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

        return redirect()->to('/kendaraan');
    }

    public function delete($id)
    {
        $this->kendaraanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus');
        return redirect()->to('/kendaraan');
    }
}
