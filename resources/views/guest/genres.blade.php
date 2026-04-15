@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <!-- HEADER -->
    <div>
      <h1 class="text-3xl font-bold mb-2">Generi</h1>
      <p class="text-gray-500">Esplora tutti i generi disponibili</p>
    </div>

    <!-- LIST -->
    <div class="space-y-4">

      @foreach($genres as $genre)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-5">

          <div class="flex justify-between items-start gap-4">

            <!-- INFO -->
            <div class="space-y-2">

              <div class="flex items-center gap-3">

                <!-- COLOR DOT -->
                <span class="w-4 h-4 rounded-full border" style="background-color: {{ $genre->colore }};"></span>

                <!-- NAME -->
                <h2 class="text-lg font-semibold">
                  {{ $genre->nome }}
                </h2>

              </div>

              <!-- DESCRIPTION -->
              <p class="text-sm text-gray-600">
                {{ Str::limit($genre->descrizione, 140, '...') }}
              </p>

            </div>

            <!-- ACTION -->
            <div class="text-sm">
              <a href="{{ route('genre.show', $genre->id) }}" class="text-blue-600 hover:underline">
                Visualizza →
              </a>
            </div>

          </div>

        </div>
      @endforeach

    </div>

  </div>

@endsection