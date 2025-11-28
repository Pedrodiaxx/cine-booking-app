{{-- resources/views/components/admin-layout.blade.php --}}
<x-app-layout>
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-white px-6 py-6 space-y-4">

            <h2 class="text-xl font-bold mb-6">Cinemanía</h2>

            <a href="{{ route('admin.dashboard') }}"
                class="block py-2 px-3 rounded
                {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="block py-2 px-3 rounded 
                {{ request()->routeIs('admin.users.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Gestión de Usuarios
            </a>

            <a href="{{ route('admin.roles.index') }}"
                class="block py-2 px-3 rounded 
                {{ request()->routeIs('admin.roles.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Roles
            </a>

            <a href="{{ route('admin.rooms.index') }}"
                class="block py-2 px-3 rounded 
                {{ request()->routeIs('admin.rooms.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Salas
            </a>

            <a href="{{ route('admin.movies.index') }}"
                class="block py-2 px-3 rounded 
                {{ request()->routeIs('admin.movies.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Películas
            </a>

            <a href="{{ route('admin.showtimes.index') }}"
                class="block py-2 px-3 rounded 
                {{ request()->routeIs('admin.showtimes.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Funciones
            </a>

            <a href="{{ route('admin.tickets.index') }}"
                class="block py-2 px-3 rounded 
                {{ request()->routeIs('admin.tickets.*') ? 'bg-gray-700 text-yellow-400' : 'hover:bg-gray-700 hover:text-yellow-300' }}">
                Boletos
            </a>

        </aside>

        {{-- Contenido dinámico --}}
        <main class="flex-1 p-8 bg-gray-100">
            {{ $slot }}
        </main>

    </div>

    {{-- SweetAlert global --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Scripts enviados desde las vistas --}}
    @stack('scripts')

</x-app-layout>
