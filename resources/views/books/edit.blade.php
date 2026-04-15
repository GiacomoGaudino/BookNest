@extends('layouts.master')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Modifica libro</h1>
        <p class="text-gray-500">Aggiorna le informazioni del libro</p>
    </div>

    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Titolo -->
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Titolo</label>
                    <input type="text" name="titolo" value="{{ $book->titolo }}"
                        class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">
                </div>

                <!-- Autore -->
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Autore</label>
                    <select name="author_id"
                        class="w-full border-b border-gray-300 py-2 focus:outline-none">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                                {{ $author->nome }} {{ $author->cognome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Trama -->
                <div>
                    <label class="block text-sm text-gray-500 mb-1">Trama</label>
                    <textarea name="trama" rows="5"
                        class="w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">{{ $book->trama }}</textarea>
                </div>

                <!-- Genere + Collana -->
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-500">Genere</label>
                        <select name="genre_id"
                            class="w-full border-b border-gray-300 py-2">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-sm text-gray-500">Collana</label>
                        <input type="text" name="collana" value="{{ $book->collana }}"
                            class="w-full border-b border-gray-300 py-2">
                    </div>

                </div>

                <!-- Publisher + Anno -->
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-500">Casa Editrice</label>
                        <select name="publisher_id"
                            class="w-full border-b border-gray-300 py-2">
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>
                                    {{ $publisher->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-sm text-gray-500">Anno</label>
                        <input type="number" name="anno_pubblicazione" value="{{ $book->anno_pubblicazione }}"
                            class="w-full border-b border-gray-300 py-2">
                    </div>

                </div>

                <!-- Pagine + ISBN -->
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-500">Pagine</label>
                        <input type="number" name="pagine" value="{{ $book->pagine }}"
                            class="w-full border-b border-gray-300 py-2">
                    </div>

                    <div>
                        <label class="text-sm text-gray-500">ISBN</label>
                        <input type="text" name="isbn" value="{{ $book->isbn }}"
                            class="w-full border-b border-gray-300 py-2">
                    </div>

                </div>

                <!-- TAGS -->
                <div>
                    <p class="text-sm text-gray-500 mb-2">Tags</p>

                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <label class="px-3 py-1 border rounded-full text-sm cursor-pointer hover:bg-gray-100">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="hidden"
                                    {{ $book->tags->contains($tag->id) ? 'checked' : '' }}>
                                {{ $tag->nome }}
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="space-y-6">

                <!-- Copertina -->
                <div class="border rounded-lg p-4 text-center">

                    <p class="text-sm text-gray-500 mb-3">Copertina</p>

                    <input type="file" name="copertina" class="text-sm mb-4">

                    @if($book->copertina)
                        <img src="{{ asset('storage/' . $book->copertina) }}"
                             class="w-full h-48 object-cover rounded-lg shadow">
                    @endif

                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                    Salva modifiche
                </button>

            </div>

        </div>

    </form>

</div>

@endsection