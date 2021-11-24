<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
            'product_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'category_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null'           => true,
            ],
            'price' => [
                'type' => 'INT',
                'constraint'     => 11,
            ],
            'product_image'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default' => 'default_product.png'
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
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
