<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

  <div class="filter">
    <div id="title">
      <h2 class="text-center">Options</h2>
    </div>
    <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#age">Age</button>
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

    <div for>
    <button data-toggle="collapse" class="btn btn-primary btn-block" data-target="#players">Players</button>
    <div id="players" class="collapse">
      <ul>
        <li><input class="filterCheck" type="checkbox">1 player</input></li>
        <li><input class="filterCheck" type="checkbox">2 to 4 players</input></li>
        <li><input class="filterCheck" type="checkbox">3 to 6 players</input></li>
        <li><input class="filterCheck" type="checkbox">7+ players</input></li>
      </ul>
    </div>
  </div>

    <button data-toggle="collapse" class="btn btn-primary btn-block" data-target="#time">Time</button>
    <div id="time" class="collapse">
      <ul>
        <li><input class="filterCheck" type="checkbox">Quick 5 to 20 Minutes</input></li>
        <li><input class="filterCheck" type="checkbox">Medium 30 to 60 Minutes </input></li>
        <li><input class="filterCheck" type="checkbox">Long 60 to 120 Minutes</input></li>
        <li><input class="filterCheck" type="checkbox">Commitment 120++ </input></li>
      </ul>
    </div>

    <button data-toggle="collapse" class="btn btn-primary btn-block" data-target="#genres">Genres</button>
    <div id="genres" class="collapse">
      <ul>
        <li><input class="filterCheck" type="checkbox">Children</input></li>
        <li><input class="filterCheck" type="checkbox">Fantasy</input></li>
        <li><input class="filterCheck" type="checkbox">Murder Mystery</input></li>
        <li><input class="filterCheck" type="checkbox">Horror</input></li>
        <li><input class="filterCheck" type="checkbox">Word</input></li>
        <li><input class="filterCheck" type="checkbox">Party</input></li>
      </ul>
    </div>

    <!--TODO:: create the form with elements that have to be filled in
          and that no information is a duplicate.
        options to add an expansion-->
    <button data-toggle="collapse" class="btn btn-primary btn-block" data-target="#addGame">Add Game</button>
    <div id="addGame" class="collapse">
      <label for="name">Name</label>
      <input id="name" class="filterCheck" type="text" placeholder="Name"></input>
      <label for="year">Year</label>
      <input id = "year"  class="filterCheck" type="text" placeholder="Publish Year"></input>
      <label for="miplayers">Min Players</label>
      <input id = "miplayers" class="filterCheck" type="text" placeholder="Min Players"></input>
      <label for="mxplayers">Max Players</label>
      <input id = "mxplayers" class="filterCheck" type="text" placeholder="Max Players"></input>
      <label for="mipltime">Min Playtime</label>
      <input id = "mipltime" class="filterCheck" type="text" placeholder="Min Play Time"></input>
      <label for="mxpltime">Max Playtime</label>
      <input id = "mxpltime" class="filterCheck" type="text" placeholder="Max Play Time"></input>
      <input id = "" class="filterCheck" type="text" placeholder="Description"></input>
      <input class="filterCheck" type="toggle"></input>
    </div>

  </div>


</body>
</html>
