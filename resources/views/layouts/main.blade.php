<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title></title>
    <script src="js/bootstrap.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="menu">
      @component("partials.navbar")
        something went wrong
      @endcomponent
    </div>
    <div class="container">
      <div class="currentPage">

      </div>
      @yield("userinfo")
      <div class="content">
        <div class="boardGames">
          @yield("games")
        </div>
        <div class="filter">

        </div>
      </div>
    </div>

  </body>
</html>
