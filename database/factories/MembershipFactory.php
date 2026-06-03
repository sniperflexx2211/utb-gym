<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembershipFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Básica', 'Premium', 'VIP', 'Estudiante', 'Senior']),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 29.99, 149.99),
            'duration_days' => fake()->randomElement([30, 90, 180, 365]),
        ];
    }
}