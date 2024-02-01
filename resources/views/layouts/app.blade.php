<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Hotsite</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></script>

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
<script src="{{asset('assets/js/jquery.mask.js')}}"></script>
</html>
