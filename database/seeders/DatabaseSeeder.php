<?php

namespace Database\Seeders;

use App\Models\cartid;
use App\Models\products;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        products::create([
           'p_image'=> 'img/Tomato.jpeg',
           'p_name' => 'tomato',
           'p_mass' => '100',
           'p_price' => '10'
        ]);

        products::create([
         'p_image'=> 'img/potato.jpg',
            'p_name' => 'potato',
            'p_mass' => '100',
            'p_price' => '10'
         ]);

         products::create([
            'p_image'=> 'img/carrot.jpg',
            'p_name' => 'carrot',
            'p_mass' => '100',
            'p_price' => '10'
         ]);

         products::create([
            'p_image'=> 'img/apple.webp',
            'p_name' => 'apple',
            'p_mass' => '100',
            'p_price' => '10'
         ]);

         products::create([
            'p_image'=> 'img/strewberry.jpg',
           'p_name' => 'strawberry',
           'p_mass' => '100',
           'p_price' => '100'
         ]);

         cartid::create([
            "c_id"=>1,
         ]);
    }
}
