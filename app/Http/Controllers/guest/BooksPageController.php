<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BooksPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'genre']);

        if ($request->filled('author')) {
            $query->where('author_id', $request->author);
        }

        if ($request->filled('genre')) {
            $query->where('genre_id', $request->genre);
        }

        $books = $query->get();
        $authors = Author::all();
        $genres = Genre::all();

        return view('guest/books', compact('books', 'authors', 'genres'));
    }

    public function show(Book $book)
    {
        return view('guest.book', compact('book'));
    }
}
