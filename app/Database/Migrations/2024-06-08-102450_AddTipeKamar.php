<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTipeKamar extends Migration {
    public function up() {
        $fields = [
            'id_tipe_kamar' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tipe' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'harga' => [
                'type' => 'FLOAT',
                'constraint' => 10
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_tipe_kamar');
        $this->forge->createTable('tipe_kamar');
    }

    public function down() {
        $this->forge->dropTable('tipe_kamar');
    }
}
