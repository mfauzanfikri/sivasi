<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservasi extends Model {
    protected $table            = 'reservasi';
    protected $primaryKey       = 'id_reservasi';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Reservasi::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pelanggan', 'id_kamar', 'tanggal', 'lama', 'tanggal_checkin', 'tanggal_checkout', 'status'];

    // protected array $casts      = [
    //     'id_reservasi' => 'int'
    // ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules      = [
        'id_pelanggan' => 'required|max_length[10]',
        'id_kamar' => 'required|max_length[10]',
        'tanggal' => 'required',
        'lama' => 'required|max_length[10]',
        'tanggal_checkin' => 'required',
        'status' => 'required|max_length[10]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
