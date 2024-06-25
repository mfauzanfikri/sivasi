<?php

namespace App\Models;

use CodeIgniter\Model;

class Fasilitas extends Model {
    protected $table            = 'fasilitas';
    protected $primaryKey       = 'id_fasilitas';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Fasilitas::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fasilitas'];

    protected array $casts      = [
        'id_fasilitas' => 'int'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules      = [
        'fasilitas' => 'required|max_length[50]'
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
