<?php

namespace App\Models;

use App\Utils\Database\Constants\StatusKamar;
use CodeIgniter\Model;

class Kamar extends Model {
    protected $table            = 'kamar';
    protected $primaryKey       = 'id_kamar';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Kamar::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_tipe_kamar', 'no_kamar', 'status'];

    // protected array $casts      = [
    //     'id_kamar' => 'int'
    // ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    public function getAvailableBetweenDate(string $from, string $to, string|int $tipeKamarId) {
        $reservasiModel = new Reservasi();

        $kamar = $this->where('id_tipe_kamar', $tipeKamarId)->findAll();

        foreach ($kamar as $k) {
            $isExist = $reservasiModel
                ->where('id_kamar', $k->id_kamar)
                ->groupStart()
                ->where('tanggal_mulai >=', $from)
                ->orWhere('tanggal_selesai <=', $from)
                ->orWhere('tanggal_mulai <=', $to)
                ->groupEnd()
                ->first();

            if (!$isExist) {
                return $k;
            }
        }

        return null;
    }
}
