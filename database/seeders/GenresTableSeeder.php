<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = config('genres');
        foreach ($genres as $genre) {
            $new_genre = new Genre();
            $new_genre->nome = $genre['nome'];
            $new_genre->descrizione = $genre['descrizione'];
            $new_genre->colore = $genre['colore'];
            $new_genre->save();
        }
    }
}
