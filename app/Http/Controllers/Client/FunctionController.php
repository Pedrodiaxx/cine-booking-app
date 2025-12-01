<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Showtime;

class FunctionController extends Controller
{
    public function index()
    {
        // Solo funciones activas y con películas activas
        $showtimes = Showtime::with(['movie', 'room'])
            ->where('active', true)
            ->whereHas('movie', fn($q) => $q->where('active', true))
            ->orderBy('date')
            ->orderBy('time')
            ->get();

        return view('client.functions.index', compact('showtimes'));
    }

    public function show(Showtime $showtime)
    {
        // Valida que la función esté activa
        if (!$showtime->active || !$showtime->movie->active) {
            abort(404, 'Esta función no está disponible');
        }

        return view('client.functions.show', compact('showtime'));
    }
}
