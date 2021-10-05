<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reviews extends Migration
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
      'user_id'          => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
      ],
      'product_id'          => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
      ],
      'review' => [
        'type' => 'TEXT',
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
    $this->forge->createTable('reviews');
  }

  public function down()
  {
    $this->forge->dropTable('reviews');
  }
}
