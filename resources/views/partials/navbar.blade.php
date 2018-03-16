<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- First Column: CHECK -->
      <div class="col-md-4" >
        <ul class="nav navbar-nav">
          <li>
            <a href="{{ route('landing') }}"><h1>Jeux</h1></a>
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
            <input type="text" name="search-games" class="form-control" placeholder="Search for Games">
          </div>
          <button type="submit" class="btn btn-info" value="Submit">Submit</button>
        </form>
      </div>
      <!-- Third Column: CHECK -->
      <div class="col-md-4">
          <ul class="nav navbar-nav navbar-right">
            <!-- FRIENDS SECTION -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
              @component("partials.dropdown-list",["items"=>$friend_items])
              @slot("list_name")
                Friends
              @endslot
              @endcomponent
            </li>
            <!-- NOTIFICATIONS SECTION -->
            <li class="dropdown notifications-content">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></span><span class="caret"></span></a>
                @component("partials.dropdown-list",["items"=>$notification_items])
                @slot("list_name")
                  Notifications
                @endslot
                @endcomponent
            </li>
            <!-- USER SECTION -->
            <li class="dropdown">
              @auth
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Username</span><span class="caret"></span></a>
                  <!-- TODO: insert user avatar -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                  <li><a href="#">Profile</a></li>
                  <li><a href="{{ route('settings')}}">Settings</a></li>
                  <li><a href="{{ route('logout')}}">Logout</a></li>
                </ul>
              @endauth
              @guest
                  <a class="dropdown-toggle" href="{{ route('login') }}">Login</a>
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
