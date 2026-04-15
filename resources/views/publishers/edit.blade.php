@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">Modifica casa editrice</h1>
            <p class="text-gray-500">Aggiorna le informazioni della casa editrice</p>
        </div>

        <form action="{{ route('admin.publishers.update', $publisher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT -->
                <div class="lg:col-span-2 space-y-6">

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Nome</label>
                        <input type="text" name="nome" value="{{ $publisher->nome }}" required
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Descrizione</label>
                        <textarea name="descrizione" rows="5" required
                            class="w-full border border-gray-200 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">{{ $publisher->descrizione }}</textarea>
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="space-y-6">

                    <div class="border rounded-lg p-4 bg-gray-50">
                        <p class="text-xs text-gray-400 mb-2">Anteprima</p>
                        <p class="text-sm font-medium text-gray-800">{{ $publisher->nome }}</p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ Str::limit($publisher->descrizione, 80, '...') }}
                        </p>
                    </div>

                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                        Salva modifiche
                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection