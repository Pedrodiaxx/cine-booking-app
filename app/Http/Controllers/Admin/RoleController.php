<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all(); 
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create(['name' => $request->name]);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Rol creado correctamente',
            'text'  => 'El rol ha sido creado exitosamente'
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        if ($role->name === $request->name) {
            session()->flash('swal', [
                'icon'  => 'info',
                'title' => 'Sin cambios',
                'text'  => 'No se detectaron modificaciones'
            ]);

            return redirect()->route('admin.roles.edit', $role);
        }

        $role->update(['name' => $request->name]);

        session()->flash('swal', [
            'icon'  => 'success',
            'title' => 'Rol actualizado',
            'text'  => 'El rol ha sido actualizado correctamente'
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
{
    session()->flash('swal', [
        'icon'  => 'error',
        'title' => 'No se puede eliminar este rol',
        'text'  => 'Los roles base del sistema no pueden eliminarse.'
    ]);

    return redirect()->route('admin.roles.index');
}

}
