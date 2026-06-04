@extends('layouts.app')
@section('title', 'Inscripción Exitosa')
@section('content')

<section class="py-16">
    <div class="container mx-auto px-6 max-w-2xl">
        <div class="bg-white rounded-2xl shadow-xl p-12 text-center">
            <div class="text-8xl mb-6">🎉</div>
            <h1 class="text-4xl font-black text-green-600 mb-4">¡Inscripción Exitosa!</h1>
            <p class="text-xl text-gray-600 mb-8">Bienvenido a la familia UTB GYM, {{ $user->name }}!</p>

            <div class="bg-gray-50 rounded-xl p-6 text-left mb-8">
                <h3 class="font-bold text-lg mb-4">📋 Detalles de tu inscripción:</h3>
                <div class="space-y-2">
                    <p><strong>Usuario ID:</strong> #{{ $user->id }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Plan:</strong> 
                        @if($plan == 'estudiantil') 🎓 Estudiantil
                        @elseif($plan == 'premium') 💎 Premium
                        @else 👔 Ejecutivo VIP
                        @endif
                    </p>
                    <p><strong>Pago:</strong> 
                        @if($payment == 'tarjeta') 💳 Tarjeta
                        @elseif($payment == 'transferencia') 🏦 Transferencia
                        @else 💵 Efectivo
                        @endif
                    </p>
                    <p><strong>Fecha:</strong> {{ $enrollment->enrollment_date }}</p>
                    <p><strong>Estado:</strong> <span class="text-green-600 font-bold">✅ {{ ucfirst($enrollment->status) }}</span></p>
                </div>
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8 text-left">
                <p class="font-bold">📧 Hemos enviado un email de confirmación a:</p>
                <p class="text-blue-600">{{ $user->email }}</p>
            </div>

            <div class="space-y-3">
                <a href="/" class="block bg-red-600 hover:bg-red-700 text-white py-3 rounded-full font-bold transition">
                    Volver al Inicio
                </a>
                <a href="/clases" class="block bg-gray-200 hover:bg-gray-300 text-gray-800 py-3 rounded-full font-bold transition">
                    Ver mis Clases
                </a>
            </div>
        </div>
    </div>
</section>

@endsection