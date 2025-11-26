<x-admin-layout>
    <h1 class="text-xl font-bold mb-4">Editar Película</h1>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('admin.movies.update', $movie) }}"
          class="space-y-4">

        @csrf
        @method('PUT')

        <input name="title" class="w-full border p-2"
               value="{{ $movie->title }}" required>

        <input name="genre" class="w-full border p-2"
               value="{{ $movie->genre }}" required>

        <input name="duration" type="number" class="w-full border p-2"
               value="{{ $movie->duration }}" required>

        <textarea name="description" class="w-full border p-2">
            {{ $movie->description }}
        </textarea>

        <input name="poster" type="file" class="w-full border p-2">

        <input name="release_date" type="date" class="w-full border p-2"
               value="{{ $movie->release_date }}">

        <button class="bg-yellow-600 text-white px-4 py-2 rounded">
            Actualizar
        </button>
    </form>
</x-admin-layout>
