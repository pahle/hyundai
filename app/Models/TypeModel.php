<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeModel extends Model
{
    protected $table = 'type';
    protected $allowedFields = ['id_mobil', 'nama', 'harga'];
}