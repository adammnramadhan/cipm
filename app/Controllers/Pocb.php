<?php

namespace App\Controllers;

use App\Models\PocbModel;
use App\Models\UserModel;
use App\Models\KendaraanModel;

class Pocb extends BaseController
{
    protected $db, $builder;
    protected $pocbModel;

    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->builder  = $this->db->table('pocb');
        $this->pocbModel = new PocbModel();
        $this->pocbModel = new UserModel();
        $this->pocbModel = new KendaraanModel();
    }

    public function index()
    {
        $this->data = [
            'title' => 'Operational Cash Bon',
            'pocb' => $this->pocbModel->getPocb()
        ];

        $this->builder->select('id_pocb, no_pengajuan, kode_ocb, username, nopol, no_tlp, updated_at');
        $query = $this->builder->get();

        $this->data['$ocb'] = $query->getResult();

        return view('pocb/index', $this->data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Operational Cash Bon',
            'pocb' => $this->pocbModel->getPocb($slug)
        ];

        $this->builder->select('id_pocb, no_pengajuan, kode_ocb, username, nopol, no_tlp, updated_at');
        $query = $this->builder->get();

        $this->data['$ocb'] = $query->getResult();

        if (empty($data['pocb'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nomor Pengajuan ' . $slug . ' tidak ditemukan.');
        }

        return view('pocb/detail', $data);
    }

    public function tambah()
    {
        $this->data = [
            'title' => 'Form Pengajuan OCB',
            'kendaraan' => $this->kendaraanModel->getKendaraan(),
            'validation' => \Config\Services::validation()
        ];

        $this->builder->select('no_pengajuan, kode_ocb, username, no_tlp, nopol');
        $query = $this->builder->get();

        $this->data['$ocb'] = $query->getResult();

        return view('pocb/tambah', $this->data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'kode_ocb' => 'is_unique[pocb.kode_ocb]',
            'username' => 'required',
            'no_tlp' => 'required|numeric',
            'nopol' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/pocb/tambah')->withInput();
        }

        $slug = url_title($this->request->getVar('no_pengajuan'), '-', true);
        $this->pocbModel->save([
            'no_pengajuan' => $this->request->getVar('no_pengajuan'),
            'slug' => $slug,
            'kode_ocb' => $this->request->getVar('kode_ocb'),
            'username' => $this->request->getVar('username'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'nopol' => $this->request->getVar('nopol')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/pocb');
    }

    public function delete($id)
    {
        $this->pocbModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/pocb');
    }
}
