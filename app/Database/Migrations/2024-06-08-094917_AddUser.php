<?php

namespace App\Database\Migrations;

use App\Utils\Database\Constants\Role;
use CodeIgniter\Database\Migration;

class AddUser extends Migration {
    public function up() {
        $fields = [
            'id_user' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 64,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id_user');
        $this->forge->createTable('user');
    }

    public function down() {
        $this->forge->dropTable('user');
    }
}
