<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SpotLess') }}</title>
    <meta name="description" content="Een web applicatie die detecteerd of de prullenbakken van Katwijk vol zijn.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins|Roboto" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <nav>
      <div class="navbar" id="navbar">
       <a href="/home">SpotLess</a>
       <a href="/buckets">Lijst</a>
       @if (Auth::user()->isAdmin)
         <a href="/settings">Instellingen</a>
       @endif
       <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           Uitloggen
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>
       <a href="javascript:void(0);" class="icon" onclick="dropNav()">&#9776;</a>
      </div>
    </nav>
    <script>
      function dropNav() {
          var x = document.getElementById("navbar");
          if (x.className === "navbar") {
              x.className += " responsive";
          } else {
              x.className = "navbar";
          }
      }
    </script>

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </div>
</body>
</html>
