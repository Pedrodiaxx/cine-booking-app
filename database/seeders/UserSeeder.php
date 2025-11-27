<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario ADMIN
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@cine.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->assignRole('admin');

        // Usuario STAFF
        $staff = User::create([
            'name' => 'Empleado Cine',
            'email' => 'staff@cine.com',
            'password' => Hash::make('12345678'),
        ]);
        $staff->assignRole('staff');
    }
}
