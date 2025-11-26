<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Nueva Función</h1>

    <form action="{{ route('admin.showtimes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Película</label>
            <select name="movie_id" class="w-full border p-2">
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Sala</label>
            <select name="room_id" class="w-full border p-2">
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Fecha</label>
            <input type="date" name="date" class="w-full border p-2">
        </div>

        <div>
            <label>Hora de inicio</label>
            <input type="time" name="start_time" class="w-full border p-2">
        </div>

        <button class="px-4 py-2 bg-green-600 text-white rounded">Guardar</button>
    </form>
</x-admin-layout>
