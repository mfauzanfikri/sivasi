<?php

namespace App\Models;

use CodeIgniter\Model;

class Promosi extends Model {
    protected $table            = 'promosi';
    protected $primaryKey       = 'id_promosi';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Promosi::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tipe_kamar', 'kode_promosi', 'potongan', 'tanggal_kadaluarsa', 'tampilkan'];

    // protected array $casts      = [
    //     'id_promosi' => 'int'
    // ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
