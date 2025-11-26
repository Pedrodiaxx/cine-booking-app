<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">🔐 Roles</h1>

    <a href="{{ route('admin.roles.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
        ➕ Nuevo Rol
    </a>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">Nombre</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($roles as $role)
                <tr class="border-b">
                    <td class="p-2">{{ $role->name }}</td>

                    <td class="p-2 flex gap-2">
                        <a href="{{ route('admin.roles.edit', $role) }}"
                           class="text-blue-600">Editar</a>

                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('¿Eliminar rol?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
