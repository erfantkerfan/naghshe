<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/gif">

    <style type="text/css">
        @font-face {
            font-family:'bmitra';
            src: url( {{asset('fonts/bmitrabold.ttf') }} );
        }
        @font-face {
            font-family: 'IranNastaliq';
            src: url( {{ asset('fonts/IranNastaliq.eot') }} ) format('eot'),
            url( {{ asset('fonts/IranNastaliq.ttf') }} ) format('truetype'),
            url( {{ asset('fonts/IranNastaliq.woff') }} ) format('woff');
        }
        body, html {
            height: 100%;
            margin: 0;
        }
        .fa {
            padding: 0px;
            font-size: 30px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            margin: 10px 10px;
            border-radius: 50%;
        }
        .fa:hover {
            opacity: 0.7;
        }
        .fa-telegram {
            background: white;
            color: #55ACEE;
        }
        .fa-twitter {
            background: white;
            color: #55ACEE;
        }
        .fa-yahoo {
            background: white;
            color: #430297;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background: grey;
            color: white;
            text-align: center;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .links > a {
            font-weight: 900;
            color: #ffffff;
            text-decoration: none;
        }
        .title {
            font-size: 84px;
        }
        li.different{
            border:none;
            position: relative;
        }
        li.different:hover{
            border: none;
        }
        li:hover {
            border-bottom: 5px solid #FFFFFF;
        }
        .different::after{
            content: '';
            position: absolute;
            width: 0px;
            height: 5px;
            left: 0%;
            bottom:0;
            background-color: darkblue;
            transition: all ease-in-out .2s;
        }
        .different:hover::after{
            width: 100%;
            left: 0;
        }
    </style>

</head>
<body>
<div id="app" style="font-family:'bmitra'" >
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'IranNastaliq'">
                <img src="{{ asset('img/icon.png') }}" style="width: 30%">
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav m-auto">
                    پروژه های
                    دانشجویان عمران دانشگاه شهید عباسپور
                </ul>

                <!-- Right Side Of Navbar -->

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown different">
                        <a class="nav-link" href="{{ route('about') }}" style="text-decoration: none">درباره ما</a>
                    </li>
                    <li class="nav-item dropdown different">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                           style="color: #f28787;text-decoration: none">
                            دسته بندی ها
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">

                            @foreach( \App\Category::all() as $category)
                                <a class="dropdown-item" href="{{route('category',['id'=>$category->id])}}">
                                    {{$category->name}}
                                </a>
                            @endforeach

                        </div>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item different">
                            <a class="nav-link" href="{{ route('login') }}" style="text-decoration: none">ورود</a>
                        </li>
                    @else
                        <li class="nav-item dropdown different">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style="text-decoration: none">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="#">
                                    آخرین ورود شما:  
                                    {{str_after(\App\User::Find(1)->last_login,' ').'  '}}
                                    {{str_replace('-','/',str_before(\App\User::Find(1)->last_login,' '))}}
                                </a>

                                @if(\App\User::where('id','=','2')->count()==1)
                                    <a class="dropdown-item" href="{{route('assistant')}}">
                                        غیرفعال کردن دستیار
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        آخرین ورود دستیار:  
                                        {{str_after(\App\User::Find(2)->last_login,' ').'  '}}
                                        {{str_replace('-','/',str_before(\App\User::Find(2)->last_login,' '))}}
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{route('assistant')}}">
                                        فعال کردن دستیار
                                    </a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}" style="color: red;text-decoration: none"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    خروج
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
</div>

<br>

@yield('content')
</body>
</html>
