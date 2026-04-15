@extends('layouts.master')

@section('content')

  <div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row gap-8">

      <div class="flex-1 space-y-4">

        <h1 class="text-3xl font-bold">
          {{ $publisher->nome }}
        </h1>

        @if(!empty($publisher->colore))
          <div>
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded text-sm text-white"
              style="background-color: {{ $publisher->colore }};">
              <span class="w-2 h-2 rounded-full bg-white/80"></span>
              {{ $publisher->nome }}
            </span>
          </div>
        @endif

        <p class="text-gray-700 leading-relaxed">
          {{ $publisher->descrizione }}
        </p>

        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 pt-4 border-t">

          @if(!empty($publisher->colore))
            <div class="col-span-2">
              <p class="text-gray-400 text-xs">Codice colore</p>
              <p>{{ $publisher->colore }}</p>
            </div>
          @endif

        </div>

        <div class="flex justify-end gap-3 pt-6">

          <a href="{{ route('admin.publishers.edit', $publisher->id) }}" class="text-yellow-600 hover:underline text-sm">
            Modifica
          </a>

          <button onclick="openModal()" class="text-red-500 hover:underline text-sm">
            Elimina
          </button>

        </div>

      </div>

    </div>

  </div>

  <!-- MODALE -->
  <div id="deleteModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-lg p-6 w-full max-w-md">

      <h2 class="text-lg font-semibold mb-2">
        Eliminare la casa editrice "{{ $publisher->nome }}"?
      </h2>

      <p class="text-sm text-gray-600 mb-6">
        Questa azione non può essere annullata.
      </p>

      <div class="flex justify-end gap-2">

        <button onclick="closeModal()" class="px-4 py-2 border rounded text-sm">
          Annulla
        </button>

        <form action="{{ route('admin.publishers.destroy', $publisher->id) }}" method="POST">
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