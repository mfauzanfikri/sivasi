<?php

namespace App\Models;

use CodeIgniter\Model;

class TipeKamar extends Model {
    protected $table            = 'tipe_kamar';
    protected $primaryKey       = 'id_tipe_kamar';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\TipeKamar::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tipe', 'harga'];

    // protected array $casts      = [
    //     'id_tipe_kamar' => 'int'
    // ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
