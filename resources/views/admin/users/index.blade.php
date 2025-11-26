<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">👤 Gestión de Usuarios</h1>

    <a href="{{ route('admin.users.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        Nuevo Usuario
    </a>

    <table class="mt-4 w-full bg-white shadow">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Nombre</th>
                <th class="p-2">Email</th>
                <th class="p-2">Rol</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $u)
                <tr class="border-b">
                    <td class="p-2">{{ $u->name }}</td>
                    <td class="p-2">{{ $u->email }}</td>
                    <td class="p-2">{{ $u->roles->first()?->name }}</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('admin.users.edit', $u) }}"
                           class="text-blue-600">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</x-admin-layout>
