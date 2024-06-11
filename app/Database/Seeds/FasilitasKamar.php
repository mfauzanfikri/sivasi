<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FasilitasKamar extends Seeder {
    public function run() {
        $data = [
            ['id_tipe_kamar' => 1, 'id_fasilitas' => 1],
            ['id_tipe_kamar' => 1, 'id_fasilitas' => 2],
            ['id_tipe_kamar' => 1, 'id_fasilitas' => 3],
            ['id_tipe_kamar' => 1, 'id_fasilitas' => 4],
            ['id_tipe_kamar' => 1, 'id_fasilitas' => 5],
            ['id_tipe_kamar' => 1, 'id_fasilitas' => 6],
            ['id_tipe_kamar' => 1, 'id_fasilitas' => 7],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 8],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 2],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 3],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 4],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 5],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 6],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 7],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 9],
            ['id_tipe_kamar' => 2, 'id_fasilitas' => 10],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 8],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 2],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 3],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 4],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 5],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 6],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 7],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 10],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 11],
            ['id_tipe_kamar' => 3, 'id_fasilitas' => 12],
        ];

        foreach ($data as $value) {
            $this->db->table('fasilitas_kamar')->insert($value);
        }
    }
}
