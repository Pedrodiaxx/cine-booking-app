<x-admin-layout>
    <h1 class="text-xl font-bold mb-4">Crear Usuario</h1>

    <form method="POST" class="space-y-4"
          action="{{ route('admin.users.store') }}">
        @csrf

        <input name="name" class="w-full border p-2" placeholder="Nombre" required>

        <input name="email" class="w-full border p-2" placeholder="Email" required>

        <input type="password" name="password" class="w-full border p-2" placeholder="Contraseña" required>

        <select name="role" class="w-full border p-2" required>
            @foreach($roles as $r)
                <option value="{{ $r->name }}">{{ $r->name }}</option>
            @endforeach
        </select>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Crear
        </button>
    </form>
</x-admin-layout>
