<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body{
            background: #9f18f9;
            background: linear-gradient(to right,#b044f7,#9f18f9 );
        }
        .bg{
            background-image: url(https://i.pinimg.com/564x/24/52/bb/2452bbe587887f2f446dc9451e3eb19a.jpg);
            background-position: center center;
        }
    </style>
</head>

<body>
    <div class="container w-75 bg-white mt-5 rounded shadow">
        <div class="row aling-items-stretch">
            @yield('content')
        </div>
    </div>
</body>
</html>