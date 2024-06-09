<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPromosi extends Migration {
    public function up() {
        $fields = [
            'id_promosi' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_tipe_kamar' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
            ],
            'potongan' => [
                'type' => 'FLOAT',
                'constraint' => 3,
            ],
            'tanggal_kadaluarsa' => [
                'type' => 'DATE'
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_promosi');
        $this->forge->addForeignKey('id_tipe_kamar', 'tipe_kamar', 'id_tipe_kamar', 'CASCADE');
        $this->forge->createTable('promosi');
    }

    public function down() {
        $this->forge->dropTable('promosi');
    }
}
