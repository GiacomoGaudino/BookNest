@extends('layouts.master')

@section('content')

  <div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row gap-8">

      <div class="w-full md:w-1/3">
        <div class="w-full h-[300px] rounded-xl shadow-sm border flex items-center justify-center"
          style="background-color: {{ $genre->colore }}20;">
          <div class="text-center">
            <span class="mx-auto mb-4 block w-16 h-16 rounded-full border"
              style="background-color: {{ $genre->colore }};"></span>
            <p class="text-sm text-gray-600">Genere</p>
          </div>
        </div>
      </div>

      <div class="flex-1 space-y-4">

        <h1 class="text-3xl font-bold">
          {{ $genre->nome }}
        </h1>

        <div>
          <span class="inline-flex items-center gap-2 px-3 py-1 rounded text-sm text-white"
            style="background-color: {{ $genre->colore }};">
            <span class="w-2 h-2 rounded-full bg-white/80"></span>
            {{ $genre->nome }}
          </span>
        </div>

        <p class="text-gray-700 leading-relaxed">
          {{ $genre->descrizione }}
        </p>

        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 pt-4 border-t">

          <div class="col-span-2">
            <p class="text-gray-400 text-xs">Codice colore</p>
            <p>{{ $genre->colore }}</p>
          </div>

        </div>

        <div class="flex justify-end gap-3 pt-6">

          <a href="{{ route('admin.genres.edit', $genre->id) }}" class="text-yellow-600 hover:underline text-sm">
            Modifica
          </a>

          <button onclick="openModal()" class="text-red-500 hover:underline text-sm">
            Elimina
          </button>

        </div>

      </div>

    </div>

  </div>

  <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-lg p-6 w-full max-w-md">

      <h2 class="text-lg font-semibold mb-2">
        Eliminare il genere "{{ $genre->nome }}"?
      </h2>

      <p class="text-sm text-gray-600 mb-6">
        Questa azione non può essere annullata.
      </p>

      <div class="flex justify-end gap-2">

        <button onclick="closeModal()" class="px-4 py-2 border rounded text-sm">
          Annulla
        </button>

        <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST">
          @csrf
          @method('DELETE')

          <button class="bg-red-500 text-white px-4 py-2 rounded text-sm">
            Elimina
          </button>
        </form>

      </div>

    </div>

  </div>

  <script>
    function openModal() {
      document.getElementById('deleteModal').classList.remove('hidden');
      document.getElementById('deleteModal').classList.add('flex');
    }

    function closeModal() {
      document.getElementById('deleteModal').classList.add('hidden');
      document.getElementById('deleteModal').classList.remove('flex');
    }
  </script>

@endsection