<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin default
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'is_active' => true
        ]);

        User::create([
            'name' => 'Siswa Cerdas',
            'email' => 'siswa@bimbel.com',
            'password' => bcrypt('password'),
            'role' => 'siswa'
        ]);


        // Generate sample users
        User::factory(20)->create();
    }
}
