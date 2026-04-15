<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = config('books');
        $authors = Author::pluck('id', 'nome');
        $genres  = Genre::pluck('id', 'nome');
        $publishers = Publisher::pluck('id', 'nome');
        foreach ($books as $book) {

            $newBook = new Book();
            $newBook->titolo = $book['titolo'];
            $newBook->copertina = $book['copertina'];
            $newBook->author_id = $authors[$book['autore']] ?? null;
            $newBook->publisher_id = $publishers[$book['casa_editrice']] ?? null;
            $newBook->trama = $book['trama'];
            $newBook->collana = $book['collana'];
            $newBook->anno_pubblicazione = $book['anno_pubblicazione'];
            $newBook->pagine = $book['pagine'];
            $newBook->isbn = $book['isbn'];
            $newBook->genre_id = $genres[$book['genere']] ?? null;
            $newBook->save();
        }
    }
}
