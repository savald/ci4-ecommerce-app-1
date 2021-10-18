<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Electronics',
                'slug' => 'electronics'
            ],
            [
                'category_name' => 'Handphones',
                'slug' => 'handphones'
            ],
            [
                'category_name' => 'Computers',
                'slug' => 'computers'
            ],
            [
                'category_name' => 'Men Fashion',
                'slug' => 'men-fashion'
            ],
            [
                'category_name' => 'Women Fashion',
                'slug' => 'women-fashion'
            ],
            [
                'category_name' => 'Shoes',
                'slug' => 'shoes'
            ],
            [
                'category_name' => 'Furniture',
                'slug' => 'furniture'
            ],

        ];

        // Using Query Builder
        $this->db->table('categories')->insertBatch($data);
    }
}
