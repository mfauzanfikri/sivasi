<?php

namespace App\Database\Migrations;

use App\Utils\Database\Constants\StatusPembayaran;
use CodeIgniter\Database\Migration;

class AddPembayaran extends Migration {
    public function up() {
        $fields = [
            'id_pembayaran' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_reservasi' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'jumlah' => [
                'type' => 'FLOAT',
                'constraint' => '14',
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'default' => StatusPembayaran::PROSES
            ], 'path_bukti_bayar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_pembayaran');
        $this->forge->addForeignKey('id_reservasi', 'reservasi', 'id_reservasi', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down() {
        $this->forge->dropTable('pembayaran');
    }
}
