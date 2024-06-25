<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Pelanggan as ModelPelanggan;

class Pelanggan extends BaseController {
    public function index() {
        $modelPelanggan = new ModelPelanggan();

        $pelanggan = $modelPelanggan->findAll();
        // dd($pelanggan);
        $data = [
            'title' => 'Data Pelanggan',
            'pelanggan' => $pelanggan
        ];

        return view('dashboard/data_pelanggan', $data);
    }
}
