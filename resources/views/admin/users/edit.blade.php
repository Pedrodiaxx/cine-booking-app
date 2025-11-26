<x-admin-layout>
    <h1 class="text-xl font-bold mb-4">Editar Usuario</h1>

    <form method="POST" class="space-y-4"
          action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <input name="name" class="w-full border p-2" value="{{ $user->name }}" required>

        <input name="email" class="w-full border p-2" value="{{ $user->email }}" required>

        <select name="role" class="w-full border p-2">
            @foreach($roles as $r)
                <option value="{{ $r->name }}"
                    {{ $user->roles->first()?->name === $r->name ? 'selected' : '' }}>
                    {{ $r->name }}
                </option>
            @endforeach
        </select>

        <button class="bg-yellow-600 text-white px-4 py-2 rounded">
            Actualizar
        </button>
    </form>
</x-admin-layout>
