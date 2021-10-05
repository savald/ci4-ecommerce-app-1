<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{ 
    public function run()
    {
        $data = [
            ['category_name' => 'Electronics'],
            ['category_name' => 'Handphones'],
            ['category_name' => 'Computers'],
            ['category_name' => 'Men Fashion'],
            ['category_name' => 'Women Fashion'],
            ['category_name' => 'Shoes'],
            ['category_name' => 'Furniture'],

        ];

        // Using Query Builder
        $this->db->table('categories')->insertBatch($data);
    }
}
