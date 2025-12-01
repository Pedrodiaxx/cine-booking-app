<x-client-layout>

    <h1 class="text-3xl font-bold mb-6">Mis Boletos</h1>

    @if ($tickets->isEmpty())
        <p class="text-gray-600">Aún no has comprado boletos.</p>
    @else
        <table class="w-full bg-white shadow rounded overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3">Película</th>
                    <th class="p-3">Sala</th>
                    <th class="p-3">Fecha</th>
                    <th class="p-3">Hora</th>
                    <th class="p-3">Asiento</th>
                    <th class="p-3">Precio</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tickets as $ticket)
                    <tr class="border-t">

                        {{-- PELÍCULA --}}
                        <td class="p-3">
                            @if ($ticket->showtime && !$ticket->showtime->cancelled)
                                {{ $ticket->showtime->movie->title }}
                            @elseif ($ticket->showtime && $ticket->showtime->cancelled)
                                <span class="text-red-600 font-bold">Función cancelada</span>
                            @else
                                <span class="text-gray-500">No disponible</span>
                            @endif
                        </td>

                        {{-- SALA --}}
                        <td class="p-3">
                            {{ $ticket->showtime->room->name ?? 'N/A' }}
                        </td>

                        {{-- FECHA --}}
                        <td class="p-3">
                            {{ $ticket->showtime->date ?? 'N/A' }}
                        </td>

                        {{-- HORA --}}
                        <td class="p-3">
                            {{ $ticket->showtime->time ?? 'N/A' }}
                        </td>

                        {{-- ASIENTO --}}
                        <td class="p-3">
                            {{ $ticket->seat_row }}{{ $ticket->seat_number }}
                        </td>

                        {{-- PRECIO --}}
                        <td class="p-3">
                            $ {{ number_format($ticket->price, 2) }}
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif

</x-client-layout>
