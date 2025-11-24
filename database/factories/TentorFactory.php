<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tentor>
 */
class TentorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_tentor' => $this->faker->name(),
            'mata_pelajaran' => $this->faker->randomElement(['Matematika', 'Fisika', 'Biologi', 'B.Inggris']),
            'bio' => $this->faker->sentence(),
        ];
    }

}
