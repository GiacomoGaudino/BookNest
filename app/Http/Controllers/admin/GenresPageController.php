<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_genre = new Genre();
        $new_genre->nome = $data['nome'];
        $new_genre->descrizione = $data['descrizione'];
        $new_genre->colore = $data['colore'];

        $new_genre->save();

        if ($request->has('from')) {
            return redirect()->route(
                'admin.' . $request->from,
                ['genre_id' => $new_genre->id]
            );
        }

        return redirect()->route('admin.genres.show', $new_genre->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $data = $request->all();

        $genre->nome = $data['nome'];
        $genre->descrizione = $data['descrizione'];
        $genre->colore = $data['colore'];

        $genre->save();

        return redirect()->route('admin.genres.show', $genre->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('admin.genres.index');
    }
}
