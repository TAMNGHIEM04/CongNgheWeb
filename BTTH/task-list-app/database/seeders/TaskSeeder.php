<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Task::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'long_description' => $faker->text,
                'completed' => $faker->boolean
            ]);
        }
    }
}