<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required|exists:roles,name'
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'active'   => true
        ]);

        $user->assignRole($data['role']);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role'  => 'required|exists:roles,name',
            'password' => 'nullable|min:6'
        ]);

        // SOLUCIÓN 1 — IMPEDIR que un admin se quite su propio rol
        if ($user->id === $request->user()->id && $data['role'] !== 'admin') {
            return redirect()->back()->with('error', 'No puedes quitarte tu propio rol de administrador.');
        }

        // ACTUALIZAR DATOS
        $user->name  = $data['name'];
        $user->email = $data['email'];

        // PASSWORD OPCIONAL
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        // ACTUALIZAR ROL
        $user->syncRoles([$data['role']]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    // ACTIVAR / DESACTIVAR
    public function toggleStatus(User $user)
    {
        $user->active = !$user->active;
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', $user->active
                ? 'Usuario activado'
                : 'Usuario desactivado');
    }
}
