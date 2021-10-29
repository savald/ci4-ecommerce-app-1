<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CheckoutDetail extends Migration
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
            'checkout_id'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'product_id'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('checkoutdetails');
    }

    public function down()
    {
        $this->forge->dropTable('checkoutdetails');
    }
}
