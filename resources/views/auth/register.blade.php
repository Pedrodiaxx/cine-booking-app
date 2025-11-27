<x-guest-layout>

    <style>
        body {
            background: url('/img/Fondo-cine.jpg') no-repeat center center/cover !important;
            min-height: 100vh;
        }
        .cinema-card {
            background-color: rgba(0,0,0,0.65);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        label {
            color: white !important;
        }
    </style>

    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md p-6 rounded-xl shadow-xl cinema-card">

            <h1 class="text-center text-2xl text-white font-bold mb-4">
                Crear cuenta CineBooking
            </h1>

            <x-validation-errors class="mb-4 text-white" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nombre --}}
                <div>
                    <x-label for="name" value="Nombre" />
                    <x-input id="name" type="text" name="name"
                             class="block mt-1 w-full"
                             required autofocus />
                </div>

                {{-- Email --}}
                <div class="mt-4">
                    <x-label for="email" value="Email" />
                    <x-input id="email" type="email" name="email"
                             class="block mt-1 w-full"
                             required />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password" type="password" name="password"
                             class="block mt-1 w-full"
                             required autocomplete="new-password" />
                </div>

                {{-- Confirmar Password --}}
                <div class="mt-4">
                    <x-label for="password_confirmation" value="Confirmar Contraseña" />
                    <x-input id="password_confirmation" type="password"
                             name="password_confirmation"
                             class="block mt-1 w-full"
                             required />
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <a href="{{ route('login') }}" class="text-yellow-300 hover:text-yellow-400">
                        Ya tengo cuenta
                    </a>

                    <button class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600
                                   text-black font-bold rounded-lg transition">
                        Registrarme
                    </button>
                </div>
            </form>

        </div>
    </div>

</x-guest-layout>
