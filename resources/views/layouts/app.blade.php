<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!--<link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">-->

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        @include('nav')

        <main class="py-4">
            <div class="container">
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success</strong> {{ session()->get('message') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <script src="{{ asset('js/jquery.slim.min.js') }}"></script>

    <!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Latest compiled and minified JavaScript -->
    <!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!--    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>-->
    <!--    <script src="{{ asset('js/ckeditor.js') }}"></script>-->

</body>
</html>
