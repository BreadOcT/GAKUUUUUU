<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerMessage;

class CustomerMessageSeeder extends Seeder
{
    public function run(): void
    {
        CustomerMessage::factory(15)->create();
    }
}

