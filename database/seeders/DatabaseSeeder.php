<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tentor;
use Database\Seeders\UserSeeder;
use Database\Seeders\CustomerMessageSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CustomerMessageSeeder::class,
        ]);
                // 1. Buat Akun Siswa Dummy


        // 3. Generate 10 Tentor Tersedia
        Tentor::factory(10)->create();
    }
}
