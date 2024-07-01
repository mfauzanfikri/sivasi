<?php

namespace App\Database\Migrations;

use App\Utils\Database\Constants\StatusReservasi;
use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddReservasi extends Migration {
    public function up() {
        $fields = [
            'id_reservasi' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pelanggan' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
            ],
            'id_kamar' => [
                'type' => 'INT',
                'constraint' => '12',
                'unsigned' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'lama' => [
                'type' => 'INT',
                'constraint' => 3
            ],
            'tanggal_mulai' => [
                'type' => 'DATE'
            ],
            'tanggal_selesai' => [
                'type' => 'DATE'
            ],
            'tanggal_checkin' => [
                'type' => 'DATE',
                'null' => true
            ],
            'tanggal_checkout' => [
                'type' => 'DATE',
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'default' => StatusReservasi::PROSES
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_reservasi');
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE');
        $this->forge->addForeignKey('id_kamar', 'kamar', 'id_kamar', 'CASCADE');
        $this->forge->createTable('reservasi');
    }

    public function down() {
        $this->forge->dropTable('reservasi');
    }
}
