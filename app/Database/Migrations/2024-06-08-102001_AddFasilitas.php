<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFasilitas extends Migration {
    public function up() {
        $fields = [
            'id_fasilitas' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'fasilitas' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_fasilitas');
        $this->forge->createTable('fasilitas');
    }

    public function down() {
        $this->forge->dropTable('fasilitas');
    }
}
