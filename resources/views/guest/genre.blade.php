@extends('layouts.master')

@section('content')

  <div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row gap-8">

      <div class="flex-1 space-y-4">

        <h1 class="text-3xl font-bold">
          {{ $genre->nome }}
        </h1>

        <div>
          <span class="inline-flex items-center gap-2 px-3 py-1 rounded text-sm text-white"
            style="background-color: {{ $genre->colore }};">
            <span class="w-2 h-2 rounded-full bg-white/80"></span>
            {{ $genre->nome }}
          </span>
        </div>

        <p class="text-gray-700 leading-relaxed">
          {{ $genre->descrizione }}
        </p>

        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 pt-4 border-t">

          <div class="col-span-2">
            <p class="text-gray-400 text-xs">Codice colore</p>
            <p>{{ $genre->colore }}</p>
          </div>

        </div>

      </div>

    </div>

  </div>

@endsection