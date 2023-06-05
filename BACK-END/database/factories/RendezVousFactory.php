<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rendez_vous;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rendez_vous>
 */
class RendezVousFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
  protected $model = Rendez_vous::class;
  
    public function definition(): array
    {
        return [
            'date' => now(),
            'heure' => now(),
        ];
    }

    
}
