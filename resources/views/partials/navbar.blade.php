<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- First Column: CHECK -->
      <div class="col-md-4" >
        <ul class="nav navbar-nav">
          <li>
            <a href="{{ route('logout') }}"><h1>Jeux</h1></a>
          </li>
          <li {{ (Request::is('home') ? 'class=active' : '') }}>
            <a href="{{ route('home') }}">My Games</a>
          </li>
          <li {{ (Request::is('browse') ? 'class=active' : '') }}>
            <a href="{{ route('browse') }}">Browse</a>
          </li>
        </ul>
      </div>
      <!-- Second Column: CHECK -->
      <div class="col-md-4">
        <form class="navbar-form text-center" action="{{route('searchresults')}}" method="get" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-info" value="Submit">
        </form>
      </div>
      <!-- Third Column: CHECK -->
      <div class="col-md-4">
          <ul class="icons pull-right">
            <!-- FRIENDS SECTION -->
            <li>
              <div class="dropdown friends-content">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </button>
                @component("partials.dropdown-list")
                @endcomponent
              </div>
            </li>
            <!-- NOTIFICATIONS SECTION -->
            <li>
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                </button>
                @component("partials.dropdown-list")
                @endcomponent
              </div>
            </li>
            <!-- USER SECTION -->
            <li>
              @auth
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <!-- TODO: insert user avatar -->
                    Username
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                    <li><a href="#">Profile</a></li>
                    <li><a href="{{ route('settings')}}">Settings</a></li>
                    <li><a href="{{ route('logout')}}">Logout</a></li>
                  </ul>
                </div>
              @endauth
              @guest
                  <a class="btn btn-default" href="{{ route('login') }}">Login</a>
              @endguest
            </li>
          </ul>
      </div>
    </div>
  </div>
</nav>

<script type="text/javascript">
  //ajax calls for search functions
</script>
