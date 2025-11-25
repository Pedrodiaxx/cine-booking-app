{{-- resources/views/layouts/admin.blade.php --}}
<x-app-layout>
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-white min-h-screen px-4 py-6 space-y-4">
            <h2 class="text-xl font-bold mb-4">🎬 CineBooking Admin</h2>

            <a href="{{ route('admin.dashboard') }}" class="block py-2 hover:text-yellow-400">Dashboard</a>
            <a href="#" class="block py-2 hover:text-yellow-400">Gestión de Usuarios</a>
            <a href="#" class="block py-2 hover:text-yellow-400">Roles</a>
            <a href="#" class="block py-2 hover:text-yellow-400">Salas</a>
            <a href="#" class="block py-2 hover:text-yellow-400">Películas</a>
            <a href="#" class="block py-2 hover:text-yellow-400">Funciones</a>
            <a href="#" class="block py-2 hover:text-yellow-400">Boletos</a>
        </aside>

        {{-- Contenido --}}
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</x-app-layout>
