<x-admin-layout>

    <h1 class="text-2xl font-bold text-yellow-400 mb-6"> + Agregar Película</h1>

    <form method="POST" action="{{ route('admin.movies.store') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block font-semibold">Título</label>
                <input name="title" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>

            <div>
                <label class="block font-semibold">Duración (minutos)</label>
                <input type="number" name="duration" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>

            <div>
                <label class="block font-semibold">Género</label>
                <input name="genre" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>

            <div>
                <label class="block font-semibold">Clasificación</label>
                <input name="rating" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>

            <div class="md:col-span-2">
                <label class="block font-semibold">URL del Poster</label>
                <input name="poster" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>

        </div>

        <button class="mt-4 bg-yellow-500 text-black px-4 py-2 rounded-lg font-bold hover:bg-yellow-600">
            Guardar
        </button>

    </form>

</x-admin-layout>
