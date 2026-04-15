<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use PharIo\Manifest\Author as ManifestAuthor;

class AuthorsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_author = new Author();
        $new_author->nome = $data['nome'];
        $new_author->nazione = $data['nazione'];
        $new_author->data_di_nascita = $data['data_di_nascita'];
        $new_author->biografia = $data['biografia'];

        $new_author->save();

        if ($request->has('from')) {
            return redirect()->route(
                'admin.' . $request->from,
                ['author_id' => $new_author->id]
            );
        }


        return redirect()->route('admin.authors.show', $new_author->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $data = $request->all();

        $author->nome = $data['nome'];
        $author->nazione = $data['nazione'];
        $author->data_di_nascita = $data['data_di_nascita'];
        $author->biografia = $data['biografia'];

        $author->save();

        return redirect()->route('admin.authors.show', $author->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index');
    }
}
