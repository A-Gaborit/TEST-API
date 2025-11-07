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
            'name' => 'Test Player',
            'email' => 'player@test.fr',
            'role_id' => 1,
        ]);
        
        $user = User::factory()->create([
            'name' => 'Test Partner',
            'email' => 'partner@test.fr',
            'role_id' => 2,
        ]);
    }
}
