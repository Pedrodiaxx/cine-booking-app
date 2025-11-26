<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Salas</h1>

    <a href="{{ route('admin.rooms.create') }}"
        class="px-4 py-2 bg-blue-600 text-white rounded">
        Nueva Sala
    </a>

    <table class="w-full mt-4 bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Nombre</th>
                <th class="p-2">Filas</th>
                <th class="p-2">Asientos/Fila</th>
                <th class="p-2">Activa</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($rooms as $room)
                <tr class="border">
                    <td class="p-2">{{ $room->name }}</td>
                    <td class="p-2">{{ $room->rows }}</td>
                    <td class="p-2">{{ $room->seats_per_row }}</td>
                    <td class="p-2">{{ $room->active ? 'Sí' : 'No' }}</td>

                    <td class="p-2">
                        <a href="{{ route('admin.rooms.edit', $room) }}" class="text-blue-600">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $rooms->links() }}
</x-admin-layout>
