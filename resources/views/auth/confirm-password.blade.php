@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">Conferma password</h1>
            <p class="text-gray-500">Per continuare, inserisci nuovamente la tua password</p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT -->
                <div class="lg:col-span-2 space-y-6">

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="space-y-6">

                    <div class="border rounded-lg p-4 bg-gray-50 space-y-3">

                        <p class="text-sm text-gray-600">
                            Questa operazione richiede una conferma di sicurezza.
                        </p>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                                Password dimenticata?
                            </a>
                        @endif

                    </div>

                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                        Conferma
                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection