<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Promosi extends Seeder {
    public function run() {
        $data = [
            'id_tipe_kamar' => 2,
            'kode_promosi' => 'SUPER10',
            'potongan' => 0.1,
            'tanggal_kadaluarsa' => '2024-07-10'
        ];

        $this->db->table('promosi')->insert($data);
    }
}
