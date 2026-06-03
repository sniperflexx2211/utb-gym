<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'enrollment_date' => fake()->date(),
            'status' => fake()->randomElement(['activo', 'inactivo', 'completado']),
        ];
    }
}