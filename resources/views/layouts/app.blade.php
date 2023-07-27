<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
</head>
<style>
    #app {
        width: 100vw;
        height: 100vh;
    }

    .navbar {
        height: 10%;
    }

    .content {
        height: 85%;
        display: flex;
        overflow: hidden;
    }

    #div-1 {
        width: 15%;
        height: 100vh;
        background: #f7a8bb;

    }

    #div-2 {
        width: 85%;
        overflow: scroll;
        background: #f7e5ea;
    }

    .footer {
        background: #f7a8bb;
        height: 5%;
        text-align: center;
    }

    li {
        text-decoration: none;
        list-style: none;
    }

    .nav_list {
        width: 96%;
        height: 7vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 5px;
        font-size: 14px;
        font-family: inherit;
        color: black;
        text-decoration: none;
        transition: 0.3s;
    }

    .nav_list:hover {
        width: 96%;
        border-radius: 10px;
        box-shadow: 2px 5px 3px 0px #9d9a9a;
        background: #e94870;
        color: white;
    }

    .icon {
        justify-content: center;
        align-items: center;
        align-content: center;
        display: flex;
        flex: 1;

    }

    .active .nav_list {
        width: 96%;
        color: white;
        border-radius: 10px;
        background: #e94870;
    }

    .side_name {
        flex: 2;
        display: block;
    }

    img {
        /* height: 100px; */
        width: 100px;
    }
</style>

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
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> --}}

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> --}}

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
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
