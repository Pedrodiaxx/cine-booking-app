<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\Admin\UserController;


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

    $user = auth()->user();

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
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('movies', \App\Http\Controllers\Admin\MovieController::class);

        // activar/desactivar película
        Route::get('movies/{movie}/toggle', 
            [\App\Http\Controllers\Admin\MovieController::class, 'toggle']
        )->name('movies.toggle');

        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
        Route::resource('showtimes', \App\Http\Controllers\Admin\ShowtimeController::class);
        Route::resource('tickets', \App\Http\Controllers\Admin\TicketController::class);
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);

        Route::get('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])
            ->name('users.toggle');
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
