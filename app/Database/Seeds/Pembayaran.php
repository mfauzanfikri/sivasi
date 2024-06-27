<?php

namespace App\Database\Seeds;

use App\Utils\Database\Constants\StatusPembayaran;
use CodeIgniter\Database\Seeder;
use DateTime;

class Pembayaran extends Seeder {
    public function run() {
        $data = [
            'id_reservasi' => 1,
            'jumlah' => 3000000,
            'status' => StatusPembayaran::PROSES
        ];

        $this->db->table('pembayaran')->insert($data);
    }
}
