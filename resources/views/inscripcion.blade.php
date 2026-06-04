@extends('layouts.app')
@section('title', 'Inscripción')
@section('content')

<section class="py-16">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-black mb-4">¡Inscríbete Ahora! 🎉</h1>
            <p class="text-xl text-gray-600">Completa el formulario y empieza tu transformación</p>
        </div>

        <form action="/inscripcion" method="POST" class="bg-white rounded-2xl shadow-xl p-8 space-y-6">
            @csrf

            <!-- Datos Personales -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-red-600">👤 Datos Personales</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold mb-2">Nombre Completo</label>
                        <input type="text" name="name" required class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-red-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block font-bold mb-2">Email</label>
                        <input type="email" name="email" required class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-red-500 focus:outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-bold mb-2">Teléfono</label>
                        <input type="text" name="phone" required class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-red-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Selección de Plan -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-red-600">💎 Elige tu Plan</h3>
                <div class="grid md:grid-cols-3 gap-4">
                    <label class="cursor-pointer">
                        <input type="radio" name="plan" value="estudiantil" class="peer hidden" required>
                        <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-blue-500 peer-checked:bg-blue-50">
                            <div class="text-4xl mb-2">🎓</div>
                            <h4 class="font-bold">Estudiantil</h4>
                            <p class="text-blue-600 font-black">Bs. 99/mes</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="plan" value="premium" class="peer hidden" checked>
                        <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-red-500 peer-checked:bg-red-50">
                            <div class="text-4xl mb-2">💎</div>
                            <h4 class="font-bold">Premium</h4>
                            <p class="text-red-600 font-black">Bs. 199/mes</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="plan" value="ejecutivo" class="peer hidden">
                        <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-purple-500 peer-checked:bg-purple-50">
                            <div class="text-4xl mb-2">👔</div>
                            <h4 class="font-bold">Ejecutivo VIP</h4>
                            <p class="text-purple-600 font-black">Bs. 399/mes</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Selección de Clase -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-red-600">🏋️ Elige tu Clase Favorita</h3>
                <select name="gym_class_id" required class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-red-500 focus:outline-none">
                    <option value="">-- Selecciona una clase --</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}">
                            {{ $class->name }} - {{ $class->day }} {{ $class->start_time }} ({{ $class->category->name }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Método de Pago -->
            <div>
                <h3 class="text-2xl font-bold mb-4 text-red-600">💳 Método de Pago</h3>
                <div class="grid md:grid-cols-3 gap-4">
                    <label class="cursor-pointer">
                        <input type="radio" name="payment_method" value="tarjeta" class="peer hidden" required checked>
                        <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-green-500 peer-checked:bg-green-50">
                            <div class="text-4xl mb-2">💳</div>
                            <h4 class="font-bold">Tarjeta</h4>
                            <p class="text-sm text-gray-500">Crédito/Débito</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="payment_method" value="transferencia" class="peer hidden">
                        <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-green-500 peer-checked:bg-green-50">
                            <div class="text-4xl mb-2">🏦</div>
                            <h4 class="font-bold">Transferencia</h4>
                            <p class="text-sm text-gray-500">Bancaria</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="payment_method" value="efectivo" class="peer hidden">
                        <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-green-500 peer-checked:bg-green-50">
                            <div class="text-4xl mb-2">💵</div>
                            <h4 class="font-bold">Efectivo</h4>
                            <p class="text-sm text-gray-500">En recepción</p>
                        </div>
                    </label>
                </div>

                <!-- Campos de tarjeta -->
                <div id="card-fields" class="mt-4 p-4 bg-gray-50 rounded-lg">
                    <label class="block font-bold mb-2">Número de Tarjeta</label>
                    <input type="text" name="card_number" placeholder="1234 5678 9012 3456" maxlength="19" class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-green-500 focus:outline-none">
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block font-bold mb-2">Vencimiento</label>
                            <input type="text" placeholder="MM/AA" maxlength="5" class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-green-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block font-bold mb-2">CVV</label>
                            <input type="text" placeholder="123" maxlength="3" class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-green-500 focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumen -->
            <div class="bg-gradient-to-r from-red-500 to-red-700 text-white rounded-xl p-6">
                <h3 class="text-2xl font-bold mb-4">📋 Resumen de tu Inscripción</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Membresía:</span>
                        <span class="font-bold" id="summary-plan">Premium</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Matrícula:</span>
                        <span class="font-bold">Bs. 50</span>
                    </div>
                    <div class="flex justify-between border-t border-white/30 pt-2 mt-2">
                        <span class="text-xl">Total hoy:</span>
                        <span class="text-2xl font-black" id="summary-total">Bs. 249</span>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-4 rounded-full text-xl font-black transition transform hover:scale-105">
                ✅ Confirmar Inscripción y Pagar
            </button>

            <p class="text-center text-sm text-gray-500">
                🔒 Pago 100% seguro. Puedes cancelar en cualquier momento.
            </p>
        </form>
    </div>
</section>

<script>
// Actualizar resumen según el plan seleccionado
document.querySelectorAll('input[name="plan"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const prices = {
            'estudiantil': { name: 'Estudiantil', price: 99, total: 149 },
            'premium': { name: 'Premium', price: 199, total: 249 },
            'ejecutivo': { name: 'Ejecutivo VIP', price: 399, total: 449 }
        };
        const plan = prices[this.value];
        document.getElementById('summary-plan').textContent = plan.name;
        document.getElementById('summary-total').textContent = 'Bs. ' + plan.total;
    });
});

// Mostrar/ocultar campos de tarjeta
document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.getElementById('card-fields').style.display = 
            this.value === 'tarjeta' ? 'block' : 'none';
    });
});
</script>

@endsection