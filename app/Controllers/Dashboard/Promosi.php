<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Entities\Promosi as PromosiEntity;
use App\Models\Promosi as PromosiModel;
use App\Models\TipeKamar;
use CodeIgniter\HTTP\ResponseInterface;

class Promosi extends BaseController {
    public function index() {
        $promosiModel = new PromosiModel();
        $tipeKamarModel = new TipeKamar();

        $promosi = $promosiModel->findAll();

        foreach ($promosi as $p) {
            $tipeKamar = $tipeKamarModel->where('id_tipe_kamar', $p->id_tipe_kamar)
                ->first();

            $p->tipe_kamar = $tipeKamar;
        }

        $tipeKamar = $tipeKamarModel->findAll();
        // dd($promosi);
        $data = [
            'title' => 'Data Promosi',
            'promosi' => $promosi,
            'tipeKamar' => $tipeKamar
        ];

        return view('dashboard/data_promosi', $data);
    }

    public function create() {
        $promosiModel = new PromosiModel();
        $promosiEntity = new PromosiEntity();

        $data = $this->request->getPost();
        // dd($data);
        $isExist = $promosiModel->where('kode_promosi', $data['kode_promosi'])
            ->first();

        if ($isExist) {
            session()->setFlashdata('error', 'Kode promosi sudah ada.');

            return redirect()->back();
        }

        if (isset($data['tampilkan']) && $data['tampilkan'] === '1') {
            $data['tampilkan'] = true;
        }

        $data['potongan'] = ((float)$data['potongan']) / 100;

        $promosiEntity->fill($data);
        // dd($promosiEntity);
        $promosiModel->save($promosiEntity);

        session()->setFlashdata('success', 'Promosi berhasil ditambahkan.');

        return redirect()->back();
    }

    public function edit() {
        $promosiModel = new PromosiModel();

        $data = $this->request->getPost();

        $data['tampilkan'] = $data['tampilkan'] ? true : false;

        $promosi = $promosiModel->where('id_promosi', $data['id_promosi'])
            ->first();

        $promosi->tampilkan = $data['tampilkan'];
        // dd($promosi);
        $promosiModel->save($promosi);

        session()->setFlashdata('success', 'Promosi berhasil diedit.');

        return redirect()->back();
    }


    public function delete() {
        $promosiModel = new PromosiModel();

        $data = $this->request->getPost();
        // dd($data);
        $promosiModel->delete($data['id_promosi']);

        session()->setFlashdata('success', 'Promosi berhasil dihapus.');

        return redirect()->back();
    }
}
