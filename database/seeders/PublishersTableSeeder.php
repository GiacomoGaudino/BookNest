<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = config('publishers');
        foreach ($publishers as $publisher) {
            $new_publisher = new Publisher();
            $new_publisher->nome = $publisher['nome'];
            $new_publisher->descrizione = $publisher['descrizione'];
            $new_publisher->save();
        }
    }
}
