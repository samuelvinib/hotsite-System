<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Hotsite</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

</head>
<body class="position-relative">

<main>
    @include('partials.header')

    @component('components.form-section')

    @endcomponent

    @component('components.contact')
    @endcomponent

    @yield('content')
</main>

@include('partials.footer')

</body>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
</html>
