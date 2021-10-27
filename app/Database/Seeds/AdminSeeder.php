<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = ['username' => 'theRoq','email'    => 'roq@gmail.com','password' => 'theRoq'];

        $this->db->table('admin')->insert($data);
    }
}
