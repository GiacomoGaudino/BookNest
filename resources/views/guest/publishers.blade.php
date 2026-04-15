@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <!-- HEADER -->
    <div>
      <h1 class="text-3xl font-bold mb-2">Case editrici</h1>
      <p class="text-gray-500">Scopri le case editrici disponibili</p>
    </div>

    <!-- LIST -->
    <div class="space-y-4">

      @foreach($publishers as $publisher)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-5">

          <div class="flex justify-between items-start gap-4">

            <!-- INFO -->
            <div class="space-y-2">

              <div class="flex items-center gap-3">

                <!-- AVATAR -->
                <div
                  class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-sm font-semibold">
                  {{ strtoupper(substr($publisher->nome, 0, 2)) }}
                </div>

                <!-- NAME -->
                <h2 class="text-lg font-semibold">
                  {{ $publisher->nome }}
                </h2>

              </div>

              <!-- DESCRIPTION -->
              <p class="text-sm text-gray-600">
                {{ Str::limit($publisher->descrizione, 140, '...') }}
              </p>

            </div>

            <!-- ACTION -->
            <div class="text-sm">
              <a href="{{ route('publisher.show', $publisher->id) }}" class="text-blue-600 hover:underline">
                Visualizza →
              </a>
            </div>

          </div>

        </div>
      @endforeach

    </div>

  </div>

@endsection