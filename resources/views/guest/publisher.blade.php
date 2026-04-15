@extends('layouts.master')

@section('content')

  <div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row gap-8">

      <div class="flex-1 space-y-4">

        <h1 class="text-3xl font-bold">
          {{ $publisher->nome }}
        </h1>

        @if(!empty($publisher->colore))
          <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full" style="background-color: {{ $publisher->colore }}"></span>
            <span class="text-sm text-gray-500">
              Colore associato
            </span>
          </div>
        @endif

        <p class="text-gray-700 leading-relaxed">
          {{ $publisher->descrizione }}
        </p>

      </div>

    </div>

  </div>

@endsection