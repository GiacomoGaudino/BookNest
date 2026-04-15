<?php

use App\Http\Controllers\api\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BooksController::class, 'index']);
Route::get('/books/{book}', [BooksController::class, 'show']);
