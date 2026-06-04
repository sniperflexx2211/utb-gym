<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTB GYM - @yield('title', 'Tu gimnasio de confianza')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-gray-900 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="text-3xl font-black text-red-500">
                    💪 UTB <span class="text-white">GYM</span>
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="hover:text-red-500 transition font-semibold">Inicio</a>
                    <a href="/clases" class="hover:text-red-500 transition font-semibold">Clases</a>
                    <a href="/planes" class="hover:text-red-500 transition font-semibold">Planes</a>
                    <a href="/inscripcion" class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full transition font-bold">
                        ¡Inscríbete Ya!
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-black text-red-500 mb-4">💪 UTB GYM</h3>
                    <p class="text-gray-400">Transformando vidas desde 2026</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Contacto</h4>
                    <p class="text-gray-400">📞 +591 70000000</p>
                    <p class="text-gray-400">📧 info@utbgym.com</p>
                    <p class="text-gray-400">📍 Av. Principal #123</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Horarios</h4>
                    <p class="text-gray-400">Lun - Vie: 5:00 - 22:00</p>
                    <p class="text-gray-400">Sáb - Dom: 7:00 - 20:00</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Síguenos</h4>
                    <div class="flex space-x-4 text-2xl">
                        <a href="#" class="hover:text-red-500">📘</a>
                        <a href="#" class="hover:text-red-500">📷</a>
                        <a href="#" class="hover:text-red-500">🐦</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2026 UTB GYM. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>