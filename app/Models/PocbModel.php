<?php

namespace App\Models;

use CodeIgniter\Model;

class PocbModel extends Model
{
    protected $table = 'pocb';
    protected $primaryKey = 'id_pocb';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_pengajuan', 'slug', 'kode_ocb', 'username', 'nopol', 'no_tlp'];

    public function getPocb($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
