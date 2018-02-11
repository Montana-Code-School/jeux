<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- First Column: CHECK -->
      <div class="col-md-4" >
        <ul class="nav navbar-nav">
          <li>
            <a href="#"><h1>Jeux</h1></a>
          </li>
          <li>
            <a href="#">My Games</a>
          </li>
          <li>
            <a href="#">Browse</a>
          </li>
        </ul>
      </div>
      <!-- Second Column: CHECK -->
      <div class="col-md-4">
        <form class="navbar-form text-center" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
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
                @component("partials.friends")
                @endcomponent
              </div>
            </li>
            <!-- NOTIFICATIONS SECTION -->
            <li>
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                </button>
                @component("partials.notifications")
                @endcomponent
              </div>
            </li>
            <!-- USER SECTION -->
            <li>
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <!-- TODO: insert user avatar -->
                  Username
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Settings</a></li>
                  <li><a href="#">Log Out</a></li>
                </ul>
              </div>
            </li>
          </ul>
      </div>
    </div>
  </div>
</nav>
