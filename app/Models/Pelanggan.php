<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan extends Model {
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Pelanggan::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'nama', 'alamat', 'no_telepon'];

    // protected array $casts      = [
    //     'id_pelanggan' => 'int'
    // ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
