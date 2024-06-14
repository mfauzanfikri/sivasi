<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasKamar extends Model {
    protected $table            = 'fasilitas_kamar';
    protected $returnType       = \App\Entities\FasilitasKamar::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tipe_kamar', 'id_fasilitas'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
