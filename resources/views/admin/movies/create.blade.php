<x-admin-layout>
    <h1 class="text-xl font-bold mb-4">Nueva Película</h1>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('admin.movies.store') }}"
          class="space-y-4">

        @csrf

        <input name="title" class="w-full border p-2" placeholder="Título" required>
        <input name="genre" class="w-full border p-2" placeholder="Género" required>
        <input name="duration" type="number" class="w-full border p-2"
               placeholder="Duración (min)" required>

        <textarea name="description" class="w-full border p-2"
                  placeholder="Descripción"></textarea>

        <input name="poster" type="file" class="w-full border p-2">

        <input name="release_date" type="date" class="w-full border p-2">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</x-admin-layout>
