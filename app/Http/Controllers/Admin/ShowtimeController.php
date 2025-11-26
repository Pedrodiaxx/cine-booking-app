<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::with(['movie', 'room'])
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('admin.showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('admin.showtimes.create', compact('movies', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date|after:yesterday',
            'start_time' => 'required',
        ]);

        $room = Room::find($request->room_id);

        Showtime::create([
            'movie_id' => $request->movie_id,
            'room_id' => $request->room_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'available_seats' => $room->rows * $room->seats_per_row,
            'active' => true,
        ]);

        return redirect()
            ->route('admin.showtimes.index')
            ->with('success', 'Función creada correctamente');
    }

    public function edit(Showtime $showtime)
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('admin.showtimes.edit', compact('showtime', 'movies', 'rooms'));
    }

    public function update(Request $request, Showtime $showtime)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date|after:yesterday',
            'start_time' => 'required',
        ]);

        $room = Room::find($request->room_id);

        $showtime->update([
            'movie_id' => $request->movie_id,
            'room_id' => $request->room_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'available_seats' => $room->rows * $room->seats_per_row,
        ]);

        return redirect()
            ->route('admin.showtimes.index')
            ->with('success', 'Función actualizada correctamente');
    }

    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()
            ->route('admin.showtimes.index')
            ->with('success', 'Función eliminada');
    }
}
