<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--Brand and toggle get grouped for better mobile display-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('landing') }}">b<sup>3</sup></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- First Column: CHECK -->
      @auth
      <div class="col-md-4">
        <ul class="nav navbar-nav">
          <li {{ (Request::is('home') ? 'class=active' : '') }}>
            <a href="{{ route('home') }}">My Games<span class="sr-only">(current)</span></a>
          </li>
          <li {{ (Request::is('browse') ? 'class=active' : '') }}>
            <a href="{{ route('browse') }}">Browse<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
      <!-- Second Column: CHECK -->
      <div class="col-md-4">
        <form class="navbar-form navbar-left" action="{{route('searchresults')}}" method="get" role="search">
          <div class="form-group">
            <input type="text" name="search-games" dusk="search-games-input" class="form-control" placeholder="Search for Games">
          </div>
          <button type="submit" dusk="search-games-submit" class="btn btn-info" value="Submit">Submit</button>
        </form>
      </div>
      @endauth
      <!-- Third Column: CHECK -->
      <div class="col-md-offset-1" "col-md-3">
        <ul class="nav navbar-nav navbar-right">
          <!-- FRIENDS SECTION -->
        @auth
          <li dusk="friends-dropdown-list" class="dropdown">
            <a href="#" dusk="friends-dropdown-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
            @component("partials.dropdown-list",["items"=>$friend_items])
            @slot("list_name")
              Friends
            @endslot
            @endcomponent
          </li>
          <!-- NOTIFICATIONS SECTION -->
          <li dusk="dropdown-notify-content" class="dropdown notifications-content">
              <a href="#" dusk="dropdown-notify-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></span><span class="caret"></span></a>
              @component("partials.dropdown-list",["items"=>$notification_items])
              @slot("list_name")
                Notifications
              @endslot
              @endcomponent
          </li>
        @endauth
          <!-- USER SECTION -->
        @guest
          <li><a dusk="guest-dropdown-toggle" class="dropdown-toggle" href="{{ route('register') }}">Register</a></li>
        @endguest
          <li dusk="user-dropdown" class="dropdown">
            @auth
              <a href="#" dusk="user-dropdown-toggle" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>{{ Auth::user()->username }}</span><span class="caret"></span></a>
                <!-- TODO: insert user avatar -->
              <ul dusk="user-dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenu3">
                <li><a dusk="user-profile" href="{{ route('profile',['username'=>Auth::user()->username])}}">Profile</a></li>
                <li><a dusk="user-settings" href="{{ route('settings')}}">Settings</a></li>
                <li><a dusk="user-logout" href="{{ route('logout')}}">Logout</a></li>
              </ul>
            @endauth
            @guest
                <a dusk="guest-login" class="dropdown-toggle" href="{{ route('login') }}">Login</a>
            @endguest
          </li>
        </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script type="text/javascript">
  //ajax calls for search functions
</script>
