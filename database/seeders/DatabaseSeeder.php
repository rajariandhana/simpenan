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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Gibran Rakabuming Raka',
            'email' => 'fufu@fafa.com',
            'password'=>Hash::make('password')
        ]);
        User::factory()->create([
            'name' => 'Mulyono',
            'email' => 'mul@yono.com',
            'password'=>Hash::make('password')
        ]);
    }
}
