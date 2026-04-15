@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold">Nuovo libro</h1>
            <p class="text-gray-500">Aggiungi tutte le informazioni del libro</p>
        </div>

        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT (main form) -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- titolo -->
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Titolo</label>
                        <input type="text" name="titolo"
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">
                    </div>

                    <!-- autore -->
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Autore</label>

                        <div class="flex gap-2">
                            <select name="author_id" class="w-full border-b border-gray-300 py-2 focus:outline-none">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->nome }}</option>
                                @endforeach
                            </select>

                            <a href="{{ route('admin.authors.create') }}" class="text-blue-600 text-sm">+ nuovo</a>
                        </div>
                    </div>

                    <!-- trama -->
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Trama</label>
                        <textarea name="trama" rows="5"
                            class="w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-blue-400"></textarea>
                    </div>

                    <!-- dettagli -->
                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label class="text-sm text-gray-500">Anno</label>
                            <input type="number" name="anno_pubblicazione" class="w-full border-b border-gray-300 py-2">
                        </div>

                        <div>
                            <label class="text-sm text-gray-500">Pagine</label>
                            <input type="number" name="pagine" class="w-full border-b border-gray-300 py-2">
                        </div>

                    </div>

                    <!-- tags -->
                    <div>
                        <p class="text-sm text-gray-500 mb-2">Tags</p>

                        <div class="flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                                <label class="px-3 py-1 border rounded-full text-sm cursor-pointer hover:bg-gray-100">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="hidden">
                                    {{ $tag->nome }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- RIGHT (sidebar) -->
                <div class="space-y-6">

                    <!-- cover -->
                    <div class="border rounded-lg p-4 text-center">

                        <p class="text-sm text-gray-500 mb-2">Copertina</p>

                        <input type="file" name="copertina" class="text-sm">

                    </div>

                    <!-- genere -->
                    <div class="border rounded-lg p-4">
                        <label class="text-sm text-gray-500">Genere</label>
                        <select name="genre_id" class="w-full mt-2 border rounded px-2 py-1">
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- publisher -->
                    <div class="border rounded-lg p-4">
                        <label class="text-sm text-gray-500">Casa editrice</label>
                        <select name="publisher_id" class="w-full mt-2 border rounded px-2 py-1">
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- submit -->
                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                        Salva libro
                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection