@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">Nuova password</h1>
            <p class="text-gray-500">Inserisci la nuova password per completare il recupero dell’account</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT -->
                <div class="lg:col-span-2 space-y-6">

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus
                            autocomplete="email"
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Nuova password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Conferma password</label>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password"
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="space-y-6">

                    <div class="border rounded-lg p-4 bg-gray-50 space-y-3">
                        <p class="text-sm text-gray-600">
                            Scegli una password sicura e facile da ricordare.
                        </p>
                    </div>

                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                        Reimposta password
                    </button>

                </div>

            </div>

        </form>

    </div>

@endsection