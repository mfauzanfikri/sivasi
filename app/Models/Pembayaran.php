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

    // protected array $casts      = [
    //     'id_pembayaran' => 'int'
    // ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
