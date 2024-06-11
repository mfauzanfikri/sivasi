<?php

namespace App\Database\Seeds;

use App\Utils\Auth;
use CodeIgniter\Database\Seeder;

class Pelanggan extends Seeder {
    public function run() {
        $data = [
            'username' => 'pelanggan',
            'password' => Auth::hashPassword('Pelanggan123'),
            'nama' => 'Pelanggan',
            'alamat' => 'Jl. ABC',
            'no_telepon' => '08xxx'
        ];

        $this->db->table('pelanggan')->insert($data);
    }
}
