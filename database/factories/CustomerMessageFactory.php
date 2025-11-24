<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerMessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => null,
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'message' => $this->faker->paragraph(),
            'reply' => null,
            'status' => 'Belum'
        ];
    }
}
