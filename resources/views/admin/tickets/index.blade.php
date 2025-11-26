<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">🎟 Lista de Boletos</h1>

    <a href="{{ route('admin.tickets.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
        ➕ Nuevo Boleto
    </a>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Código</th>
                <th class="p-2">Película</th>
                <th class="p-2">Sala</th>
                <th class="p-2">Horario</th>
                <th class="p-2">Asiento</th>
                <th class="p-2">Precio</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr class="border-b">
                    <td class="p-2">{{ $ticket->code }}</td>
                    <td class="p-2">{{ $ticket->movie->title }}</td>
                    <td class="p-2">{{ $ticket->room->name }}</td>
                    <td class="p-2">{{ $ticket->show_time }}</td>
                    <td class="p-2">{{ $ticket->seat }}</td>
                    <td class="p-2">$ {{ $ticket->price }}</td>
                    <td class="p-2 flex gap-2">

                        <a href="{{ route('tickets.edit', $ticket) }}"
                           class="text-blue-600">Editar</a>

                        <form action="{{ route('tickets.destroy', $ticket) }}"
                              method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-600"
                                    onclick="return confirm('¿Eliminar boleto?')">
                                Eliminar
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
