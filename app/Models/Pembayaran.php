<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembayaran extends Model {
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Pembayaran::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_reservasi', 'id_user', 'tanggal', 'jumlah', 'status', 'path_bukti_bayar'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Validation
    protected $validationRules      = [
        'id_reservasi' => 'required|max_length[10]',
        'id_user' => 'required|max_length[10]',
        'tanggal' => 'required',
        'jumlah' => 'required',
        'status' => 'required|max_length[10]',
        'path_bukti_bayar' => 'required|max_length[255]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
