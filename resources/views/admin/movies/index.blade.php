<x-admin-layout>

    <h1 class="text-3xl font-bold text-yellow-400 mb-6">
        Cartelera de Películas
    </h1>

    <a href="{{ route('admin.movies.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 mb-6 inline-block">
        + Nueva Película
    </a>

    {{-- Grid estilo Cinépolis --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-8">

        @foreach ($movies as $movie)
            <div class="bg-[#1E293B] rounded-xl shadow-lg overflow-hidden hover:scale-[1.02] transition">

                {{-- Poster mucho más grande --}}
                <img src="{{ asset($movie->poster) }}"
                     class="w-full h-80 object-cover bg-black">

                {{-- Contenido --}}
                <div class="p-5">

                    <h2 class="text-xl font-bold mb-1">{{ $movie->title }}</h2>

                    <p class="text-sm text-gray-300">
                        {{ $movie->genre }} • {{ $movie->rating }} • {{ $movie->duration }} min
                    </p>

                    {{-- Estado --}}
                    <p class="mt-2 text-sm font-bold {{ $movie->active ? 'text-green-400' : 'text-red-400' }}">
                        {{ $movie->active ? 'Activa' : 'Inactiva' }}
                    </p>

                    {{-- Acciones --}}
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('admin.movies.edit', $movie) }}"
                           class="text-blue-400 hover:underline font-semibold">
                            Editar
                        </a>

                        <a href="{{ route('admin.movies.toggle', $movie) }}"
                           class="text-yellow-300 hover:underline font-semibold">
                            {{ $movie->active ? 'Desactivar' : 'Activar' }}
                        </a>
                    </div>

                </div>

            </div>
        @endforeach

    </div>

    <div class="mt-6">
        {{ $movies->links() }}
    </div>

</x-admin-layout>
