<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModels extends Model
{
    protected $table            = 'desa';
    protected $primaryKey       = 'kode_desa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_desa','kode_kecamatan'];
}
