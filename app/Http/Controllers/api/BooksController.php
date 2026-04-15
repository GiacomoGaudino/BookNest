<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'publisher', 'genre')->get()->map(function ($book) {
            if ($book->copertina) {
                $book->copertina = asset('storage/' . $book->copertina);
            }
            return $book;
        });

        return response()->json([
            'message' => 'success',
            'data' => $books
        ]);
    }

    public function show(Book $book)
    {
        if ($book->copertina) {
            $book->copertina = asset('storage/' . $book->copertina);
        }

        return response()->json(
            [
                "message" => "success",
                "data" => $book->load('author', 'publisher', 'genre', 'tags')
            ]
        );
    }
}
