<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFasilitasKamar extends Migration {
    public function up() {
        $fields = [
            'id_tipe_kamar' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
            ],
            'id_fasilitas' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addForeignKey('id_tipe_kamar', 'tipe_kamar', 'id_tipe_kamar', 'CASCADE');
        $this->forge->addForeignKey('id_fasilitas', 'fasilitas', 'id_fasilitas', 'CASCADE');
        $this->forge->createTable('fasilitas_kamar');
    }

    public function down() {
        $this->forge->dropTable('fasilitas_kamar');
    }
}
