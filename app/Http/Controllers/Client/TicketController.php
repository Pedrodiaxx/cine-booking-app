<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['showtime.movie', 'showtime.room'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('client.tickets.index', compact('tickets'));
    }

    public function store(Request $request, Showtime $showtime)
    {
        $request->validate([
            'seat_row' => 'required|string',
            'seat_number' => 'required|integer',
        ]);

        // Validar si ya está ocupado
        $exists = Ticket::where('showtime_id', $showtime->id)
            ->where('seat_row', $request->seat_row)
            ->where('seat_number', $request->seat_number)
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'seat' => 'Este asiento ya fue ocupado.'
            ]);
        }

        Ticket::create([
            'user_id' => Auth::id(),
            'showtime_id' => $showtime->id,
            'seat_row' => $request->seat_row,
            'seat_number' => $request->seat_number,
            'price' => 85.00,
        ]);

        return redirect()->route('client.tickets.index')
            ->with('success', 'Boleto comprado exitosamente.');
    }
}
