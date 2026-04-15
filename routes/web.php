<?php

use App\Http\Controllers\admin\AuthorsPageController;
use App\Http\Controllers\admin\BooksPageController;
use App\Http\Controllers\admin\GenresPageController;
use App\Http\Controllers\admin\PublishersPageController;
use App\Http\Controllers\guest\AuthorsPageController as GuestAuthorsPageController;
use App\Http\Controllers\guest\BooksPageController as GuestBooksPageController;
use App\Http\Controllers\guest\GenresPageController as GuestGenresPageController;
use App\Http\Controllers\guest\PublishersPageController as GuestPublishersPageController;
use App\Http\Controllers\ProfileController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/books', [GuestBooksPageController::class, 'index'])->name('books.index');
Route::get('/authors', [GuestAuthorsPageController::class, 'index'])->name('authors.index');
Route::get('/genres', [GuestGenresPageController::class, 'index'])->name('genres.index');
Route::get('/publishers', [GuestPublishersPageController::class, 'index'])->name('publishers.index');
Route::get('/books/{book}', [GuestBooksPageController::class, 'show'])->name('book.show');
Route::get('/authors/{author}', [GuestAuthorsPageController::class, 'show'])->name('author.show');
Route::get('/genres/{genre}', [GuestGenresPageController::class, 'show'])->name('genre.show');
Route::get('/publishers/{publisher}', [GuestPublishersPageController::class, 'show'])->name('publisher.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::resource('books', BooksPageController::class)
            ->names('books');
        Route::resource('authors', AuthorsPageController::class)
            ->names('authors');
        Route::resource('genres', GenresPageController::class)
            ->names('genres');
        Route::resource('publishers', PublishersPageController::class)
            ->names('publishers');
    });


require __DIR__ . '/auth.php';
