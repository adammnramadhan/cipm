<?php

namespace App\Controllers;

use App\Models\PsjModel;

class Psj extends BaseController
{
    protected $db, $builder;
    protected $psjModel;

    public function __construct()
    {
        $this->db       = \Config\Database::connect();
        $this->builder  = $this->db->table('psj');
        $this->psjModel = new psjModel();
    }

    public function index()
    {
        $this->data = [
            'title' => 'Surat Jalan',
            'psj' => $this->psjModel->getPsj()
        ];

        $this->builder->select('id_psj, kode_ocb, nama_penerima, alamat_penerima, tlp_penerima, jumlah_ayam, jumlah_tagihan, updated_at');
        $query = $this->builder->get();

        $this->data['$sj'] = $query->getResult();

        return view('psj/index', $this->data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Surat Jalan',
            'psj' => $this->psjModel->getPsj($slug)
        ];

        if (empty($data['psj'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Surat Jalan ' . $slug . ' tidak ditemukan.');
        }

        return view('psj/detail', $data);
    }

    public function tambah()
    {
        $this->data = [
            'title' => 'Form Surat Jalan',
            'pocb' => $this->pocbModel->getPocb(),
            'validation' => \Config\Services::validation()
        ];

        return view('psj/tambah', $this->data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama_penerima' => 'required',
            'alamat_penerima' => 'required',
            'tlp_penerima' => 'required|numeric',
            'jumlah_ayam' => 'required',
            'jumlah_tagihan' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/psj/tambah')->withInput();
        }

        $slug = url_title($this->request->getVar('kode_ocb'), '-', true);
        $this->psjModel->save([
            'kode_ocb' => $this->request->getVar('kode_ocb'),
            'slug' => $slug,
            'nama_penerima' => $this->request->getVar('nama_penerima'),
            'alamat_penerima' => $this->request->getVar('alamat_penerima'),
            'tlp_penerima' => $this->request->getVar('tlp_penerima'),
            'jumlah_ayam' => $this->request->getVar('jumlah_ayam'),
            'jumlah_tagihan' => $this->request->getVar('jumlah_tagihan'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

        return redirect()->to('/psj');
    }

    public function delete($id)
    {
        $this->psjModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/psj');
    }
}
