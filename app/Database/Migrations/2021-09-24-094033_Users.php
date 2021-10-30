<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'           => true,
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique' => true
            ],
            'password'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone_num'       => [
                'type'       => 'INT',
                'constraint' => '50',
                'null'           => true,
            ],
            'address'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'           => true,
            ],
            'user_image'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'           => true,
                'default' => 'default.jpg'
            ],
            'created_at' => [
                'type'       => 'datetime',
                'null'           => true,
            ],
            'updated_at' => [
                'type'       => 'datetime',
                'null'           => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
