<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user1234'),
                'role' => 'user',
            ]
        ]);
    }
}
