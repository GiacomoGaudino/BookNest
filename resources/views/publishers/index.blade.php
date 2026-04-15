@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <div class="flex justify-between items-center">
      <div>
        <h1 class="text-3xl font-bold">Case editrici</h1>
        <p class="text-gray-500">Gestisci e visualizza le case editrici</p>
      </div>

      <a href="{{ route('admin.publishers.create') }}" class="bg-black text-white px-4 py-2 rounded text-sm">
        + Nuova casa editrice
      </a>
    </div>

    <div class="space-y-4">

      @foreach($publishers as $publisher)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-5">

          <div class="flex justify-between items-start gap-4">

            <div class="space-y-2">
              <h2 class="text-lg font-semibold">
                {{ $publisher->nome }}
              </h2>

              <p class="text-sm text-gray-600">
                {{ Str::limit($publisher->descrizione, 140, '...') }}
              </p>
            </div>

            <div class="flex gap-3 text-sm">
              <a href="{{ route('admin.publishers.show', $publisher->id) }}" class="text-blue-600 hover:underline">
                Apri
              </a>

              <a href="{{ route('admin.publishers.edit', $publisher->id) }}" class="text-yellow-600 hover:underline">
                Modifica
              </a>
            </div>

          </div>

        </div>
      @endforeach

    </div>

  </div>

@endsection