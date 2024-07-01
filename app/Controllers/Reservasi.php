<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Pembayaran;
use App\Entities\Reservasi as ReservasiEntity;
use App\Models\Kamar;
use App\Models\Pembayaran as PembayaranModel;
use App\Models\Promosi;
use App\Models\Reservasi as ReservasiModel;
use App\Models\TipeKamar;
use App\Utils\Database\Constants\StatusKamar;
use App\Utils\Database\Constants\StatusPembayaran;
use App\Utils\Database\Constants\StatusReservasi;
use CodeIgniter\Exceptions\PageNotFoundException;
use DateInterval;
use DateTime;

class Reservasi extends BaseController {
    public function index() {
        $reservasiModel = new ReservasiModel();
        $pelangganId = session()->get('pelanggan')['id_pelanggan'];

        $reservasi = $reservasiModel->getReservasiByPelangganId($pelangganId);

        $date = (new DateTime())->format('Y-m-d');

        $reservasiAktif = [];
        foreach ($reservasi as $r) {
            if ($r->tanggal_checkin < $date) {
                continue;
            }

            if ($r->status === StatusReservasi::SELESAI && !$r->tanggal_checkout) {
                array_push($reservasiAktif, $r);
            }
        }

        $reservasiMenungguPembayaran = [];
        foreach ($reservasi as $r) {
            if ($r->pembayaran->status === StatusPembayaran::MENUNGGU_PEMBAYARAN) {
                array_push($reservasiMenungguPembayaran, $r);
            }
        }

        $reservasiMenungguKonfirmasi = [];
        foreach ($reservasi as $r) {
            if ($r->pembayaran->status === StatusPembayaran::MENUNGGU_KONFIRMASI) {
                array_push($reservasiMenungguKonfirmasi, $r);
            }
        }

        $reservasiSelesai = [];
        foreach ($reservasi as $r) {
            if (($r->status === StatusReservasi::SELESAI || $r->status === StatusReservasi::GAGAL)) {
                array_push($reservasiSelesai, $r);
            }
        }

        $data = [
            'title' => 'Reservasi',
            'reservasiAktif' => $reservasiAktif,
            'reservasiMenungguPembayaran' => $reservasiMenungguPembayaran,
            'reservasiMenungguKonfirmasi' => $reservasiMenungguKonfirmasi,
            'reservasiSelesai' => $reservasiSelesai
        ];

        return view('/reservasi', $data);
    }

    public function create() {
        $kamarModel = new Kamar();
        $reservasiModel = new ReservasiModel();
        $reservasiEntity = new ReservasiEntity();
        $tipeKamarModel = new TipeKamar();
        $promosiModel = new Promosi();
        $pembayaranModel = new PembayaranModel();
        $pembayaranEntity = new Pembayaran();

        $data = $this->request->getPost();

        if ($data['id_tipe_kamar'] === "0") {
            session()->setFlashdata('error', 'Kolom Tipe Kamar harus diisi.');

            return redirect()->to('/reservasi');
        }

        if ($data['lama'] < 1) {
            session()->setFlashdata('error', 'Kolom Lama Inap harus disi 1 hari atau lebih.');

            return redirect()->to('/reservasi');
        }

        $data['tanggal_selesai'] = (new DateTime($data['tanggal_mulai']))
            ->add(new DateInterval('P' . $data['lama'] . 'D'))
            ->format('Y-m-d');

        $kamar = $kamarModel->getAvailableBetweenDate($data['tanggal_mulai'], $data['tanggal_selesai'], $data['id_tipe_kamar']);

        if (!$kamar) {
            session()->setFlashdata('warning', 'Mohon maaf kamar dengan tipe kamar dan waktu yang dipilih sudah penuh.');

            return redirect()->to('/reservasi');
        }

        if (!empty(trim($data['kode_promosi']))) {
            $promosi = $promosiModel
                ->where('kode_promosi', $data['kode_promosi'])
                ->where('tanggal_kadaluarsa >', (new DateTime())->format('Y-m-d'))
                ->first();

            if (!$promosi) {
                session()->setFlashdata('error', 'Kode promosi tidak valid atau kadaluarsa.');

                return redirect()->to('/reservasi');
            }

            $data['promosi'] = $promosi;
        }

        $data['id_kamar'] = $kamar->id_kamar;
        $data['tanggal'] = (new DateTime())->format('Y-m-d');

        $reservasiEntity->fill($data);
        // dd($reservasiEntity);
        $isSuccess = $reservasiModel->save($reservasiEntity);

        if (!$isSuccess) {
            session()->setFlashdata('error', 'Mohon maaf kamar sistem sedang gangguan, coba lagi nanti.');

            return redirect()->to('/reservasi');
        }

        $tipeKamar = $tipeKamarModel->find($reservasiEntity->id_tipe_kamar);

        $dataPembayaran = [
            'id_reservasi' => $reservasiModel->getInsertID(),
            'jumlah' => $tipeKamar->harga * $reservasiEntity->lama
        ];

        if ($reservasiEntity->promosi) {
            $dataPembayaran['jumlah'] = $dataPembayaran['jumlah'] - ($dataPembayaran['jumlah'] * $reservasiEntity->promosi->potongan);
        }

        $pembayaranEntity->fill($dataPembayaran);
        // dd($pembayaranEntity);
        $isSuccess = $pembayaranModel->save($pembayaranEntity);

        session()->setFlashdata('success', 'Reservasi berhasil dibuat.');

        return redirect()->to('/reservasi');
    }

    public function detail($slug = false) {
        $reservasiModel = new ReservasiModel();

        $reservasi = $reservasiModel->getReservasiById($slug);

        if (!$reservasi) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($reservasi->id_pelanggan !== session()->get('pelanggan')['id_pelanggan']) {
            throw PageNotFoundException::forPageNotFound();
        }
        // dd($reservasi);
        $data = [
            'title' => 'Detail Reservasi',
            'reservasi' => $reservasi
        ];

        return view('detail_reservasi', $data);
    }

    public function pembayaran($slug = false) {
        $reservasiModel = new ReservasiModel();

        $reservasi = $reservasiModel->getReservasiById($slug);

        if (!$reservasi) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($reservasi->id_pelanggan !== session()->get('pelanggan')['id_pelanggan']) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($reservasi->pembayaran->status !== StatusPembayaran::MENUNGGU_PEMBAYARAN) {
            return redirect()->to('/reservasi/' . $slug);
        }
        // dd($reservasi);
        $data = [
            'title' => 'Detail Reservasi',
            'reservasi' => $reservasi
        ];

        return view('pembayaran', $data);
    }

    public function bayar() {
        $pembayaranModel = new PembayaranModel();

        $data = $this->request->getPost();
        $file = $this->request->getFile('bukti');

        $fileName = (new DateTime())->format('Y-m-d') . '.' . $data['id_pembayaran'] . '-' . $data['id_reservasi'] . '.' . $file->getExtension();
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move(PUBLIC_PATH . 'uploads\\bukti_pembayaran', $fileName, true);
        }

        $date = (new DateTime())->format('Y-m-d');

        $pembayaran = $pembayaranModel->where('id_reservasi', $data['id_reservasi'])
            ->first();

        $pembayaran->tanggal = $date;
        $pembayaran->status = StatusPembayaran::MENUNGGU_KONFIRMASI;
        $pembayaran->path_bukti_bayar = base_url() . 'uploads/bukti_pembayaran/' . $fileName;

        // dd($pembayaran);
        $pembayaranModel->save($pembayaran);

        return redirect()->to('/reservasi' . $data['id_reservasi']);
    }
}
