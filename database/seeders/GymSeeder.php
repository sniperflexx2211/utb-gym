<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Enrollment;
use App\Models\GymClass;
use App\Models\Image;
use App\Models\Membership;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Seeder;

class GymSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear Categorías
        $categories = Category::factory()->count(3)->create();

        // 2. Crear Usuarios Clientes (para inscripciones)
        $clients = User::factory()->count(100)->create(['role' => 'client']);

        // 3. Crear Entrenadores con sus usuarios
        $trainers = [];
        for ($i = 0; $i < 10; $i++) {
            $user = User::factory()->create(['role' => 'trainer']);
            $trainer = Trainer::factory()->create(['user_id' => $user->id]);
            $trainers[] = $trainer;

            // Imágenes polimórficas para entrenadores
            Image::factory()->create([
                'imageable_id' => $trainer->id,
                'imageable_type' => Trainer::class,
                'url' => "https://picsum.photos/seed/trainer{$i}/400/400"
            ]);
        }

        // 4. Crear Clases de Gimnasio (50 clases)
        $gymClasses = [];
        for ($i = 0; $i < 50; $i++) {
            $trainer = $trainers[array_rand($trainers)];
            $category = $categories->random();
            
            $gymClass = GymClass::factory()->create([
                'trainer_id' => $trainer->id,
                'category_id' => $category->id,
            ]);
            $gymClasses[] = $gymClass;

            // Imágenes polimórficas para clases
            Image::factory()->create([
                'imageable_id' => $gymClass->id,
                'imageable_type' => GymClass::class,
                'url' => "https://picsum.photos/seed/class{$i}/600/400"
            ]);

            // Comentarios polimórficos para clases
            Comment::factory()->create([
                'user_id' => $clients->random()->id,
                'commentable_id' => $gymClass->id,
                'commentable_type' => GymClass::class,
                'content' => fake()->paragraph()
            ]);
        }

        // 5. Crear Inscripciones (400 enrollments = Many-to-Many)
        foreach ($clients as $client) {
            $numClasses = rand(2, 8); // Cada cliente se inscribe a 2-8 clases
            $selectedClasses = collect($gymClasses)->random($numClasses);
            
            foreach ($selectedClasses as $gymClass) {
                Enrollment::factory()->create([
                    'user_id' => $client->id,
                    'gym_class_id' => $gymClass->id,
                ]);
            }
        }

        // 6. Crear Membresías
        Membership::factory()->count(5)->create();

        // Total aproximado: 3 + 110 + 10 + 50 + 400 + 5 + ~100 imágenes/comentarios = ~678 registros ✅
    }
}