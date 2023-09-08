<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfUsers = 50;

        for ($i = 0; $i < $numberOfUsers; $i++) {
            User::create([
                'name' => fake()->unique()->name(),
                'email' => fake()->unique()->email(),
                'password' => fake()->password()
            ]);
        }
    }
}