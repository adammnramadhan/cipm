<?php

namespace App\Models;

use CodeIgniter\Model;

class PsjModel extends Model
{
    protected $table = 'psj';
    protected $primaryKey = 'id_psj';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_ocb', 'slug', 'nama_penerima', 'alamat_penerima', 'tlp_penerima', 'jumlah_ayam', 'jumlah_tagihan'];

    public function getPsj($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
