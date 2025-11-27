<x-admin-layout>

    <h1 class="text-2xl font-bold text-yellow-400 mb-6">Gestión de Usuarios</h1>

    <a href="{{ route('admin.users.create') }}"
       class="bg-yellow-500 text-black font-bold px-4 py-2 rounded-lg hover:bg-yellow-600">
        Nuevo Usuario
    </a>

    <table class="w-full mt-6 bg-gray-800 text-white rounded-lg shadow text-center">
        <thead class="bg-gray-700">
            <tr>
                <th class="p-3">Nombre</th>
                <th class="p-3">Email</th>
                <th class="p-3">Rol</th>
                <th class="p-3">Estado</th>
                <th class="p-3">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr class="border-b border-gray-700">

                    {{-- NOMBRE --}}
                    <td class="p-3">{{ $user->name }}</td>

                    {{-- EMAIL --}}
                    <td class="p-3">{{ $user->email }}</td>

                    {{-- ROL --}}
                    <td class="p-3">
                        <span class="bg-blue-600 px-2 py-1 rounded text-xs">
                            {{ $user->roles->pluck('name')->first() }}
                        </span>
                    </td>

                    {{-- ESTADO + ACTIVAR/DESACTIVAR --}}
                    <td class="p-3 flex flex-col items-center gap-1">

                        @if($user->active)
                            <span class="text-green-400 font-bold">Activo</span>

                            <a href="{{ route('admin.users.toggle', $user) }}"
                                class="text-yellow-300 text-sm hover:underline">
                                Desactivar
                            </a>
                        @else
                            <span class="text-red-400 font-bold">Inactivo</span>

                            <a href="{{ route('admin.users.toggle', $user) }}"
                                class="text-green-300 text-sm hover:underline">
                                Activar
                            </a>
                        @endif

                    </td>

                    {{-- ACCIONES --}}
                    <td class="p-3">
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="text-blue-400 hover:underline">Editar</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</x-admin-layout>
