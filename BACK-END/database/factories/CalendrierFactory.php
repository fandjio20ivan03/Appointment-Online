<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calendrier>
 */
class CalendrierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date" => fake()->date(),
            "heure_debut" => fake()->time(),
            "heure_fin" => fake()->time(),
        ];
    }
}
