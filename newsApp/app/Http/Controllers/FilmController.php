<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = DB::table('films')->get();
        return view('film.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'release_year' => 'required|string|max:4',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Handle file upload for poster
        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }
        // dd($request->all());

        DB::table('films')->insert([
            'title' => $validatedData['title'],
            'summary' => $validatedData['summary'],
            'release_year' => $validatedData['release_year'],
            'poster' => $posterPath,
            'genre_id' => $validatedData['genre_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the films index page with a success message
        return redirect()->route('films.index')->with('success', 'Film created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = DB::table('films')->where('id', $id)->first();
        if (!$film) {
            abort(404);
        }
        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = DB::table('films')->where('id', $id)->first();
        $genres = Genre::all();
        if (!$film) {
            abort(404);
        }
        return view('film.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'release_year' => 'required|string|max:4',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Handle file upload for poster
        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        $updateData = [
            'title' => $validatedData['title'],
            'summary' => $validatedData['summary'],
            'release_year' => $validatedData['release_year'],
            'genre_id' => $validatedData['genre_id'],
            'updated_at' => now(),
        ];

        if ($posterPath) {
            $updateData['poster'] = $posterPath;
        }

        DB::table('films')->where('id', $id)->update($updateData);

        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('films')->where('id', $id)->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
