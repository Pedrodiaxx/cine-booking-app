{{-- resources/views/layouts/admin.blade.php --}}
<x-app-layout>
    <div class="flex">

        {{-- SIDEBAR DINÁMICO --}}
        <aside class="w-64 bg-gray-900 text-white min-h-screen px-6 py-6 space-y-4">

            <h2 class="text-xl font-bold mb-6">Cinemanía-Admin</h2>

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
                class="block py-2 px-2 rounded 
                {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                 Dashboard
            </a>

            {{-- Gestión de Usuarios --}}
            <a href="{{ route('admin.users.index') }}"
                class="block py-2 px-2 rounded 
                {{ request()->routeIs('admin.users.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                 Gestión de Usuarios
            </a>

            {{-- Roles --}}
            <a href="{{ route('admin.roles.index') }}"
            class="block py-2 px-2 rounded hover:bg-gray-700 hover:text-yellow-300">
            Roles
            </a>


            {{-- Salas --}}
            <a href="{{ route('admin.rooms.index') }}" class="block py-2 hover:text-yellow-400">
                salas
            </a>


            {{-- Películas --}}
            <a href="{{ route('admin.movies.index') }}"
                class="block py-2 px-2 rounded 
                {{ request()->routeIs('admin.movies.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Películas
            </a>

            {{-- Funciones --}}
            <a href="{{ route('admin.showtimes.index') }}" class="block py-2 hover:text-yellow-400">
                Funciones
            </a>

            {{-- Boletos --}}
            <a href="{{ route('admin.tickets.index') }}"
            class="block py-2 px-2 rounded hover:bg-gray-700 hover:text-yellow-300">
            Boletos
            </a>


        </aside>

        {{-- CONTENIDO --}}
        <main class="flex-1 p-6 bg-gray-100">
            {{ $slot }}
        </main>
    </div>
</x-app-layout>
