<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Cruise-Admin</title>

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- FA вставить без интернета -->
  <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

  <link rel="icon" href="/img/cruise.png">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>




  <style type="text/css">
  body{
   /*    background-image:  url("{{asset('img/')}}");  */
   background-color: #E0FFFF;

 }
</style>
</head>
<body>
  <div id="7" class="container-fluid">

    <div class="row-fluid">

      <div class="col-md-12 ">


        <div class="col-md-2">
          <div class="nav-side-menu">
            <a  href="{{ url('/') }}">


              <div class="brand"><img src="/img/cruise.png" width="100px"><br>Cruise </div>
            </a>

            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

              <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="{{ url('/admin') }}">
                    <i class="fa fa-dashboard fa-lg"></i> Главная
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed">

                  <a href="#"><i class="fa fa-gift fa-lg"></i> Круизы <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                  <li> <a href="{{ url('/admin/cruises_info') }}">Статистика</a></li>
                  <li><a href="{{ url('/admin/add_trip') }}">Добавить</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i> Заказы <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                 <li> <a href="{{ url('/admin/orders') }}">Просмотр</a></li>
               </ul>

               <li data-toggle="collapse" data-target="#lainer" class="collapsed">
                <a href="#"><i class="fa fa-ship fa-lg"></i> Лайнеры <span class="arrow"></span></a>
              </li>  
              <ul class="sub-menu collapse" id="lainer">
               <li> <a href="{{ url('/admin/ships') }}">Просмотр</a></li>
               <li> <a href="{{ url('/admin/add_ship') }}">Добавить</a></li>
             </ul>

             <li data-toggle="collapse" data-target="#new" class="collapsed">
              <a href="#"><i class="fa fa-car fa-lg"></i> Пользователи <span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="new">
              <li> <a href="{{ url('/admin/users') }}">Просмотр</a></li>

            </ul>

            <li>

              &nbsp;&nbsp;  <i class="fa fa-user fa-lg"></i> {{ Auth::user()->First_name }}

            </li>

            <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fa fa-users fa-lg"></i> Выйти
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </ul>
      </div>
    </div>


  </div>