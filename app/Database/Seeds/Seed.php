<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('PostSeeder');
    }
}
