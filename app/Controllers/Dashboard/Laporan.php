<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Kamar;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use App\Models\User;
use App\Utils\Database\Constants\StatusPembayaran;

class Laporan extends BaseController {
    public function index() {
        $reservasiModel = new Reservasi();
        $pembayaranModel = new Pembayaran();
        $userModel = new User();
        $kamarModel = new Kamar();
        $pelangganModel = new Pelanggan();
        $tipeKamarModel = new TipeKamar();

        $pembayaran = $pembayaranModel
            ->where('status', StatusPembayaran::SELESAI)
            ->findAll();

        foreach ($pembayaran as $value) {
            $reservasi = $reservasiModel->where('id_reservasi', $value->id_reservasi)
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

            $validator = $userModel
                ->where('id_user', $value->id_user)
                ->first();

            $value->validator = $validator;

            $value->reservasi = $reservasi;
        }

        $data = [
            'title' => 'Laporan',
            'pembayaran' => $pembayaran
        ];

        return view('dashboard/laporan', $data);
    }

    public function cetak() {
        $reservasiModel = new Reservasi();
        $pembayaranModel = new Pembayaran();
        $userModel = new User();
        $kamarModel = new Kamar();
        $pelangganModel = new Pelanggan();
        $tipeKamarModel = new TipeKamar();

        $getData = [
            'from' => $this->request->getGet('from'),
            'to' => $this->request->getGet('to')
        ];

        $pembayaran = $pembayaranModel
            ->where('tanggal >=', $getData['from'])
            ->where('tanggal <=', $getData['to'])
            ->where('status', StatusPembayaran::SELESAI)
            ->findAll();

        foreach ($pembayaran as $value) {
            $reservasi = $reservasiModel->where('id_reservasi', $value->id_reservasi)
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

            $validator = $userModel
                ->where('id_user', $value->id_user)
                ->first();

            $value->validator = $validator;

            $value->reservasi = $reservasi;
        }

        if (empty($pembayaran)) {
            session()->setFlashdata('warningMsg', "Data Pembayaran dari tanggal <b>" . $getData['from'] . "</b> sampai <b>" . $getData['to'] . "</b> tidak ada.");

            return redirect()->to('/dashboard/laporan');
        }

        dd($pembayaran);

        // TODO: render view
    }
}
