<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cruise</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- FA вставить без интернета -->
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

    <link rel="icon" href="/img/cruise.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <style type="text/css">
    body{

       background-color: #E0FFFF;
   }
</style>
</head>

<body>
  <div id="app">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Главная
                </a>
                <a class="navbar-brand" href="{{ url('/cruises') }}">
                    Круизы
                </a>
                <a class="navbar-brand" href="{{ url('/ships') }}">
                    Лайнеры
                </a>
                <a class="navbar-brand" href="{{ url('/info') }}">
                    Справка
                </a>
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    Админка
                </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="navbar-brand" href="{{ route('login') }}">Вход</a></li>
                    <li><a class="navbar-brand" href="{{ route('register') }}">Регистрация</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->First_name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                         <li>
                            <a href="/profile/{{ Auth::user()->email }}">
                                Кабинет
                            </a>


                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endguest
        </ul>
    </div>
</div>
</nav>

</div>