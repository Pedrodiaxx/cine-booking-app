{{-- resources/views/layouts/staff.blade.php --}}
<x-app-layout>
    <div class="flex">
        <aside class="w-56 bg-blue-700 text-white min-h-screen px-4 py-6">
            <h2 class="text-xl font-bold mb-4"> Staff CineBooking</h2>

            <a href="{{ route('staff.dashboard') }}" class="block py-2 hover:text-yellow-300">Dashboard</a>
            <a href="#" class="block py-2 hover:text-yellow-300">Salas</a>
            <a href="#" class="block py-2 hover:text-yellow-300">Funciones</a>
            <a href="#" class="block py-2 hover:text-yellow-300">Boletos</a>
        </aside>

        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</x-app-layout>
