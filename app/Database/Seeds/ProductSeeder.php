<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'product_name' => 'Earphone',
                'user_id'    => 1,
                'category_id'    => 1,
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?',
                'price'    => 30000,
            ],
            [
                'product_name' => 'Laptop',
                'user_id'    => 2,
                'category_id'    => 3,
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?',
                'price'    => 50000,
            ],
            [
                'product_name' => 'Sneakers',
                'user_id'    => 2,
                'category_id'    => 7,
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?',
                'price'    => 50000,
            ],
            [
                'product_name' => 'T-Shirt',
                'user_id'    => 1,
                'category_id'    => 4,
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?',
                'price'    => 50000,
            ],
            [
                'product_name' => 'Dress',
                'user_id'    => 2,
                'category_id'    => 5,
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?',
                'price'    => 50000,
            ],
            [
                'product_name' => 'Iphone',
                'user_id'    => 1,
                'category_id'    => 2,
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus fuga, dolore sequi, reprehenderit quam cupiditate alias, error quibusdam dolor est nihil laudantium officia deserunt expedita consequuntur unde minus cumque asperiores?',
                'price'    => 50000,
            ],
        ];

        // Using Query Builder
        $this->db->table('products')->insertBatch($data);
    }
}
