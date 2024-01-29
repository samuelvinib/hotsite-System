<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Condomínio Verde Serrano</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    </head>
    <body class="container">

        <h1 class="txt">{{$path_route}}</h1>
        @if (view()->exists("empreendimentos.$path_route.header"))
            @include("empreendimentos.$path_route.header")

        @else
            @php
                return response()->view('errors.404', [], 404)
            @endphp
        @endif
    </body>
</html>
