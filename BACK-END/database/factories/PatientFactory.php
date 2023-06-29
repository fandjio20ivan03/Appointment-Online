<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                "pat_nom" => fake()->firstName(),
                "pat_prenom" => fake()->lastName(),
                "pat_ville" => fake()->city(),
                "pat_dateNais" => fake()->date(),
                "pat_email" => fake()->safeEmail(),
                "pat_tel" => fake()->phoneNumber(),
        ];
    }
}
