<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Funciones</h1>

    <a href="{{ route('admin.showtimes.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">
        Nueva Función
    </a>

    <table class="w-full mt-4 bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Película</th>
                <th class="p-2">Sala</th>
                <th class="p-2">Fecha</th>
                <th class="p-2">Hora</th>
                <th class="p-2">Asientos Disp.</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($showtimes as $show)
                <tr class="border">
                    <td class="p-2">{{ $show->movie->title }}</td>
                    <td class="p-2">{{ $show->room->name }}</td>
                    <td class="p-2">{{ $show->date }}</td>
                    <td class="p-2">{{ $show->start_time }}</td>
                    <td class="p-2">{{ $show->available_seats }}</td>

                    <td class="p-2">
                        <a href="{{ route('admin.showtimes.edit', $show) }}"
                           class="text-blue-600">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $showtimes->links() }}
</x-admin-layout>
