<x-client-layout>

    <h1 class="text-3xl font-bold mb-6">Funciones Disponibles</h1>

    @if ($showtimes->isEmpty())
        <p class="text-gray-600">No hay funciones disponibles por el momento.</p>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($showtimes as $showtime)
            <div class="bg-white rounded-lg shadow p-4">

                {{-- Poster --}}
                <img src="{{ asset($showtime->movie->poster) }}"
                     alt="{{ $showtime->movie->title }}"
                     class="w-full h-64 object-cover rounded">

                <div class="mt-3">
                    <h2 class="text-xl font-bold">{{ $showtime->movie->title }}</h2>

                    <p class="text-gray-700 text-sm mt-1">
                        Sala: <strong>{{ $showtime->room->name }}</strong>
                    </p>

                    <p class="text-gray-700 text-sm">
                        Fecha: <strong>{{ $showtime->date }}</strong>
                    </p>

                    <p class="text-gray-700 text-sm">
                        Hora: <strong>{{ $showtime->time }}</strong>
                    </p>

                    <a href="{{ route('client.functions.show', $showtime->id) }}"
                       class="block w-full text-center mt-4 bg-blue-600 hover:bg-blue-700
                              text-white py-2 rounded">
                        Ver detalles
                    </a>
                </div>
            </div>
        @endforeach

    </div>

</x-client-layout>
