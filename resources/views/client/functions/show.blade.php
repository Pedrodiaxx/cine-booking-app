<x-client-layout>

    <h1 class="text-3xl font-bold mb-6">Detalles de la Función</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        {{-- Poster --}}
        <div>
            <img src="{{ asset($showtime->movie->poster) }}"
                 class="w-full rounded shadow">
        </div>

        {{-- Información y compra --}}
        <div class="bg-white shadow p-6 rounded">

            <h2 class="text-2xl font-bold mb-2">{{ $showtime->movie->title }}</h2>

            <p class="text-gray-700">Sala: <strong>{{ $showtime->room->name }}</strong></p>
            <p class="text-gray-700">Fecha: <strong>{{ $showtime->date }}</strong></p>
            <p class="text-gray-700 mb-4">Hora: <strong>{{ $showtime->time }}</strong></p>

            {{-- Mostrar asientos ocupados --}}
            <h3 class="text-lg font-bold mt-4">Asientos Ocupados:</h3>

            @php
                $occupied = $showtime->tickets->map(fn($t) => $t->seat_row . $t->seat_number);
            @endphp

            @if ($occupied->isEmpty())
                <p class="text-green-600">Todos los asientos están disponibles.</p>
            @else
                <p class="text-red-600 text-sm">{{ $occupied->implode(', ') }}</p>
            @endif

            {{-- Formulario --}}
            <form action="{{ route('client.tickets.store', $showtime->id) }}"
                  method="POST"
                  class="mt-6 space-y-4">
                @csrf

                <div>
                    <label class="block font-semibold">Fila</label>
                    <input type="text" name="seat_row"
                           class="border w-full px-3 py-2 rounded"
                           placeholder="Ej: A"
                           required>
                </div>

                <div>
                    <label class="block font-semibold">Número de asiento</label>
                    <input type="number" name="seat_number"
                           class="border w-full px-3 py-2 rounded"
                           placeholder="Ej: 5"
                           required>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded">
                        {{ $errors->first() }}
                    </div>
                @endif

                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded">
                    Comprar Boleto ($85)
                </button>

            </form>

        </div>

    </div>

</x-client-layout>
