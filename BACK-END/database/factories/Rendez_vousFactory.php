<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medecin;
use App\Models\Patient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rendez_vous>
 */
class Rendez_vousFactory extends Factory
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
            "role" => fake()->randomElement(['en attente', 'annuler']),
            "medecin_id" => (Medecin::all()->pluck('id')->toArray())[array_rand(Medecin::all()->pluck('id')->toArray())],
            "patient_id" => (Patient::all()->pluck('id')->toArray())[array_rand(Patient::all()->pluck('id')->toArray())],
        ];
    }
}
