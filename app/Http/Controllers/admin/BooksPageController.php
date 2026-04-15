<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        $tags = Tag::all();
        return view('books.create', compact('authors', 'genres', 'publishers', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_book = new Book();
        $new_book->titolo = $data['titolo'];
        $new_book->copertina = $data['copertina'];
        $new_book->author_id = $data['author_id'];
        $new_book->genre_id = $data['genre_id'];
        $new_book->trama = $data['trama'];
        $new_book->collana = $data['collana'];
        $new_book->publisher_id = $data['publisher_id'];
        $new_book->anno_pubblicazione = $data['anno_pubblicazione'];
        $new_book->pagine = $data['pagine'];
        $new_book->isbn = $data['isbn'];

        if (array_key_exists('copertina', $data)) {
            $img_path = Storage::putFile('books', $data['copertina'], 'public');
            $new_book->copertina = $img_path;
        }

        $new_book->save();


        if (isset($data['tags'])) {
            $new_book->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.books.show', $new_book->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        $tags = Tag::all();
        return view('books.edit', compact('book', 'authors', 'genres', 'publishers', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        $book->titolo = $data['titolo'];
        $book->copertina = $data['copertina'];
        $book->author_id = $data['author_id'];
        $book->genre_id = $data['genre_id'];
        $book->trama = $data['trama'];
        $book->collana = $data['collana'];
        $book->publisher_id = $data['publisher_id'];
        $book->anno_pubblicazione = $data['anno_pubblicazione'];
        $book->pagine = $data['pagine'];
        $book->isbn = $data['isbn'];

        if (array_key_exists('copertina', $data)) {
            if ($book->copertina) {
                Storage::delete($book->copertina);
            }
            $img_path = Storage::putFile('books', $data['copertina'], 'public');
            $book->copertina = $img_path;
        }

        $book->save();

        if (isset($data['tags'])) {
            $book->tags()->sync($data['tags']);
        } else {
            $book->tags()->detach();
        }

        return redirect()->route('admin.books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->copertina) {
            Storage::delete($book->copertina);
        }
        $book->tags()->detach();
        $book->delete();
        return redirect()->route('admin.books.index');
    }
}
