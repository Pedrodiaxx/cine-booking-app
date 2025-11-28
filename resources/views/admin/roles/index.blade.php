<x-admin-layout>

    {{-- SweetAlert Mensaje --}}
    @if (session('swal'))
        <script>
            Swal.fire(@json(session('swal')));
        </script>
    @endif

    <h1 class="text-2xl font-bold text-yellow-400 mb-6">Roles del Sistema</h1>

    <a href="{{ route('admin.roles.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700">
        + Nuevo Rol
    </a>

    <table class="w-full mt-6 bg-gray-800 text-white rounded-lg shadow">
        <thead class="bg-gray-700">
            <tr>
                <th class="p-3 text-center">Nombre</th>
                <th class="p-3 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($roles as $role)
                <tr class="border-b border-gray-700">
                    <td class="p-3 text-center text-gray-200">{{ $role->name }}</td>

                    <td class="p-3">
                        <div class="flex justify-center gap-4">

                            {{-- Editar --}}
                            <a href="{{ route('admin.roles.edit', $role) }}"
                                class="text-blue-400 hover:underline">
                                Editar
                            </a>

                            {{-- Eliminar SIEMPRE visible --}}
                            <form action="{{ route('admin.roles.destroy', $role) }}"
                                  method="POST"
                                  class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:underline">
                                    Eliminar
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', e => {
                e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Intentarás eliminar este rol.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</x-admin-layout>
