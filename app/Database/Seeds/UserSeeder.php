<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Rivaldi',
            'email'    => 'rivaldysalman@gmail.com',
            'password'    => 'rivaldysalman@gmail.com'
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
