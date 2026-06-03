<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class GymClassFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Spinning', 'Zumba', 'Body Pump', 'Yoga Flow', 'Boxeo']),
            'description' => fake()->sentence(),
            'capacity' => fake()->numberBetween(10, 30),
            'start_time' => fake()->time('H:i'),
            'end_time' => fake()->time('H:i', '+2 hours'),
            'day' => fake()->randomElement(['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']),
        ];
    }
}