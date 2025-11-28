<x-admin-layout>

    <h1 class="text-2xl font-bold text-yellow-400 mb-6"> Editar Película</h1>

    <form method="POST" action="{{ route('admin.movies.update', $movie) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block font-semibold">Título</label>
                <input name="title" value="{{ $movie->title }}"
                       class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

            <div>
                <label class="block font-semibold">Duración (minutos)</label>
                <input type="number" name="duration" value="{{ $movie->duration }}"
                       class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

            <div>
                <label class="block font-semibold">Género</label>
                <input name="genre" value="{{ $movie->genre }}"
                       class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

            <div>
                <label class="block font-semibold">Clasificación</label>
                <input name="rating" value="{{ $movie->rating }}"
                       class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

            <div class="md:col-span-2">
                <label class="block font-semibold">URL del Poster</label>
                <input name="poster" value="{{ $movie->poster }}"
                       class="w-full p-2 rounded bg-gray-700 text-white">
            </div>

        </div>

        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Actualizar
        </button>

    </form>

</x-admin-layout>
