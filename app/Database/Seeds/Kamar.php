<?php

namespace App\Database\Seeds;

use App\Utils\Database\Constants\StatusKamar;
use CodeIgniter\Database\Seeder;

class Kamar extends Seeder {
    public function run() {
        $data = [
            [
                'id_tipe_kamar' => 1,
                'no_kamar' => '001',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 1,
                'no_kamar' => '002',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 1,
                'no_kamar' => '003',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 2,
                'no_kamar' => '004',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 2,
                'no_kamar' => '005',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 2,
                'no_kamar' => '006',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 3,
                'no_kamar' => '007',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 3,
                'no_kamar' => '008',
                'status' => StatusKamar::TERSEDIA
            ],
            [
                'id_tipe_kamar' => 3,
                'no_kamar' => '009',
                'status' => StatusKamar::TERSEDIA
            ],
        ];

        foreach ($data as $value) {
            $this->db->table('kamar')->insert($value);
        }
    }
}
