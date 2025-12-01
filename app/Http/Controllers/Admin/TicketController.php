<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Showtime;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['user', 'showtime.movie', 'showtime.room'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);

        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $showtimes = Showtime::with('movie')->where('active', true)->get();
        $users = User::all();

        return view('admin.tickets.create', compact('showtimes', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_row' => 'required',
            'seat_number' => 'required|integer|min:1',
        ]);

        // Generar código único TCK-0001
        $nextNumber = Ticket::max('id') + 1;
        $code = 'TCK-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        Ticket::create([
            'user_id' => $request->user_id,
            'showtime_id' => $request->showtime_id,
            'seat_row' => strtoupper($request->seat_row),
            'seat_number' => $request->seat_number,
            'price' => 85.00,
            'code' => $code,
        ]);

        return redirect()->route('admin.tickets.index')
            ->with('success', 'Boleto creado exitosamente.');
    }

    public function edit(Ticket $ticket)
    {
        $showtimes = Showtime::with('movie')->get();
        $users = User::all();

        return view('admin.tickets.edit', compact('ticket', 'showtimes', 'users'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_row' => 'required',
            'seat_number' => 'required|integer|min:1',
        ]);

        $ticket->update($request->all());

        return redirect()->route('admin.tickets.index')
            ->with('success', 'Boleto actualizado.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.tickets.index')
            ->with('success', 'Boleto eliminado.');
    }
}
