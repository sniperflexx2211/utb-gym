@extends('layouts.app')
@section('title', 'Planes de Membresía')
@section('content')

<section class="py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h1 class="text-5xl font-black mb-4">Elige tu Plan</h1>
            <p class="text-xl text-gray-600">Planes flexibles para cada estilo de vida</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <!-- Plan Estudiantil -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover border-2 border-gray-200">
                <div class="text-center">
                    <div class="text-6xl mb-4">🎓</div>
                    <h3 class="text-3xl font-black mb-2">Estudiantil</h3>
                    <p class="text-gray-500 mb-6">Para estudiantes UTB</p>
                    <div class="mb-6">
                        <span class="text-5xl font-black text-blue-600">Bs. 99</span>
                        <span class="text-gray-500">/mes</span>
                    </div>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Acceso a sala de musculación</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> 2 clases grupales/semana</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Horario: 6am - 4pm</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Carnet estudiantil requerido</li>
                    <li class="flex items-center text-gray-400"><span class="mr-2">✗</span> Entrenador personal</li>
                    <li class="flex items-center text-gray-400"><span class="mr-2">✗</span> Zona VIP</li>
                </ul>
                <a href="/inscripcion?plan=estudiantil" class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-full font-bold transition">
                    Elegir Plan
                </a>
            </div>

            <!-- Plan Premium (Destacado) -->
            <div class="bg-gradient-to-b from-red-600 to-red-800 text-white rounded-2xl shadow-2xl p-8 card-hover border-4 border-yellow-400 transform scale-105 relative">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-yellow-400 text-gray-900 px-6 py-1 rounded-full font-bold text-sm">
                    ⭐ MÁS POPULAR
                </div>
                <div class="text-center">
                    <div class="text-6xl mb-4">💎</div>
                    <h3 class="text-3xl font-black mb-2">Premium</h3>
                    <p class="opacity-90 mb-6">El más elegido</p>
                    <div class="mb-6">
                        <span class="text-5xl font-black">Bs. 199</span>
                        <span class="opacity-90">/mes</span>
                    </div>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center"><span class="text-yellow-300 mr-2">✓</span> Acceso ilimitado 24/7</li>
                    <li class="flex items-center"><span class="text-yellow-300 mr-2">✓</span> Todas las clases grupales</li>
                    <li class="flex items-center"><span class="text-yellow-300 mr-2">✓</span> Sauna y spa</li>
                    <li class="flex items-center"><span class="text-yellow-300 mr-2">✓</span> Plan nutricional básico</li>
                    <li class="flex items-center"><span class="text-yellow-300 mr-2">✓</span> 2 sesiones PT/mes</li>
                    <li class="flex items-center text-gray-300"><span class="mr-2">✗</span> Zona VIP exclusiva</li>
                </ul>
                <a href="/inscripcion?plan=premium" class="block text-center bg-yellow-400 hover:bg-yellow-500 text-gray-900 py-3 rounded-full font-bold transition">
                    Elegir Plan ⭐
                </a>
            </div>

            <!-- Plan Ejecutivo -->
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover border-2 border-gray-200">
                <div class="text-center">
                    <div class="text-6xl mb-4">👔</div>
                    <h3 class="text-3xl font-black mb-2">Ejecutivo VIP</h3>
                    <p class="text-gray-500 mb-6">Experiencia exclusiva</p>
                    <div class="mb-6">
                        <span class="text-5xl font-black text-purple-600">Bs. 399</span>
                        <span class="text-gray-500">/mes</span>
                    </div>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Todo lo del Premium</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Entrenador personal ilimitado</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Zona VIP exclusiva</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Plan nutricional completo</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Locker personal</li>
                    <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> Toallas y amenities</li>
                </ul>
                <a href="/inscripcion?plan=ejecutivo" class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-full font-bold transition">
                    Elegir Plan
                </a>
            </div>

        </div>

        <!-- Comparativa -->
        <div class="mt-16 bg-gray-100 rounded-2xl p-8">
            <h3 class="text-3xl font-black text-center mb-8">¿Por qué elegir UTB GYM?</h3>
            <div class="grid md:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-5xl mb-2">🏆</div>
                    <h4 class="font-bold">+10 años</h4>
                    <p class="text-gray-600">de experiencia</p>
                </div>
                <div>
                    <div class="text-5xl mb-2">👥</div>
                    <h4 class="font-bold">+5,000</h4>
                    <p class="text-gray-600">miembros activos</p>
                </div>
                <div>
                    <div class="text-5xl mb-2">🏋️</div>
                    <h4 class="font-bold">+50</h4>
                    <p class="text-gray-600">clases semanales</p>
                </div>
                <div>
                    <div class="text-5xl mb-2">⭐</div>
                    <h4 class="font-bold">4.9/5</h4>
                    <p class="text-gray-600">calificación</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection