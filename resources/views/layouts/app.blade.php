<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color: #f7a8bb">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="images/m-d-foundation.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="mt-4" style="margin-left:100px">
                <div class="message" id="message">
                    @if (session()->has('message'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                            style="width: 300px;height:20px">
                            <div div class="alert alert-success">
                                <i class="fa-regular fa-circle-check"></i> {{ session('message') }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="message1" id="message">
                    @if (session()->has('message1'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                            style="width: 300px;height:20px;">
                            <div class="alert alert-danger">
                                <i class="fa-regular fa-circle-x"></i>{{ session('message1') }}
                            </div>
                        </div>
                    @endif
                </div>
        </nav>
        <div class="content">
            <div id="div-1">
                <li {{ Request::is('user') ? 'class=active' : '' }}>
                    <a class="nav_list" href="/user" id="myButton">
                        <div class="icon"><i class="fa-solid fa-user"></i></div>
                        <div class="side_name">Employee List </div>
                    </a>
                </li>

                <li>

                    <a class="nav_list" href="{{ route('register') }}" id="myButton">
                        <div class="icon"><i class="fa-solid fa-pen"></i></div>
                        <div class="side_name">Add Employee </div>
                    </a>
                </li>
                <li>
                    <a class="nav_list" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <div class="icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                        <div class="side_name">LogOut </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </div>
            <div id="div-2">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <p>Copyright@2023 by Refsnes Data. All Rights Reserved</p>
        </footer>
    </div>
</body>

</html>
