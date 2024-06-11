<?php

namespace App\Database\Seeds;

use App\Utils\Auth;
use App\Utils\Database\Constants\Role;
use CodeIgniter\Database\Seeder;

class User extends Seeder {
    public function run() {
        $dataAdmin = [
            'username' => 'admin',
            'password' => Auth::hashPassword('Admin123'),
            'role' => Role::ADMIN
        ];

        $dataManajer = [
            'username' => 'manajer',
            'password' => Auth::hashPassword('Manajer123'),
            'role' => Role::MANAJER
        ];

        $this->db->table('user')->insert($dataAdmin);
        $this->db->table('user')->insert($dataManajer);
    }
}
