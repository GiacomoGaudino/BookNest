@extends('layouts.master')

@section('content')

    <div class="max-w-3xl mx-auto mt-16">

        <div class="bg-white p-8 rounded-xl shadow-sm space-y-6 text-center">

            <div>
                <h1 class="text-2xl font-bold mb-2">Verifica email</h1>
                <p class="text-gray-500 text-sm">
                    Controlla la tua email per completare la registrazione
                </p>
            </div>

            @if (session('resent'))
                <div class="p-4 bg-green-100 text-green-700 rounded text-sm">
                    Ti abbiamo inviato un nuovo link di verifica.
                </div>
            @endif

            <p class="text-gray-600 text-sm">
                Prima di continuare, verifica il tuo indirizzo email cliccando sul link che ti abbiamo inviato.
            </p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf

                <button type="submit" class="text-blue-600 hover:underline text-sm">
                    Non hai ricevuto l'email? Richiedine un'altra
                </button>
            </form>

        </div>

    </div>

@endsection