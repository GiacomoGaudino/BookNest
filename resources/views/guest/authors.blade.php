@extends('layouts.master')

@section('content')

  <div class="space-y-8">

    <!-- HEADER -->
    <div>
      <h1 class="text-3xl font-bold mb-2">Autori</h1>
      <p class="text-gray-500">Scopri tutti gli autori disponibili</p>
    </div>

    <!-- LIST -->
    <div class="space-y-4">

      @foreach($authors as $author)
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition p-5">

          <div class="flex justify-between items-start gap-4">

            <!-- INFO -->
            <div class="space-y-2">

              <div class="flex items-center gap-3">

                <!-- AVATAR -->
                <div
                  class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-sm font-semibold">
                  {{ strtoupper(substr($author->nome, 0, 1)) }}
                </div>

                <!-- NAME -->
                <div>
                  <h2 class="text-lg font-semibold">
                    {{ $author->nome }}
                  </h2>

                  @if($author->nazionalita)
                    <p class="text-xs text-gray-400">
                      {{ $author->nazionalita }}
                    </p>
                  @endif
                </div>

              </div>

              <!-- BIO -->
              <p class="text-sm text-gray-600">
                {{ Str::limit($author->biografia, 140, '...') }}
              </p>

            </div>

            <!-- ACTION -->
            <div class="text-sm">
              <a href="{{ route('author.show', $author->id) }}" class="text-blue-600 hover:underline">
                Visualizza →
              </a>
            </div>

          </div>

        </div>
      @endforeach

    </div>

  </div>

@endsection