@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <!-- HEADER -->
    <div>
      <h1 class="text-3xl font-bold mb-2">Libri</h1>
      <p class="text-gray-500">Scopri tutti i libri disponibili</p>
    </div>

    <!-- SEARCH + FILTRI -->
    <div class="flex flex-col md:flex-row gap-4 items-start md:items-end">

      <!-- SEARCH (JS) -->
      <div class="w-full md:w-1/3">
        <input type="text" id="searchInput" placeholder="Cerca per titolo..."
          class="w-full border-b border-gray-300 py-2 focus:outline-none">
      </div>

      <!-- FILTRI (SERVER) -->
      <form method="GET" action="{{ route('books.index') }}" class="flex gap-4 flex-wrap">

        <!-- AUTORE -->
        <select name="author" onchange="this.form.submit()" class="border-b border-gray-300 py-2 focus:outline-none">
          <option value="">Tutti gli autori</option>
          @foreach($authors as $author)
            <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>
              {{ $author->nome }}
            </option>
          @endforeach
        </select>

        <!-- GENERE -->
        <select name="genre" onchange="this.form.submit()" class="border-b border-gray-300 py-2 focus:outline-none">
          <option value="">Tutti i generi</option>
          @foreach($genres as $genre)
            <option value="{{ $genre->id }}" {{ request('genre') == $genre->id ? 'selected' : '' }}>
              {{ $genre->nome }}
            </option>
          @endforeach
        </select>

        <!-- RESET -->
        @if(request('author') || request('genre'))
          <a href="{{ route('books.index') }}" class="text-sm text-gray-500 hover:underline self-end">
            Reset
          </a>
        @endif

      </form>

    </div>

    <!-- RISULTATI -->
    @if($books->isEmpty())
      <p class="text-gray-500">Nessun libro trovato</p>
    @else

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($books as $book)
          <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition overflow-hidden book-column">

            <!-- COVER -->
            <a href="{{ route('book.show', $book->id) }}" class="block">
              <div class="bg-gray-100 p-4 flex items-center justify-center">
                <img src="{{ asset('storage/' . $book->copertina) }}" class="max-w-full max-h-64 object-contain"
                  alt="{{ $book->titolo }}">
              </div>
            </a>

            <!-- CONTENT -->
            <div class="p-4 space-y-2">

              <a href="{{ route('book.show', $book->id) }}" class="block">
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

              <a href="{{ route('book.show', $book->id)}}" class="inline-block text-blue-600 text-sm hover:underline">
                Visualizza →
              </a>

            </div>

          </div>
        @endforeach

      </div>

    @endif

  </div>

@endsection