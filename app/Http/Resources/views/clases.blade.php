@extends('layouts.app')
@section('title', 'Nuestras Clases')
@section('content')

<section class="py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-black mb-4">Todas Nuestras Clases</h1>
            <p class="text-xl text-gray-600">Encuentra la clase perfecta para ti</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($classes as $class)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                <div class="h-40 gradient-bg flex items-center justify-center text-white text-5xl">
                    @if(str_contains($class->name, 'Spinning')) 🚴
                    @elseif(str_contains($class->name, 'Yoga')) 🧘
                    @elseif(str_contains($class->name, 'Zumba')) 💃
                    @elseif(str_contains($class->name, 'Boxeo')) 🥊
                    @elseif(str_contains($class->name, 'Pump')) 🏋️
                    @else 💪 @endif
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">{{ $class->name }}</h3>
                        <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-bold">
                            {{ $class->category->name }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">{{ $class->description }}</p>
                    <div class="space-y-2 text-sm">
                        <p>📅 <strong>{{ ucfirst($class->day) }}</strong></p>
                        <p>⏰ {{ $class->start_time }} - {{ $class->end_time }}</p>
                        <p>👥 Capacidad: {{ $class->capacity }} personas</p>
                        <p>👨‍🏫 {{ $class->trainer->user->name ?? 'Por asignar' }}</p>
                    </div>
                    <a href="/inscripcion" class="block text-center mt-4 bg-red-600 hover:bg-red-700 text-white py-2 rounded-full font-bold transition">
                        Inscribirme
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection