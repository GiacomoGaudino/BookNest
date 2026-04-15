@extends('layouts.master')

@section('content')

    <div class="space-y-10">

        <!-- HERO -->
        <div class="relative rounded-2xl overflow-hidden h-64 flex items-center">

            <img src="{{ asset('storage/update/pexels-book-1283865_1920.jpg') }}"
                class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative z-10 px-6 text-white">
                <h1 class="text-3xl font-bold mb-2">
                    Benvenuto in BookNest
                </h1>
                <p class="text-sm text-gray-200">
                    Gestisci i tuoi libri, autori e contenuti in un unico spazio
                </p>
            </div>

        </div>

        <!-- QUICK ACTIONS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <a href="{{ route('admin.books.index') }}" class="bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition">
                <h2 class="font-semibold mb-1">Libri</h2>
                <p class="text-sm text-gray-500">Gestisci tutti i libri</p>
            </a>

            <a href="{{ route('admin.authors.index') }}"
                class="bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition">
                <h2 class="font-semibold mb-1">Autori</h2>
                <p class="text-sm text-gray-500">Visualizza e modifica autori</p>
            </a>

            <a href="{{ route('admin.genres.index') }}"
                class="bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition">
                <h2 class="font-semibold mb-1">Generi</h2>
                <p class="text-sm text-gray-500">Organizza i generi</p>
            </a>

        </div>

        <!-- CTA -->
        <div class="flex justify-between items-center bg-white p-6 rounded-xl shadow-sm">

            <div>
                <h3 class="font-semibold">Aggiungi un nuovo libro</h3>
                <p class="text-sm text-gray-500">
                    Inserisci rapidamente un nuovo contenuto nel sistema
                </p>
            </div>

            <a href="{{ route('admin.books.create') }}" class="bg-black text-white px-4 py-2 rounded text-sm">
                + Nuovo libro
            </a>

        </div>

    </div>

@endsection