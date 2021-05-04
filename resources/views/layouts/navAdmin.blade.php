<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('/graphics/Logo.png') }}" />

    <meta name="description" content="" />
    <meta name="author" content="Damian Bohonos" />
    <meta name="copyright" content="Copyright owner" />
    <meta name="keywords" content="" />
    <meta name="robots" content="follow" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Projekt kultura - Administracja </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md bg-white shadow py-0 sticky-top px-0">
            <div class="container">
                <a class="navbar-brand py-0" href="{{ url('/') }}">
                    <img src="{{ asset('/graphics/Logo.png') }}" style="height: 80px">

                </a>
                <button class="navbar-toggler my-3 navbar-light" style="border-color: gray;" type="button"
                    data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-uppercase"
                        style="font-family: 'Open Sans Condensed', sans-serif;">
                        <li class="nav-item text-md-left text-center mr-2">
                            <a class="nav-link pb-1" href="{{ url('/admin') }}"> Aktualności </a>
                        </li>
                        <li class="nav-item text-md-left text-center mr-2">
                            <a class="nav-link pb-1" href="{{ url('admin/szkolenia') }}"> Szkolenia </a>
                        </li>
                        <li class="nav-item text-md-left text-center mr-2">
                            <a class="nav-link pb-1" href="{{ url('admin/warsztaty') }}"> Warsztaty </a>
                        </li>
                        <li class="nav-item text-md-left text-center mr-2">
                            <a class="nav-link pb-1" href="{{ url('admin/zespoly') }}"> Zespoły </a>
                        </li>
                        <li class="nav-item text-md-left text-center mr-2">
                            <a class="nav-link pb-1" href="{{ url('admin/zamowienia') }}"> Zamówienia </a>
                        </li>
                        <li class="nav-item text-md-left text-center mr-2">
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST">
                                @csrf
                                <a href="#" onclick="document.forms['logout-form'].submit();" id="submitLogout"
                                    class="nav-link pb-1"> Wyloguj
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <footer class="mt-auto" style="font-family: 'Open Sans Condensed', sans-serif; font-size:17px;">
        <p class="mb-0 text-center text-dark font-weight-bold"> Copyright 2021. Wszelkie prawa zastrzeżone. </p>
    </footer>
</body>

</html>