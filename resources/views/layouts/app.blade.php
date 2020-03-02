<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyFarm') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css?v=14') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!--Template Style -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div style="display: flex; flex-wrap: wrap; flex-direction: row; margin-right: 10px">
                    <a href="{{url('/')}}"><img style="margin-right: 10px" width="35px" height="35px" src="https://www.freeiconspng.com/uploads/green-leaf-icon-10.png">
                    </a>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'EasyFarm') }}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li>
                                <div style="display: flex; flex-wrap: wrap; flex-direction: row">
                                    <img width="35px" height="35px" src="https://cdn0.iconfinder.com/data/icons/web-hosting-27/66/8-512.png">
                                    <a class="nav-link" href="{{ route('crops.monitor') }}" >Monitor Crop</a>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; flex-wrap: wrap; flex-direction: row">
                                    <img width="35px" height="35px" src="https://img.icons8.com/cotton/2x/checklist.png">
                                    <a class="nav-link" href="{{route('review.request')}}">Crop Request</a>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; flex-wrap: wrap; flex-direction: row">
                                    <img width="35px" height="35px" src="https://images.vexels.com/media/users/3/144182/isolated/preview/77294bc31aa3c4736a0c616cd9c7cb19-file-medical-record-by-vexels.png">
                                    <a class="nav-link" href="{{route('crops.record')}}">Monitoring Record</a>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; flex-wrap: wrap; flex-direction: row">
                                    <img width="35px" height="35px" src="https://icons-for-free.com/iconfiles/png/512/document+paper+pen+sign+signature+icon-1320186098757315353.png">
                                    <a class="nav-link" href="{{route('accepted.request')}}">Accepted Request</a>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; flex-wrap: wrap; flex-direction: row">
                                    <img width="35px" height="35px" src="https://cdn1.iconfinder.com/data/icons/weather-forecast-meteorology-color-1/128/weather-partly-cloudy-512.png">
                                    <a class="nav-link" href="{{url('/weather-info')}}">Weather Forecasts</a>
                                    </div>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
