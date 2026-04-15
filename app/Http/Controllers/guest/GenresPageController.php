<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresPageController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('guest.genres', compact('genres'));
    }

    public function show(Genre $genre)
    {
        return view('guest.genre', compact('genre'));
    }
}
