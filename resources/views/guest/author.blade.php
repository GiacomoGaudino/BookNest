@extends('layouts.master')

@section('content')

  <div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row gap-8">

      <div class="flex-1 space-y-4">

        <h1 class="text-3xl font-bold">
          {{ $author->nome }}
        </h1>

        <p class="text-gray-500">
          {{ $author->nazione }}
        </p>

        <p class="text-gray-700 leading-relaxed">
          {{ $author->biografia }}
        </p>

        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 pt-4 border-t">

          <div>
            <p class="text-gray-400 text-xs">Data di nascita</p>
            <p>{{ $author->data_di_nascita }}</p>
          </div>

        </div>

      </div>

    </div>

  </div>

@endsection