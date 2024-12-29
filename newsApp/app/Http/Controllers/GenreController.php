<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Handle file upload for poster

        // dd($request->all());

        DB::table('genres')->insert([
            'name' => $validatedData['name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to the films index page with a success message
        return redirect()->route('genres.index')->with('success', 'genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        if (!$genre) {
            abort(404);
        }
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = DB::table('genres')->where('id', $id)->first();
        if (!$genre) {
            abort(404);
        }
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Handle file upload for poster



        $updateData = [
            'name' => $validatedData['name'],
            'updated_at' => now(),
        ];


        DB::table('genres')->where('id', $id)->update($updateData);

        return redirect()->route('genres.index')->with('success', 'genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('genres')->where('id', $id)->delete();
        return redirect()->route('genres.index')->with('success', 'genre deleted successfully.');
    }
}
