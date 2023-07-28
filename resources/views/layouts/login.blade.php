<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>{{ config('Employee', 'Employee') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color: #f492ab">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="images/m-d-foundation.png" alt="" class="img">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
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
            <div class="mt-5">
                @yield('content')
            </div>
        </div>
</body>

</html>
