<x-admin-layout>
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-6"> Crear nuevo boleto</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                <strong>Ups, revisa esto:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tickets.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf

            {{-- Código --}}
            <div>
                <label class="block text-sm font-medium mb-1">Código del boleto</label>
                <input type="text" name="code" value="{{ old('code') }}"
                       class="w-full border-gray-300 rounded shadow-sm"
                       placeholder="Ej. TCK-0001">
            </div>

            {{-- Película --}}
            <div>
                <label class="block text-sm font-medium mb-1">Película</label>
                <select name="movie_id" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="">-- Selecciona una película --</option>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>
                            {{ $movie->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Sala --}}
            <div>
                <label class="block text-sm font-medium mb-1">Sala</label>
                <select name="room_id" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="">-- Selecciona una sala --</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Horario --}}
            <div>
                <label class="block text-sm font-medium mb-1">Horario de la función</label>
                <input type="datetime-local" name="show_time"
                       value="{{ old('show_time') }}"
                       class="w-full border-gray-300 rounded shadow-sm">
            </div>

            {{-- Asiento --}}
            <div>
                <label class="block text-sm font-medium mb-1">Asiento</label>
                <input type="text" name="seat" value="{{ old('seat') }}"
                       class="w-full border-gray-300 rounded shadow-sm"
                       placeholder="Ej. B7">
            </div>

            {{-- Precio --}}
            <div>
                <label class="block text-sm font-medium mb-1">Precio</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', 85.00) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('tickets.index') }}"
                   class="px-4 py-2 rounded border border-gray-300 text-gray-700 hover:bg-gray-100">
                    ⬅ Volver
                </a>

                <button type="submit"
                        class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                    💾 Guardar boleto
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
