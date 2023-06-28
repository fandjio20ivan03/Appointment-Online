<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Specialite;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medecin>
 */
class MedecinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // dd(array_rand(Specialite::all()->pluck('id')->toArray()));

        return [
                "med_nom" => fake()->firstName(),
                "med_prenom" => fake()->lastName(),
                "med_ville" => fake()->city(),
                "med_dateNais" => fake()->date(),
                "med_email" => fake()->safeEmail(),
                "med_tel" => fake()->phoneNumber(),
                "specialite_id" => (Specialite::all()->pluck('id')->toArray())[array_rand(Specialite::all()->pluck('id')->toArray())],
        ];
    }

}
