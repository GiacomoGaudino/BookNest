<header class="bg-white border-b">
    <nav class="max-w-5xl mx-auto px-4 py-3 flex justify-between items-center">

        <a href="{{ url('/') }}" class="font-semibold text-lg hover:opacity-70">
            BookNest
        </a>

        <div class="flex items-center gap-6 text-sm text-gray-600">

            <a href="{{ auth()->check() ? route('admin.books.index') : route('books.index') }}"
                class="hover:text-black">
                Libri
            </a>

            <a href="{{ auth()->check() ? route('admin.authors.index') : route('authors.index') }}"
                class="hover:text-black">
                Autori
            </a>

            <a href="{{ auth()->check() ? route('admin.genres.index') : route('genres.index') }}"
                class="hover:text-black">
                Generi
            </a>

            <a href="{{ auth()->check() ? route('admin.publishers.index') : route('publishers.index') }}"
                class="hover:text-black">
                Case editrici
            </a>

            @auth
                <span class="text-gray-400">|</span>

                <span class="text-gray-700">
                    {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-red-500 hover:underline text-sm">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                    Accedi
                </a>
            @endauth

        </div>

    </nav>
</header>