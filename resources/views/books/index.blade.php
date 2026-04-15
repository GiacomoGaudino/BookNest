@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <!-- HEADER -->
    <div class="flex justify-between items-start gap-4">
      <div>
        <h1 class="text-3xl font-bold mb-2">Libri</h1>
        <p class="text-gray-500">Scopri tutti i libri disponibili</p>
      </div>

      @auth
        <a href="{{ route('admin.books.create') }}"
          class="bg-black text-white px-4 py-2 rounded text-sm hover:bg-gray-800 transition">
          + Aggiungi libro
        </a>
      @endauth
    </div>

    <!-- SEARCH -->
    <div>
      <input type="text" id="searchInput" placeholder="Cerca per titolo..."
        class="w-full max-w-md border-b border-gray-300 py-2 focus:outline-none">
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      @foreach($books as $book)

        @php
          $showRoute = auth()->check()
            ? route('admin.books.show', $book->id)
            : route('book.show', $book->id);
        @endphp

        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition overflow-hidden book-column">

          <!-- COVER -->
          <a href="{{ $showRoute }}" class="block">
            <div class="h-64 bg-gray-100 flex items-center justify-center overflow-hidden">
              <img src="{{ asset('storage/' . $book->copertina) }}" class="max-h-full max-w-full object-contain"
                alt="{{ $book->titolo }}">
            </div>
          </a>

          <!-- CONTENT -->
          <div class="p-4 space-y-2">

            <a href="{{ $showRoute }}" class="block">
              <h2 class="font-semibold text-lg card-title hover:underline">
                {{ $book->titolo }}
              </h2>
            </a>

            <p class="text-sm text-gray-500">
              {{ $book->author->nome }} {{ $book->author->cognome }}
            </p>

            <p class="text-sm text-gray-600">
              {{ Str::limit($book->trama, 100, '...') }}
            </p>

            <a href="{{ $showRoute }}" class="inline-block text-blue-600 text-sm hover:underline">
              Visualizza →
            </a>

          </div>

        </div>

      @endforeach

    </div>

  </div>

@endsection