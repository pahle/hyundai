<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'slider';
    protected $allowedFields = ['title', 'gambar', 'created_at', 'updated_at'];

    public function search($keyword)
    {
        return $this->table('slider')->like('title', $keyword);
    }
}
