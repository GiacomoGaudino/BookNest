@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- COVER -->
            <div class="md:col-span-1">

                @if($book->copertina)
                    <div class="bg-gray-100 rounded-xl shadow-sm border p-4">
                        <img src="{{ asset('storage/' . $book->copertina) }}" alt="{{ $book->titolo }}"
                            class="w-full h-auto object-contain">
                    </div>
                @else
                    <div class="w-full h-64 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif

            </div>

            <!-- INFO -->
            <div class="md:col-span-2 space-y-6">

                <div>
                    <h1 class="text-3xl font-bold">
                        {{ $book->titolo }}
                    </h1>

                    <p class="text-gray-500 mt-1">
                        {{ $book->author->nome }} {{ $book->author->cognome }}
                    </p>
                </div>

                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded text-sm text-white"
                        style="background-color: {{ $book->genre->colore }};">
                        <span class="w-2 h-2 rounded-full bg-white/80"></span>
                        {{ $book->genre->nome }}
                    </span>
                </div>

                <p class="text-gray-700 leading-relaxed">
                    {{ $book->trama }}
                </p>

                <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 pt-6 border-t">

                    <div>
                        <p class="text-gray-400 text-xs">Casa editrice</p>
                        <p>{{ $book->publisher->nome }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Collana</p>
                        <p>{{ $book->collana }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Pagine</p>
                        <p>{{ $book->pagine }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Anno</p>
                        <p>{{ $book->anno_pubblicazione }}</p>
                    </div>

                    <div class="col-span-2">
                        <p class="text-gray-400 text-xs">ISBN</p>
                        <p>{{ $book->isbn }}</p>
                    </div>

                </div>

                @if($book->tags->count())
                    <div class="flex flex-wrap gap-2 pt-4">
                        @foreach($book->tags as $tag)
                            <span class="bg-green-100 text-green-700 px-2 py-1 text-xs rounded">
                                {{ $tag->nome }}
                            </span>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>

    </div>

@endsection