<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublishersPageController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('guest.publishers', compact('publishers'));
    }

    public function show(Publisher $publisher)
    {
        return view('guest.publisher', compact('publisher'));
    }
}
