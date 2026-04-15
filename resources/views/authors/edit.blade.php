@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold">Modifica autore</h1>
            <p class="text-gray-500">Aggiorna le informazioni dell’autore</p>
        </div>

        <form action="{{ route('admin.authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Nome -->
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Nome</label>
                        <input type="text" name="nome" value="{{ $author->nome }}"
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">
                    </div>

                    <!-- Bio -->
                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Biografia</label>
                        <textarea name="biografia" rows="6"
                            class="w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">{{ $author->biografia }}</textarea>
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="space-y-6">

                    <!-- Nazione -->
                    <div class="border rounded-lg p-4">
                        <label class="text-sm text-gray-500">Nazione</label>
                        <input type="text" name="nazione" value="{{ $author->nazione }}"
                            class="w-full mt-2 border-b border-gray-300 py-2">
                    </div>

                    <!-- Data -->
                    <div class="border rounded-lg p-4">
                        <label class="text-sm text-gray-500">Data di nascita</label>
                        <input type="date" name="data_di_nascita" value="{{ $author->data_di_nascita }}"
                            class="w-full mt-2 border rounded px-2 py-1">
                    </div>

                    <!-- CTA -->
                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                        Salva modifiche
                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection