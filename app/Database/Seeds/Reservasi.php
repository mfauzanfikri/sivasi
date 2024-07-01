<?php

namespace App\Database\Seeds;

use App\Utils\Database\Constants\StatusReservasi;
use CodeIgniter\Database\Seeder;
use DateInterval;
use DateTime;

class Reservasi extends Seeder {
    public function run() {
        $data = [
            'id_pelanggan' => 1,
            'id_kamar' => 1,
            'tanggal' => (new DateTime())->format('Y-m-d'),
            'lama' => 3,
            'tanggal_mulai' => (new DateTime())->add(new DateInterval('P1D'))->format('Y-m-d'),
            'tanggal_selesai' => (new DateTime())->add(new DateInterval('P4D'))->format('Y-m-d'),
            'status' => StatusReservasi::PROSES
        ];

        $this->db->table('reservasi')->insert($data);
    }
}
