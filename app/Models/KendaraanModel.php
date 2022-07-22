<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $useTimestamps = true;
    protected $allowedFields = ['jenis_kendaraan', 'nopol', 'slug'];

    public function getKendaraan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
