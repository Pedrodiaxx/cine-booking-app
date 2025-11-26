<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['movie', 'room'])->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('admin.tickets.create', compact('movies', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:tickets',
            'movie_id' => 'required',
            'room_id' => 'required',
            'show_time' => 'required',
            'seat' => 'required',
            'price' => 'required|numeric'
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Boleto creado correctamente');
    }

    public function edit(Ticket $ticket)
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('admin.tickets.edit', compact('ticket','movies','rooms'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'code' => 'required',
            'movie_id' => 'required',
            'room_id' => 'required',
            'show_time' => 'required',
            'seat' => 'required',
            'price' => 'required|numeric'
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Boleto actualizado');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')
            ->with('success', 'Boleto eliminado');
    }
}
