<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post; // Import the Post model
use Faker\Factory as Faker; // Import Faker for generating fake data

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker
        $faker = Faker::create();

        // Create 50 dummy posts
        for ($i = 0; $i < 50; $i++) {
            Post::create([
                'title' => $faker->sentence(rand(3, 8)), 
                'content' => $faker->paragraphs(rand(3, 7), true), 
            ]);
        }
    }
}
