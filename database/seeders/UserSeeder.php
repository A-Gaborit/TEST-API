<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'Player',
            'pseudo' => 'testplayer',
            'email' => 'player@test.fr'
        ]);
        
        $user = User::factory()->create([
            'firstname' => 'Test',
            'lastname' => 'Partner',
            'pseudo' => 'testpartner',
            'email' => 'partner@test.fr'
        ]);
    }
}
