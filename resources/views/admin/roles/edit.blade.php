<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">✏ Editar Rol</h1>

    <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block font-semibold">Nombre del rol</label>
            <input name="name" value="{{ $role->name }}" class="border rounded p-2 w-full" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Actualizar
        </button>
    </form>
</x-admin-layout>
