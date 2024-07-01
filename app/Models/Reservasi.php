<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Reservasi extends Model {
    protected $table            = 'reservasi';
    protected $primaryKey       = 'id_reservasi';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\Reservasi::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pelanggan', 'id_kamar', 'tanggal', 'lama', 'tanggal_mulai', 'tanggal_selesai', 'tanggal_checkin', 'tanggal_checkout', 'status'];

    // protected array $casts      = [
    //     'id_reservasi' => 'int'
    // ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    public function getReservasiById(string|int $id) {
        $pembayaranModel = new Pembayaran();
        $userModel = new User();
        $kamarModel = new Kamar();
        $pelangganModel = new Pelanggan();
        $tipeKamarModel = new TipeKamar();

        $reservasi = $this
            ->where('id_reservasi', $id)
            ->first();

        $pelanggan = $pelangganModel
            ->where('id_pelanggan', $reservasi->id_pelanggan)
            ->first();

        $reservasi->pelanggan = $pelanggan;

        $kamar = $kamarModel
            ->where('id_kamar', $reservasi->id_kamar)
            ->first();

        $reservasi->kamar = $kamar;

        $tipeKamar = $tipeKamarModel
            ->where('id_tipe_kamar', $kamar->id_tipe_kamar)
            ->first();

        $reservasi->kamar->tipeKamar = $tipeKamar;

        $pembayaran = $pembayaranModel
            ->where('id_reservasi', $reservasi->id_reservasi)
            ->first();

        $reservasi->pembayaran = $pembayaran;

        $validator = $userModel
            ->where('id_user', $pembayaran->id_user)
            ->first();

        $reservasi->pembayaran->validator = $validator;

        return $reservasi;
    }

    public function getReservasiByPelangganId(string|int $id) {
        $pembayaranModel = new Pembayaran();
        $userModel = new User();
        $kamarModel = new Kamar();
        $pelangganModel = new Pelanggan();
        $tipeKamarModel = new TipeKamar();

        $reservasi = $this
            ->where('id_pelanggan', $id)
            ->findAll();

        foreach ($reservasi as $r) {
            $pelanggan = $pelangganModel
                ->where('id_pelanggan', $r->id_pelanggan)
                ->first();

            $r->pelanggan = $pelanggan;

            $kamar = $kamarModel
                ->where('id_kamar', $r->id_kamar)
                ->first();

            $r->kamar = $kamar;

            $tipeKamar = $tipeKamarModel
                ->where('id_tipe_kamar', $kamar->id_tipe_kamar)
                ->first();

            $r->kamar->tipeKamar = $tipeKamar;

            $pembayaran = $pembayaranModel
                ->where('id_reservasi', $r->id_reservasi)
                ->first();

            $r->pembayaran = $pembayaran;

            $validator = $userModel
                ->where('id_user', $pembayaran->id_user)
                ->first();

            $r->pembayaran->validator = $validator;
        }

        return $reservasi;
    }
}
