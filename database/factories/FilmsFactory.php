<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Films>
 */
class FilmsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idfilms' => rand(1,100),
            'namafilm' => fake()->name(),
            'durasi' => '',
            'genre' => fake()->name(),
            'sutradara' => fake()->name(),
            'sinopsis' => fake()->name()
        ];
    }
}
