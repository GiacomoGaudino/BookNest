@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">Modifica genere</h1>
            <p class="text-gray-500">Aggiorna le informazioni del genere</p>
        </div>

        <form action="{{ route('admin.genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Nome</label>
                        <input type="text" name="nome" value="{{ $genre->nome }}" required
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Descrizione</label>
                        <textarea name="descrizione" rows="5" required
                            class="w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">{{ $genre->descrizione }}</textarea>
                    </div>

                </div>

                <div class="space-y-6">

                    <div class="border rounded-lg p-4 space-y-4">
                        <div>
                            <label class="block text-sm text-gray-500 mb-2">Colore</label>
                            <input type="color" name="colore" value="{{ $genre->colore }}" title="Scegli il colore"
                                class="w-full h-12 cursor-pointer border rounded">
                        </div>

                        <div class="rounded-lg border bg-gray-50 p-4">
                            <p class="text-xs text-gray-400 mb-2">Anteprima</p>
                            <div class="flex items-center gap-3">
                                <span class="w-4 h-4 rounded-full border"
                                    style="background-color: {{ $genre->colore }};"></span>
                                <span class="text-sm text-gray-700">{{ $genre->nome }}</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                        Salva modifiche
                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection