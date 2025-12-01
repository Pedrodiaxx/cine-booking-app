<x-admin-layout>
    <h1 class="text-3xl font-bold mb-4">Funciones del Cine</h1>

    <a href="{{ route('admin.showtimes.create') }}"
       class="bg-blue-600 text-white px-3 py-1 rounded-lg">
       + Nueva Función
    </a>
    
    <table class="w-full mt-6 bg-gray-800 text-white rounded-lg shadow">
        <thead class="bg-gray-1000 text-left">
            <tr>
                <th class="p-3">Sala</th>
                <th class="p-3">Película</th>
                <th class="p-3">Fecha</th>
                <th class="p-3">Hora</th>
                <th class="p-3">Estado</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($showtimes as $show)
                <tr class="border">
                    <td class="p-3">{{ $show->room->name }}</td>
                    <td class="p-3">{{ $show->movie->title }}</td>
                    <td class="p-3">{{ $show->date }}</td>
                    <td class="p-3">{{ $show->time }}</td>

                    {{-- ESTADO --}}
                    <td class="p-3">
                        @if ($show->cancelled)
                            <span class="text-red-500 font-bold">Cancelada</span>
                        @elseif ($show->active)
                            <span class="text-green-600 font-bold">Activa</span>
                        @else
                            <span class="text-gray-400 font-bold">Inactiva</span>
                        @endif
                    </td>

                    {{-- ACCIONES --}}
                    <td class="p-3 flex gap-4">

                        <a href="{{ route('admin.showtimes.edit', $show) }}" class="text-blue-600">
                            Editar
                        </a>

                        <a href="{{ route('admin.showtimes.toggle', $show) }}"
                           class="text-yellow-600">
                           {{ $show->active ? 'Desactivar' : 'Activar' }}
                        </a>

                        {{-- CANCELAR FUNCIÓN --}}
                        @if (!$show->cancelled)
                            <a href="{{ route('admin.showtimes.edit', $show) }}"
                               class="text-red-600 font-bold"
                               onclick="return confirm('¿Cancelar esta función? Los clientes verán que fue cancelada.')">
                               Cancelar
                            </a>
                        @else
                            <span class="text-red-400 italic">Ya cancelada</span>
                        @endif

                        {{-- ELIMINAR SOLO SI NO TIENE TICKETS --}}
                        <form method="POST" action="{{ route('admin.showtimes.destroy', $show) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Eliminar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $showtimes->links() }}</div>
</x-admin-layout>
