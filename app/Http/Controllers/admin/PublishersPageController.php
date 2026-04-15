<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublishersPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new_publisher = new Publisher();
        $new_publisher->nome = $data['nome'];
        $new_publisher->descrizione = $data['descrizione'];

        $new_publisher->save();

        if ($request->has('from')) {
            return redirect()->route(
                'admin.' . $request->from,
                ['publisher_id' => $new_publisher->id]
            );
        }

        return redirect()->route('admin.publishers.show', $new_publisher->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $data = $request->all();

        $publisher->nome = $data['nome'];
        $publisher->descrizione = $data['descrizione'];

        $publisher->save();

        return redirect()->route('admin.publishers.show', $publisher->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('admin.publishers.index');
    }
}
