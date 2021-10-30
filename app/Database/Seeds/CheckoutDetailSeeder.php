<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CheckoutDetailSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'product_id' => 'Rivaldi',
            'email'    => 'rivaldysalman@gmail.com',
            'password'    => 'rivaldysalman@gmail.com'
        ];

        // Using Query Builder
        $this->db->table('checkoutdetails')->insert($data);
    }
}
