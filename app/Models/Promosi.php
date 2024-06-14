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
    protected $allowedFields    = ['id_tipe_kamar', 'kode_promosi', 'potongan', 'tanggal_kadaluarsa'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules      = [
        'id_tipe_kamar' => 'required|max_length[10]',
        'kode_promosi' => 'required|max_length[8]',
        'potongan' => 'required',
        'tanggal_kadaluarsa' => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
