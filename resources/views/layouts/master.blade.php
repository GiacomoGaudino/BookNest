<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'BookNest')</title>
</head>

<body class="bg-gray-50 text-gray-900 flex flex-col min-h-screen">

    @include('partials.header')

    <main class="flex-1 max-w-5xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>