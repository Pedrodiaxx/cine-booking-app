<x-admin-layout>

    <h1 class="text-2xl font-bold mb-4"> Editar Función</h1>

    <a href="{{ route('admin.showtimes.index') }}"
       class="text-blue-500 hover:underline text-sm">
        ← Volver a la lista de funciones
    </a>

    {{-- ERRORES --}}
    @if ($errors->any())
        <div class="mt-4 bg-red-100 text-red-700 px-4 py-2 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.showtimes.update', $showtime) }}" method="POST"
          class="mt-6 bg-white rounded-lg shadow p-6 space-y-4 max-w-xl">
        @csrf
        @method('PUT')

        {{-- SALA --}}
        <div>
            <label class="block font-semibold mb-1">Sala</label>
            <select name="room_id" class="w-full border rounded px-3 py-2">
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}"
                        {{ old('room_id', $showtime->room_id) == $room->id ? 'selected' : '' }}>
                        Sala {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- PELÍCULA --}}
        <div>
            <label class="block font-semibold mb-1">Película</label>
            <select name="movie_id" class="w-full border rounded px-3 py-2">
                @foreach($movies as $movie)
                    <option value="{{ $movie->id }}"
                        {{ old('movie_id', $showtime->movie_id) == $movie->id ? 'selected' : '' }}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- FECHA --}}
        <div>
            <label class="block font-semibold mb-1">Fecha</label>
            <input type="date"
                   name="date"
                   value="{{ old('date', $showtime->date) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- HORA --}}
        <div>
            <label class="block font-semibold mb-1">Hora</label>
            <input type="time"
                   name="time"
                   value="{{ old('time', $showtime->time) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- ACTIVA --}}
        <div class="flex items-center gap-2">
            <input type="checkbox"
                   name="active"
                   value="1"
                   class="h-4 w-4"
                   {{ old('active', $showtime->active) ? 'checked' : '' }}>
            <span class="text-sm font-semibold">Función activa</span>
        </div>

        <div class="pt-2">
            <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Actualizar función
            </button>
        </div>
    </form>

</x-admin-layout>
