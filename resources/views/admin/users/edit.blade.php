<x-admin-layout>
    <h1 class="text-2xl font-bold text-yellow-400 mb-6">Editar Usuario</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST"
          class="bg-gray-800 p-6 rounded-lg shadow text-white">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold">Nombre</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full p-2 rounded text-black" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full p-2 rounded text-black" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Nuevo Password (opcional)</label>
            <input type="password" name="password" class="w-full p-2 rounded text-black">
        </div>

        <div class="mb-4">
            <label class="block font-bold">Rol</label>
            <select name="role" class="w-full p-2 rounded text-black" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}"
                        @if ($user->roles->pluck('name')->first() == $role->name) selected @endif>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="px-4 py-2 bg-yellow-500 text-black font-bold rounded hover:bg-yellow-600">
            Actualizar Usuario
        </button>
    </form>
</x-admin-layout>
