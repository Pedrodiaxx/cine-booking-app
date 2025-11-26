<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Nueva Sala</h1>

    <form action="{{ route('admin.rooms.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Nombre</label>
            <input type="text" name="name" class="w-full border p-2">
        </div>

        <div>
            <label>Filas</label>
            <input type="number" name="rows" class="w-full border p-2">
        </div>

        <div>
            <label>Asientos por fila</label>
            <input type="number" name="seats_per_row" class="w-full border p-2">
        </div>

        <button class="px-4 py-2 bg-green-600 text-white rounded">Guardar</button>
    </form>
</x-admin-layout>
