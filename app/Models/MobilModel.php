<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilModel extends Model
{
    protected $table = 'mobil';
    protected $allowedFields = ['nama', 'harga', 'gambar'];
}