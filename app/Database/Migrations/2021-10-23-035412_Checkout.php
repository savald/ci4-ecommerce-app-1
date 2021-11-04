<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Checkout extends Migration
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
            'user_id'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'total_order'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'total_price'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'order_date'       => [
                'type'       => 'datetime',
                'null'           => true,
            ],
            'deadline_payment'       => [
                'type'       => 'datetime',
                'null'           => true,
            ],
            'status'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'           => true,
                'default' => 'pending'
            ],
            'order_completed'       => [
                'type'       => 'datetime',
                'null'           => true,
            ],
            'invoice'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('checkouts');
    }

    public function down()
    {
        $this->forge->dropTable('checkouts');
    }
}
