<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">➕ Crear Rol</h1>

    <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Nombre del rol</label>
            <input name="name" class="border rounded p-2 w-full" required>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Guardar
        </button>
    </form>
</x-admin-layout>
