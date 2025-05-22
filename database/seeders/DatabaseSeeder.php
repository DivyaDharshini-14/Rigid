<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin146@gmail.com',
            'password' => Hash::make('admin146'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'manager',
            'email' => 'divya146@gmail.com',
            'password' => Hash::make('divya146'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'divi',
            'email' => 'divi@gmail.com',
            'password' => Hash::make('divi@146'),
        ]);
    }
}
