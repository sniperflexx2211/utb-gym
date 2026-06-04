@extends('layouts.app')
@section('title', 'Inicio - Transforma tu cuerpo')
@section('content')

<!-- Hero Section -->
<section class="gradient-bg text-white py-24">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-6xl font-black mb-6">TRANSFORMA TU CUERPO</h1>
        <p class="text-2xl mb-8 opacity-90">El mejor gimnasio de la ciudad te espera</p>
        <a href="/planes" class="bg-red-600 hover:bg-red-700 text-white px-10 py-4 rounded-full text-xl font-bold transition inline-block">
            Ver Planes 🚀
        </a>
    </div>
</section>

<!-- Categorías -->
<section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-black text-center mb-12">Nuestras Categorías</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($categories as $cat)
            <div class="bg-white p-8 rounded-2xl shadow-lg card-hover text-center">
                <div class="text-6xl mb-4">
                    @if($cat->name == 'Musculación') 🏋️
                    @elseif($cat->name == 'Cardio') 🏃
                    @elseif($cat->name == 'Yoga') 🧘
                    @elseif($cat->name == 'CrossFit') 💥
                    @elseif($cat->name == 'Pilates') 🤸
                    @else ⭐ @endif
                </div>
                <h3 class="text-2xl font-bold mb-2">{{ $cat->name }}</h3>
                <p class="text-gray-600">{{ $cat->description }}</p>
                <p class="mt-4 text-red-600 font-bold">{{ $cat->gym_classes_count }} clases disponibles</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Clases Destacadas -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-black text-center mb-12">Clases Destacadas</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($classes as $class)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="h-48 gradient-bg flex items-center justify-center text-white text-6xl">
                    💪
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $class->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $class->description }}</p>
                    <div class="flex justify-between text-sm">
                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">📅 {{ $class->day }}</span>
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full">⏰ {{ $class->start_time }}</span>
                    </div>
                    <p class="mt-4 text-gray-500">👨‍🏫 {{ $class->trainer->user->name ?? 'Por asignar' }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/clases" class="bg-gray-900 hover:bg-gray-800 text-white px-8 py-3 rounded-full font-bold transition">
                Ver todas las clases →
            </a>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16 bg-red-600 text-white text-center">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-black mb-4">¿Listo para el cambio?</h2>
        <p class="text-xl mb-8">Únete hoy y obtén 50% de descuento en tu primer mes</p>
        <a href="/inscripcion" class="bg-white text-red-600 px-10 py-4 rounded-full text-xl font-bold hover:bg-gray-100 transition inline-block">
            ¡Inscríbete Ahora!
        </a>
    </div>
</section>

@endsection