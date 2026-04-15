@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
      <div>
        <h1 class="text-3xl font-bold">Autori</h1>
        <p class="text-gray-500">Gestisci e visualizza gli autori</p>
      </div>

      <a href="{{ route('admin.authors.create') }}" class="bg-black text-white px-4 py-2 rounded text-sm">
        + Nuovo autore
      </a>
    </div>

    <!-- LIST -->
    <div class="space-y-4">

      @foreach($authors as $author)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-5">

          <div class="flex justify-between items-start gap-4">

            <!-- INFO -->
            <div class="space-y-2">

              <h2 class="text-lg font-semibold">
                {{ $author->nome }}
              </h2>

              @if($author->nazionalita)
                <span class="inline-block bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">
                  {{ $author->nazionalita }}
                </span>
              @endif

              <p class="text-sm text-gray-600">
                {{ Str::limit($author->biografia, 120, '...') }}
              </p>

            </div>

            <!-- ACTION -->
            <div class="flex gap-3 text-sm">

              <a href="{{ route('admin.authors.show', $author->id) }}" class="text-blue-600 hover:underline">
                Apri
              </a>

              <a href="{{ route('admin.authors.edit', $author->id) }}" class="text-yellow-600 hover:underline">
                Modifica
              </a>

            </div>

          </div>

        </div>
      @endforeach

    </div>

  </div>

@endsection