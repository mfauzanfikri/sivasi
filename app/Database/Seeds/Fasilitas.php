<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Fasilitas extends Seeder {
    public function run() {
        $data = [
            ['fasilitas' => 'Kipas Angin'],
            ['fasilitas' => 'Free WIFI'],
            ['fasilitas' => 'Televisi'],
            ['fasilitas' => 'Lemari'],
            ['fasilitas' => 'Meja dan Kursi'],
            ['fasilitas' => 'Kamar Mandi'],
            ['fasilitas' => 'Wastafel'],
            ['fasilitas' => 'AC'],
            ['fasilitas' => 'Kamar lebih luas dari Standard Room'],
            ['fasilitas' => 'Sarapan Pagi'],
            ['fasilitas' => 'Kamar lebih luas dari Supeior Room'],
            ['fasilitas' => 'Balkon Kamar'],
        ];

        foreach ($data as $value) {
            $this->db->table('fasilitas')->insert($value);
        }
    }
}
