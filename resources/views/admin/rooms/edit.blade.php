<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Editar Sala</h1>

    <form action="{{ route('admin.rooms.update', $room) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Nombre</label>
            <input type="text" name="name" value="{{ $room->name }}" class="w-full border p-2">
        </div>

        <div>
            <label>Filas</label>
            <input type="number" name="rows" value="{{ $room->rows }}" class="w-full border p-2">
        </div>

        <div>
            <label>Asientos por fila</label>
            <input type="number" name="seats_per_row" value="{{ $room->seats_per_row }}" class="w-full border p-2">
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
    </form>
</x-admin-layout>
