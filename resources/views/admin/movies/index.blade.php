<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">🎬 Películas</h1>

    <a href="{{ route('admin.movies.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        Nueva Película
    </a>

    <table class="mt-4 w-full bg-white shadow">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Título</th>
                <th class="p-2">Género</th>
                <th class="p-2">Duración</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($movies as $movie)
                <tr class="border-b">
                    <td class="p-2">{{ $movie->title }}</td>
                    <td class="p-2">{{ $movie->genre }}</td>
                    <td class="p-2">{{ $movie->duration }} min</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('admin.movies.edit', $movie) }}"
                           class="text-blue-600">Editar</a>

                        <form method="POST"
                              action="{{ route('admin.movies.destroy', $movie) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600"
                                    onclick="return confirm('¿Eliminar?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $movies->links() }}
</x-admin-layout>
