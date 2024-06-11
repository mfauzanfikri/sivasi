<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TipeKamar extends Seeder {
    public function run() {
        $dataStandard = [
            'tipe' => 'standard room',
            'harga' => 200000
        ];

        $dataSuperior = [
            'tipe' => 'superior room',
            'harga' => 300000
        ];

        $dataDeluxe = [
            'tipe' => 'deluxe room',
            'harga' => 400000
        ];

        $this->db->table('tipe_kamar')->insert($dataStandard);
        $this->db->table('tipe_kamar')->insert($dataSuperior);
        $this->db->table('tipe_kamar')->insert($dataDeluxe);
    }
}
