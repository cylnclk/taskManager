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
            'name' => 'Ceylan',
            'email' => 'ceylan@bakicibul.net',
            'password' => Hash::make('secret'),
        ]);

        User::factory()->create([
            'name' => 'User 1',
            'email' => 'user1@bakicibul.net',
            'password' => Hash::make('secret'),
        ]);
        User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@bakicibul.net',
            'password' => Hash::make('secret'),
        ]);
        User::factory()->create([
            'name' => 'User 3',
            'email' => 'user3@bakicibul.net',
            'password' => Hash::make('secret'),
        ]);
        User::factory()->create([
            'name' => 'User 4',
            'email' => 'user4@bakicibul.net',
            'password' => Hash::make('secret'),
        ]);
    }
}
