<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

/*
|--------------------------------------------------------------------------
| Redirección inicial al login
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Ruta /dashboard (NECESARIA para Jetstream)
| Redirige según el rol del usuario
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->get('/dashboard', function () {

    $user = Auth::user();   // ✔ Intelephense lo reconoce


    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->hasRole('staff')) {
        return redirect()->route('staff.dashboard');
    }

    return redirect()->route('client.dashboard');

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Área ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

    });

/*
|--------------------------------------------------------------------------
| Área STAFF
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'staff'])
    ->prefix('staff')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('staff.dashboard');
        })->name('staff.dashboard');

    });

/*
|--------------------------------------------------------------------------
| Área CLIENT
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'client'])
    ->prefix('client')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('client.dashboard');
        })->name('client.dashboard');

    });
