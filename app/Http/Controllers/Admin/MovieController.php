<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|integer',
            'description' => 'nullable|string',
            'poster' => 'nullable|image|max:2048',
            'release_date' => 'nullable|date',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->poster->store('posters', 'public');
        }

        Movie::create($data);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Película creada exitosamente.');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|integer',
            'description' => 'nullable|string',
            'poster' => 'nullable|image|max:2048',
            'release_date' => 'nullable|date',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->poster->store('posters', 'public');
        }

        $movie->update($data);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Película actualizada.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('admin.movies.index')
            ->with('success', 'Película eliminada.');
    }
}
