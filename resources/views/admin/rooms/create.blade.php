<x-admin-layout>

    <h1 class="text-2xl font-bold text-yellow-400 mb-6">Crear Sala</h1>

    <form action="{{ route('admin.rooms.store') }}" method="POST"
          class="bg-gray-800 text-white p-6 rounded-lg shadow w-full max-w-2xl">
        @csrf

        {{-- Nombre --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="name" class="w-full p-2 rounded bg-gray-700 border-gray-600"
                   value="{{ old('name') }}" required>
            @error('name') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Filas --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Filas</label>
            <input type="number" name="rows" class="w-full p-2 rounded bg-gray-700 border-gray-600"
                   min="1" value="{{ old('rows') }}" required>
            @error('rows') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Asientos por fila --}}
        <div class="mb-4">
            <label class="block font-semibold mb-1">Asientos por fila</label>
            <input type="number" name="seats_per_row" class="w-full p-2 rounded bg-gray-700 border-gray-600"
                   min="1" value="{{ old('seats_per_row') }}" required>
            @error('seats_per_row') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex mt-6 gap-4">
            <button class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('admin.rooms.index') }}"
               class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded text-white">Cancelar</a>
        </div>

    </form>

</x-admin-layout>
