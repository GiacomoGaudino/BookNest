<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = config('authors');
        foreach ($authors as $author) {
            $new_author = new Author();
            $new_author->nome = $author['nome'];
            $new_author->nazione = $author['nazione'];
            $new_author->data_di_nascita = $author['data_di_nascita'];
            $new_author->biografia = $author['biografia'];
            $new_author->save();
        }
    }
}
