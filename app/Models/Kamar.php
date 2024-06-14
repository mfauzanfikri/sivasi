<?php

namespace App\Models;

use CodeIgniter\Model;

class Kamar extends Model {
    protected $table            = 'kamar';
    protected $primaryKey       = 'id_kamar';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Kamar::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tipe_kamar', 'no_kamar', 'status'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules      = [
        'id_tipe_kamar' => 'required|max_length[10]',
        'no_kamar' => 'required|max_length[10]',
        'status' => 'required|max_length[10]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
