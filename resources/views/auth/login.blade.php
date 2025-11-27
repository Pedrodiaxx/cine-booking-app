<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBooking – Iniciar Sesión</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body 
    style="
        background-image: url('{{ asset('/img/Fondo-cine.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh;
    "
    class="flex items-center justify-center"
>

    <div class="bg-black/70 backdrop-blur-md p-10 rounded-xl shadow-lg w-full max-w-md text-white">

        {{-- Logo --}}
        <div class="text-center mb-6">
            <img src="/logo.png" alt="Logo" class="w-16 mx-auto">
        </div>

        <h1 class="text-2xl font-bold text-center mb-6">
            CineBooking – Iniciar Sesión
        </h1>

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <label class="block text-sm font-semibold">Email</label>
            <input
                type="email"
                name="email"
                class="w-full mt-1 p-2 rounded-lg bg-white/90 text-black"
                required autofocus
            >

            {{-- Password --}}
            <label class="block text-sm font-semibold mt-4">Password</label>
            <input
                type="password"
                name="password"
                class="w-full mt-1 p-2 rounded-lg bg-white/90 text-black"
                required
            >

            {{-- Remember + Create --}}
            <div class="flex items-center justify-between mt-4 text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    Recordarme
                </label>

                <a href="{{ route('register') }}" class="text-yellow-300 hover:text-yellow-400">
                    Crear cuenta
                </a>
            </div>

            {{-- Login button --}}
            <button
                type="submit"
                class="mt-6 w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 rounded-lg"
            >
                Iniciar Sesión
            </button>

        </form>

    </div>

</body>
</html>
