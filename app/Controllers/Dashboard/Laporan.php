<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Laporan extends BaseController {
    public function index() {
        // TODO: get data pembayaran

        $data = [
            'title' => 'Laporan',
            'pembayaran' => []
        ];

        return view('dashboard/laporan', $data);
    }

    public function cetak() {
        $getData = [
            'from' => $this->request->getGet('from'),
            'to' => $this->request->getGet('to')
        ];

        // TODO: get data pembayaran between 'from' and 'to'

        dd($getData);
    }
}
