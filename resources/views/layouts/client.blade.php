{{-- resources/views/components/client-layout.blade.php --}}
<x-app-layout>
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-white px-6 py-6 space-y-4">

            <h2 class="text-xl font-bold mb-6">Cinemanía</h2>

            {{-- Inicio --}}
            <a href="{{ route('client.dashboard') }}"
                class="block py-2 px-3 rounded
                {{ request()->routeIs('client.dashboard') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Inicio
            </a>

            {{-- Funciones disponibles --}}
            <a href="{{ route('client.functions.index') }}"
                class="block py-2 px-3 rounded
                {{ request()->routeIs('client.functions.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Funciones
            </a>

            {{-- Mis boletos --}}
            <a href="{{ route('client.tickets.index') }}"
                class="block py-2 px-3 rounded
                {{ request()->routeIs('client.tickets.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Mis Boletos
            </a>

            {{-- Perfil --}}
            <a href="{{ route('profile.show') }}"
                class="block py-2 px-3 rounded
                {{ request()->routeIs('profile.show') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Mi Perfil
            </a>

        </aside>

        {{-- Contenido dinámico --}}
        <main class="flex-1 p-8 bg-gray-100">
            {{ $slot }}
        </main>

    </div>

    {{-- SweetAlert global --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')

</x-app-layout>
