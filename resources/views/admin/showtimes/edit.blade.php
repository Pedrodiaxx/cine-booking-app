<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Editar Función</h1>

    <form action="{{ route('admin.showtimes.update', $showtime) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Película</label>
            <select name="movie_id" class="w-full border p-2">
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" @selected($showtime->movie_id == $movie->id)>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Sala</label>
            <select name="room_id" class="w-full border p-2">
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" @selected($showtime->room_id == $room->id)>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Fecha</label>
            <input type="date" name="date" class="w-full border p-2" value="{{ $showtime->date }}">
        </div>

        <div>
            <label>Hora de inicio</label>
            <input type="time" name="start_time" class="w-full border p-2" value="{{ $showtime->start_time }}">
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
    </form>
</x-admin-layout>
