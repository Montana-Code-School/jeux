<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <div class="filter">
    <div id="title">
      <h2 class="text-center" style="color:orange; margin-top: 0px;">Options</h2>
    </br>
    <form>
      <input type="text" placeholder="Filter..."></input>
    </form>
  </br>
</br>
    </div>
    <button type="button" class="btn btn-info btn-block" style="color:black" data-toggle="collapse" data-target="#age">Age
    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
    <div id="age" class="collapse">
    </br>
        <ul>
          <li><input class="filterCheck" type="checkbox">Everyone</input></li>
          <li><input class="filterCheck" type="checkbox">3+</input></li>
          <li><input class="filterCheck" type="checkbox">8+</input></li>
          <li><input class="filterCheck" type="checkbox">12+</input></li>
          <li><input class="filterCheck" type="checkbox">15+</input></li>
          <li><input class="filterCheck" type="checkbox">18+</input></li>
        </ul>
    </div>
    </br>
    <div for>
    <button data-toggle="collapse" class="btn btn-info btn-block" style="color:black" data-target="#players">Players
    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
    <div id="players" class="collapse">
    </br>
      <ul>
        <li><input class="filterCheck" type="checkbox">1 player</input></li>
        <li><input class="filterCheck" type="checkbox">2 to 4 players</input></li>
        <li><input class="filterCheck" type="checkbox">3 to 6 players</input></li>
        <li><input class="filterCheck" type="checkbox">7+ players</input></li>
      </ul>
    </div>
  </div>
  </br>
    <button data-toggle="collapse" class="btn btn-info btn-block" style="color:black" data-target="#time">Time
    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
    <div id="time" class="collapse">
    </br>
      <ul>
        <li><input class="filterCheck" type="checkbox">Quick 5 to 20 Minutes</input></li>
        <li><input class="filterCheck" type="checkbox">Medium 30 to 60 Minutes </input></li>
        <li><input class="filterCheck" type="checkbox">Long 60 to 120 Minutes</input></li>
        <li><input class="filterCheck" type="checkbox">Commitment 120++ </input></li>
      </ul>
    </div>
    </br>
    <button data-toggle="collapse" class="btn btn-info btn-block" style="color:black" data-target="#genres">Genres
    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
    <div id="genres" class="collapse">
    </br>
      <ul>
        <li><input class="filterCheck" type="checkbox">Children</input></li>
        <li><input class="filterCheck" type="checkbox">Fantasy</input></li>
        <li><input class="filterCheck" type="checkbox">Murder Mystery</input></li>
        <li><input class="filterCheck" type="checkbox">Horror</input></li>
        <li><input class="filterCheck" type="checkbox">Word</input></li>
        <li><input class="filterCheck" type="checkbox">Party</input></li>
      </ul>
    </div>
    </br>

    <!--TODO:: create the form with elements that have to be filled in
          and that no information is a duplicate.
        options to add an expansion-->
    <button data-toggle="collapse" class="btn btn-info btn-block" style="color:black" data-target="#addGame">Add Game
    <span class="glyphicon glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
    <div id="addGame" class="collapse">
    </br>
    <p class="text-center">
      Don't see your game? Add one!
    </p>
  </br>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="gameform col-xs-2" for="name">Name:</label>
          <div class="col-xs-8">
            <input id="name" type="text" class="form-control" placeholder="name"></input>
          </div>
        </div>
        <div class="form-group">
          <label class="gameform col-xs-2" for="year">Year:</label>
          <div class="col-xs-8">
            <input id="year" type="text" class="form-control" placeholder="Publish Year"></input>
          </div>
        </div>
        <div class="form-group">
          <label class="gameform col-xs-2" for="minPly">Min Players:</label>
          <div class="col-xs-8">
            <input id="minPly" type="text" class="form-control" placeholder="Minimum Players"></input>
          </div>
        </div>
        <div class="form-group">
          <label class="gameform col-xs-2" for="mxPly">Max Players:</label>
          <div class="col-xs-8">
            <input id="mxPly" type="text" class="form-control" placeholder="Maximum Players"></input>
          </div>
        </div>
        <div class="form-group">
          <label class="gameform col-xs-2" for="minPT">Min Play Time:</label>
          <div class="col-xs-8">
            <input id="minPT" type="text" class="form-control" placeholder="Minimum Play Time"></input>
          </div>
        </div>
        <div class="form-group">
          <label class="gameform col-xs-2" for="mxPT">Max Play Time:</label>
          <div class="col-xs-8">
            <input id="mxPT" type="text" class="form-control" placeholder="Maximum Play Time"></input>
          </div>
        </div>
        <div class="form-group">
          <label class="gameform col-xs-3" for="des">Description:</label>
          <div class="col-xs-8">
            <textarea rows="4" id="des" type="text" class="form-control" placeholder="Description of the Game"></textarea>
          </div>
        </div>
        <label class="switch"></label>
          <input type="checkbox" />
            <span class="slider round"></span>
      </br>
        <div class="row">
          <button class="btn btn-info btn-lg pull-right" type="submit">Submit</button>
        </div>


      </form>
    </div>

  </div>


</body>
</html>
