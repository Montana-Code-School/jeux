<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="{{ asset('js/bootstrap.js') }}" charset="utf-8"></script>
  </head>
  <body>
    <!-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif -->
    <div class="menu">
      @component("partials.navbar")
        something went wrong
      @endcomponent
    </div>
    <div class="container">
      @yield("currentpage")
      @yield("userprofile")
      @yield("content")
      <!-- <div class="currentPage">

      </div>
      @yield("userinfo")
      <div class="content">
        <div class="boardGames">
          @yield("games")
        </div>
        <div class="filter">

        </div> -->
      </div>
    </div>

  </body>
</html>
