<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Kamar;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Reservasi as ReservasiModel;
use App\Models\TipeKamar;
use App\Models\User;
use CodeIgniter\Exceptions\PageNotFoundException;

class Reservasi extends BaseController {
    public function index() {
        $reservasiModel = new ReservasiModel();

        $reservasi = $reservasiModel->select('*, kamar.status status_kamar, reservasi.status')->join('kamar', 'kamar.id_kamar = reservasi.id_reservasi')->join('pelanggan', 'pelanggan.id_pelanggan = reservasi.id_pelanggan')->findAll();

        $data = [
            'title' => 'Data Reservasi',
            'reservasi' => $reservasi
        ];

        return view('dashboard/data_reservasi', $data);
    }

    public function detail($slug = false) {
        $reservasiModel = new ReservasiModel();
        $pembayaranModel = new Pembayaran();
        $userModel = new User();
        $kamarModel = new Kamar();
        $pelangganModel = new Pelanggan();
        $tipeKamarModel = new TipeKamar();

        $reservasi = $reservasiModel
            ->where('id_reservasi', $slug)
            ->first();

        if (!$reservasi) {
            throw PageNotFoundException::forPageNotFound();
        }

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
        // dd($reservasi);
        $data = [
            'title' => 'Detail Reservasi',
            'reservasi' => $reservasi,
        ];

        return view('dashboard/detail_reservasi', $data);
    }
}
