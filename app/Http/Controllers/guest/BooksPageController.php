<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksPageController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('guest.books', compact('books'));
    }

    public function show(Book $book)
    {
        return view('guest.book', compact('book'));
    }
}
