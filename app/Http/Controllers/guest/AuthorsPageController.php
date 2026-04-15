<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsPageController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('guest.authors', compact('authors'));
    }

    public function show(Author $author)
    {
        return view('guest.author', compact('author'));
    }
}
