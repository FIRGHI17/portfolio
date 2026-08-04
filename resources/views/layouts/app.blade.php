<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <title>@yield('title', 'Firgi Studio')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#090909] text-white">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>