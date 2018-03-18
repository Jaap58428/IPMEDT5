<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'SpotLess') }}</title>

    <!-- Styles -->
    <link href="css/welcome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins|Roboto" rel="stylesheet">
</head>
<body>
  <div class="welcome-wrapper">
    <div class="welcome-logo">
      <img src="img/logo_katwijk.png" alt="The logo of Gemeente Katwijk">
    </div>
    <div class="welcome-title">
      <h1>SpotLess</h1>
    </div>
    <div class="welcome-login">
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/home') }}">Home</a>
        @else
          @include('auth.login')
        @endauth
      @endif
    </div>
  </div>
</body>
</html>
