<?php

namespace App\Database\Migrations;

use App\Utils\Database\Constants\StatusKamar;
use CodeIgniter\Database\Migration;

class AddKamar extends Migration {
    public function up() {
        $fields = [
            'id_kamar' => [
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
            'no_kamar' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'default' => StatusKamar::KOSONG
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_kamar');
        $this->forge->addForeignKey('id_tipe_kamar', 'tipe_kamar', 'id_tipe_kamar', 'CASCADE');
        $this->forge->createTable('kamar');
    }

    public function down() {
        $this->forge->dropTable('kamar');
    }
}
