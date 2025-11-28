<x-admin-layout>

    <h1 class="text-2xl font-bold text-yellow-400 mb-6">Crear Rol</h1>

    <div class="max-w-lg bg-gray-800 text-white p-6 rounded-lg shadow-lg">

        <form action="{{ route('admin.roles.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nombre --}}
            <div>
                <label class="block mb-1 text-gray-300 font-semibold">Nombre del rol</label>
                <input name="name"
                       class="w-full p-2 rounded bg-gray-700 border border-gray-600 focus:border-yellow-400 focus:ring-yellow-400"
                       required>
                @error('name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botón --}}
            <button class="bg-green-600 hover:bg-green-700 text-white font-bold px-4 py-2 rounded-lg w-full">
                Guardar Rol
            </button>
        </form>
    </div>

</x-admin-layout>
