{{-- resources/views/layouts/client.blade.php --}}
<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">🎫 Panel del Cliente</h2>

        <nav class="mb-4">
            <a href="{{ route('client.dashboard') }}" class="mr-4 text-blue-600 hover:underline">Inicio</a>
            <a href="#" class="mr-4 text-blue-600 hover:underline">Mis Boletos</a>
            <a href="#" class="text-blue-600 hover:underline">Mi Perfil</a>
        </nav>

        {{ $slot }}
    </div>
</x-app-layout>
