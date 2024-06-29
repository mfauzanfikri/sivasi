<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kamar;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Reservasi as ReservasiModel;
use App\Models\TipeKamar;
use App\Models\User;
use App\Utils\Database\Constants\StatusReservasi;
use DateTime;

class Reservasi extends BaseController {
    public function index() {
        $reservasiModel = new ReservasiModel();
        $pelangganId = session()->get('pelanggan')['id_pelanggan'];

        // TODO: get reservasi data
        $reservasi = $reservasiModel->getReservasiByPelangganId($pelangganId);

        $date = (new DateTime())->format('Y-m-d');

        $reservasiAktif = [];
        foreach ($reservasi as $r) {
            if ($r->status = StatusReservasi::SELESAI && !$r->tanggal_checkout) {
                array_push($reservasiAktif, $r);
            }
        }

        $reservasiMenungguPembayaran = [];
        foreach ($reservasi as $r) {
            if ($r->status = StatusReservasi::PROSES && !$r->pembayaran->tanggal) {
                array_push($reservasiMenungguPembayaran, $r);
            }
        }

        $reservasiSelesai = [];
        foreach ($reservasi as $r) {
            if (($r->status = StatusReservasi::SELESAI || $r->status = StatusReservasi::GAGAL)) {
                array_push($reservasiSelesai, $r);
            }
        }

        $data = [
            'title' => 'Reservasi',
            'reservasiAktif' => $reservasiAktif,
            'reservasiMenungguPembayaran' => $reservasiMenungguPembayaran,
            'reservasiSelesai' => $reservasiSelesai
        ];

        return view('/reservasi', $data);
    }
}
