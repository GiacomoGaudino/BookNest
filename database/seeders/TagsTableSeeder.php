<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = config('tags');
        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->nome = $tag['nome'];
            $new_tag->save();
        }
    }
}
