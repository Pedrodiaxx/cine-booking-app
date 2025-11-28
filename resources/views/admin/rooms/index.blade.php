<x-admin-layout>

    <h1 class="text-2xl font-bold text-yellow-400 mb-6">Salas</h1>

    <a href="{{ route('admin.rooms.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 font-semibold rounded">
        + Nueva Sala
    </a>

    <table class="w-full mt-6 bg-gray-800 text-white rounded-lg shadow">
        <thead class="bg-gray-700">
            <tr>
                <th class="p-3 text-center">Nombre</th>
                <th class="p-3 text-center">Filas</th>
                <th class="p-3 text-center">Asientos/Fila</th>
                <th class="p-3 text-center">Activa</th>
                <th class="p-3 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($rooms as $room)
                <tr class="border-b border-gray-700">
                    <td class="p-3 text-center">{{ $room->name }}</td>
                    <td class="p-3 text-center">{{ $room->rows }}</td>
                    <td class="p-3 text-center">{{ $room->seats_per_row }}</td>

                    <td class="p-3 text-center">
                        <span class="{{ $room->active ? 'text-green-400' : 'text-red-400' }}">
                            {{ $room->active ? 'Activa' : 'Inactiva' }}
                        </span>
                    </td>

                    <td class="p-3">
                        <div class="flex justify-center gap-4">

                            {{-- Editar --}}
                            <a href="{{ route('admin.rooms.edit', $room) }}"
                               class="text-blue-400 hover:underline">
                                Editar
                            </a>

                            {{-- Eliminar --}}
                            <form action="{{ route('admin.rooms.destroy', $room) }}"
                                  method="POST"
                                  class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">
                                    Eliminar
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-4 text-gray-400">
                        No hay salas registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $rooms->links() }}
    </div>

    {{-- SweetAlert confirmación --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', e => {
                e.preventDefault();

                Swal.fire({
                    title: '¿Eliminar esta sala?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then(result => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    </script>

</x-admin-layout>
