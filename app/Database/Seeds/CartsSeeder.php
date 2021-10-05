<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CartsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'user_id' => 1,
            'product_id' => 1,
            'category_id' => 1,
        ];

        // Using Query Builder
        $this->db->table('carts')->insert($data);
    }
}
