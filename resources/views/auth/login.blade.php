@extends('layouts.master')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="mb-8">
            <h1 class="text-3xl font-bold">Accedi</h1>
            <p class="text-gray-500">Inserisci le tue credenziali per continuare</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm text-gray-500 mb-1">Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full border-b border-gray-300 focus:border-black focus:outline-none py-2 text-lg">

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <div class="space-y-6">

                    <div class="border rounded-lg p-4 bg-gray-50 space-y-3">

                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input type="checkbox" name="remember" class="accent-black">
                            Ricordami
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="block text-sm text-blue-600 hover:underline">
                                Password dimenticata?
                            </a>
                        @endif

                    </div>

                    <button type="submit" class="w-full bg-black text-white py-2 rounded hover:bg-gray-800">
                        Accedi
                    </button>

                    @if (Route::has('register'))
                        <p class="text-sm text-gray-500">
                            Non hai ancora un account?
                            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                                Registrati
                            </a>
                        </p>
                    @endif

                </div>

            </div>

        </form>

    </div>

@endsection