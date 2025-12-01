<x-admin-layout>

    <h1 class="text-2xl font-bold mb-4"> Lista de Boletos</h1>

    <table class="w-full mt-4 bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-100 text-left text-sm">
                <th class="p-3">Código</th>
                <th class="p-3">Película</th>
                <th class="p-3">Sala</th>
                <th class="p-3">Horario</th>
                <th class="p-3">Asiento</th>
                <th class="p-3">Precio</th>
                <th class="p-3">Usuario</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($tickets as $ticket)
                <tr class="border-b text-sm">

                    {{-- Código --}}
                    <td class="p-3">TCK-{{ $ticket->id }}</td>

                    {{-- Película --}}
                    <td class="p-3">
                        @if($ticket->showtime && !$ticket->showtime->cancelled)
                            {{ $ticket->showtime->movie->title }}
                        @elseif($ticket->showtime && $ticket->showtime->cancelled)
                            <span class="text-red-600 font-bold">Función cancelada</span>
                        @else
                            <span class="text-gray-500">No disponible</span>
                        @endif
                    </td>


                    {{-- Sala --}}
                    <td class="p-3">
                        {{ $ticket->showtime->room->name ?? 'N/A' }}
                    </td>

                    {{-- Fecha y hora --}}
                    <td class="p-3">
                        @if ($ticket->showtime)
                            {{ $ticket->showtime->date }} — {{ $ticket->showtime->time }}
                        @else
                            N/A
                        @endif
                    </td>

                    {{-- Asiento --}}
                    <td class="p-3">
                        {{ $ticket->seat_row }}{{ $ticket->seat_number }}
                    </td>

                    {{-- Precio --}}
                    <td class="p-3">${{ number_format($ticket->price, 2) }}</td>

                    {{-- Usuario --}}
                    <td class="p-3">
                        {{ $ticket->user->name ?? 'Usuario eliminado' }}
                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="7" class="text-center p-4 text-gray-500">
                        No hay boletos registrados aún.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $tickets->links() }}
    </div>

</x-admin-layout>
