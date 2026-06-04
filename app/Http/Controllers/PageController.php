<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GymClass;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $categories = Category::withCount('gymClasses')->get();
        $classes = GymClass::with(['trainer.user', 'category'])->take(6)->get();
        return view('home', compact('categories', 'classes'));
    }

    public function planes()
    {
        return view('planes');
    }

    public function inscripcion()
    {
        $classes = GymClass::with('category')->get();
        return view('inscripcion', compact('classes'));
    }

    public function procesarInscripcion(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'plan' => 'required|in:estudiantil,premium,ejecutivo',
            'payment_method' => 'required|in:tarjeta,transferencia,efectivo',
            'card_number' => 'required_if:payment_method,tarjeta|nullable|string',
            'gym_class_id' => 'required|exists:gym_classes,id',
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt('password123'),
            'role' => 'client',
        ]);

        // Crear inscripción
        $enrollment = Enrollment::create([
            'user_id' => $user->id,
            'gym_class_id' => $validated['gym_class_id'],
            'enrollment_date' => now(),
            'status' => 'activo',
        ]);

        return view('confirmacion', [
            'user' => $user,
            'enrollment' => $enrollment,
            'plan' => $validated['plan'],
            'payment' => $validated['payment_method'],
        ]);
    }

    public function clases()
    {
        $classes = GymClass::with(['trainer.user', 'category'])->get();
        return view('clases', compact('classes'));
    }
}