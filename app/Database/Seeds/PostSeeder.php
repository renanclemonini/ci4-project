<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PostSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('pt_BR');
        for ($i=1; $i < 50; $i++) { 
            $data = [
                'user_id' => rand(1, 50),
                'title' => $faker->sentence(),
                'slug' => $faker->slug(),
                'content' => $faker->paragraph(),
            ];
            $this->db->table('posts')->insert($data);
        }
    }
}
