<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPelanggan extends Migration {
    public function up() {
        $fields = [
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 14,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_pelanggan');
        $this->forge->createTable('pelanggan');
    }

    public function down() {
        $this->forge->dropTable('pelanggan');
    }
}
