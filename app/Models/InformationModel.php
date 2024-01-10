<?php

namespace App\Models;

use CodeIgniter\Model;

class InformationModel extends Model
{
    protected $table = 'information';
    protected $allowedFields = ['id_mobil', 'information'];
}