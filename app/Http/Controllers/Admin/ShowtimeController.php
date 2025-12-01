<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Showtime;
use App\Models\Room;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::with(['room', 'movie'])
            ->orderBy('date')
            ->orderBy('time')
            ->paginate(20);

        return view('admin.showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        $rooms = Room::where('active', true)->get();
        $movies = Movie::where('active', true)->get();

        return view('admin.showtimes.create', compact('rooms', 'movies'));
    }

    public function store(Request $request)
{
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'movie_id' => 'required|exists:movies,id',
        'date' => 'required|date',
        'time' => 'required',
    ]);

    // Validación de máximo 5 funciones por día en una sala
    $count = Showtime::where('room_id', $request->room_id)
                     ->where('date', $request->date)
                     ->count();

    if ($count >= 5) {
        return back()->withErrors([
            'limit' => 'Esta sala ya tiene las 5 funciones máximas del día.'
        ]);
    }

    // Encontrar sala y calcular capacidad total
    $room = Room::find($request->room_id);
    $totalSeats = $room->rows * $room->seats_per_row;

    // Crear función con asientos iniciales
    Showtime::create([
        'room_id' => $request->room_id,
        'movie_id' => $request->movie_id,
        'date' => $request->date,
        'time' => $request->time,
        'available_seats' => $totalSeats,
        'active' => $request->active ? 1 : 0,
    ]);

    return redirect()->route('admin.showtimes.index')
        ->with('success', 'Función creada exitosamente.');
}


    public function edit(Showtime $showtime)
    {
        $rooms = Room::where('active', true)->get();
        $movies = Movie::where('active', true)->get();

        return view('admin.showtimes.edit', compact('showtime', 'rooms', 'movies'));
    }

    public function update(Request $request, Showtime $showtime)
{
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'movie_id' => 'required|exists:movies,id',
        'date' => 'required|date',
        'time' => 'required',
    ]);

    $room = Room::find($request->room_id);
    $totalSeats = $room->rows * $room->seats_per_row;

    $showtime->update([
        'room_id' => $request->room_id,
        'movie_id' => $request->movie_id,
        'date' => $request->date,
        'time' => $request->time,
        'available_seats' => $totalSeats,
        'active' => $request->active ? 1 : 0,
    ]);

    return redirect()->route('admin.showtimes.index')
        ->with('success', 'Función actualizada.');
}

public function destroy(Showtime $showtime)
{
    if ($showtime->tickets()->count() > 0) {
        return back()->withErrors([
            'error' => 'No puedes eliminar una función que ya tiene boletos vendidos.'
        ]);
    }

    $showtime->delete();

    return back()->with('success', 'Función eliminada correctamente.');
}

   

    public function toggle(Showtime $showtime)
    {
        $showtime->active = !$showtime->active;
        $showtime->save();

        return redirect()->route('admin.showtimes.index')
            ->with('success', $showtime->active ? 'Función activada' : 'Función desactivada');
    }

    public function cancel(Showtime $showtime)
{
    $showtime->cancelled = true;
    $showtime->save();

    return back()->with('success', 'La función fue cancelada correctamente.');
}

}
