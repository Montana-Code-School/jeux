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
  <!-- <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
  <script src="{{ asset('js/jquery.flip.js') }}"></script> -->

  <link rel="stylesheet" href="{{ asset('css/featherlight.css') }}">
  <script src="{{ asset('js/featherlight.js') }}" charset="utf-8"></script>
</head>
<body>
  <div class="menu">
    @component("partials.navbar")
    something went wrong
    @endcomponent
  </div>
  <div class="container">
    @yield("pageheading")
    @yield("userprofile")
    <div class="row">
      <div class="col-sm-8">
        @yield("left-column")
      </div>
      <div class="col-sm-4">
        @yield("right-column")
      </div>
    </div>
  </div>
</body>
</html>
