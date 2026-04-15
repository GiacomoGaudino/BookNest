@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto space-y-8">

        <!-- HEADER -->
        <div>
            <h1 class="text-3xl font-bold">
                {{ $book->titolo }}
            </h1>

            <p class="text-gray-500 mt-1">
                {{ $book->author->nome }} {{ $book->author->cognome }}
            </p>
        </div>

        <!-- CONTENT -->
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

                <!-- GENERE -->
                <div>
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded text-sm text-white"
                        style="background-color: {{ $book->genre->colore }};">
                        <span class="w-2 h-2 rounded-full bg-white/80"></span>
                        {{ $book->genre->nome }}
                    </span>
                </div>

                <!-- TRAMA -->
                <p class="text-gray-700 leading-relaxed">
                    {{ $book->trama }}
                </p>

                <!-- DETTAGLI -->
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

                <!-- TAGS -->
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

        <!-- FOOTER ACTIONS -->
        <div class="pt-6 border-t flex justify-between items-center">

            <!-- BACK -->
            <a href="{{ route('admin.books.index') }}" class="text-sm text-gray-500 hover:underline">
                ← Torna alla lista libri
            </a>

            <!-- ACTIONS -->
            <div class="flex gap-2">

                <a href="{{ route('admin.books.edit', $book->id) }}"
                    class="px-4 py-2 text-sm border border-yellow-500 text-yellow-700 rounded hover:bg-yellow-50 transition">
                    Modifica
                </a>

                <button onclick="openModal()"
                    class="px-4 py-2 text-sm border border-red-500 text-red-600 rounded hover:bg-red-50 transition">
                    Elimina
                </button>

            </div>

        </div>

    </div>

    <!-- MODAL DELETE -->
    <div id="deleteModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md space-y-4">

            <h2 class="text-lg font-semibold">
                Eliminare questo libro?
            </h2>

            <p class="text-sm text-gray-500">
                Questa azione non può essere annullata.
            </p>

            <div class="flex justify-end gap-2 pt-4">

                <button onclick="closeModal()" class="px-4 py-2 text-sm border rounded hover:bg-gray-100">
                    Annulla
                </button>

                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="px-4 py-2 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                        Elimina definitivamente
                    </button>
                </form>

            </div>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>
        function openModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>

@endsection