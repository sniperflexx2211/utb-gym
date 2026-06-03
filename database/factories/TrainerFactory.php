<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'specialization' => fake()->randomElement(['Fuerza', 'Resistencia', 'Flexibilidad', 'HIIT']),
            'bio' => fake()->paragraph(),
            'hourly_rate' => fake()->randomFloat(2, 20, 80),
        ];
    }
}