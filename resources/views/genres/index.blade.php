@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
      <div>
        <h1 class="text-3xl font-bold">Generi</h1>
        <p class="text-gray-500">Organizza i libri per categoria</p>
      </div>

      <a href="{{ route('admin.genres.create') }}" class="bg-black text-white px-4 py-2 rounded text-sm">
        + Nuovo genere
      </a>
    </div>

    <!-- LIST -->
    <div class="space-y-4">

      @foreach($genres as $genre)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-5">

          <div class="flex justify-between items-start gap-4">

            <!-- INFO -->
            <div class="space-y-2">

              <div class="flex items-center gap-2">

                <!-- COLOR DOT -->
                <span class="w-3 h-3 rounded-full" style="background-color: {{ $genre->colore }}"></span>

                <h2 class="text-lg font-semibold">
                  {{ $genre->nome }}
                </h2>

              </div>

              <p class="text-sm text-gray-600">
                {{ Str::limit($genre->descrizione, 120, '...') }}
              </p>

            </div>

            <!-- ACTION -->
            <div class="flex gap-3 text-sm">

              <a href="{{ route('admin.genres.show', $genre->id) }}" class="text-blue-600 hover:underline">
                Apri
              </a>

              <a href="{{ route('admin.genres.edit', $genre->id) }}" class="text-yellow-600 hover:underline">
                Modifica
              </a>

            </div>

          </div>

        </div>
      @endforeach

    </div>

  </div>

@endsection