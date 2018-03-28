<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <link href="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.min.css" rel="stylesheet">
  <script src="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.js"></script>
  <script src="https://unpkg.com/wnumb@1.1.0"></script>

  <form action="{{ route('browse') }}" method="GET">
    <div class="filter">
      <div id="title">
        <h2 class="text-center" style="color:orange; margin-top: 0px;">Options</h2>
      </div>
    </br>
    <form>
      <ul id="ftchoice" style=""></ul>
    </form>
  </br>
  <p>Age</p>
  <div id="slider"></div>
  <script>
  var num = wNumb({decimals: 0})
  noUiSlider.create(slider, {
    animationDuration: 300,
    start: [20, 80],
    connect: true,
    tooltips: [ num, num ],
    range: {
      'min': 1,
      'max': 100
    }
  });
</script>
</br>

<!--Use flash & session
Use Slider
Min and Max
-->

<p>Players</p>
<div id="sliderPlay"></div>
<script>
var num = wNumb({decimals: 0})
noUiSlider.create(sliderPlay, {
  animationDuration: 300,
  start: [2, 4],
  connect: true,
  // tooltips: [ num, num ],
  range: {
    'min': 1,
    'max': 20
  }
});

</script>
</br>
</br>
<!--Play time button  -->
<button type="button" data-toggle="collapse" class="btn btn-info btn-block" style="color:black" data-target="#time">Time
  <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
  <div id="time" class="collapse">
  </br>
  <ul>
    <li><input id="ft20M" class="filterCheck" type="checkbox">Quick 5 to 20 Minutes</input></li>
    <li><input id="ft60M" class="filterCheck" type="checkbox">Medium 30 to 60 Minutes </input></li>
    <li><input id="ft120M" class="filterCheck" type="checkbox">Long 60 to 120 Minutes</input></li>
    <li><input id="ft+M" class="filterCheck" type="checkbox">Commitment 120++ </input></li>
  </ul>
</div>
</br>
<!--Genre button  -->
<button type="button" data-toggle="collapse" class="btn btn-info btn-block" style="color:black" data-target="#genres">Genres
  <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></button>
  <div id="genres" class="collapse">
  </br>
  <ul>
    <li><input id="ftChild" class="filterCheck" type="checkbox">Children</input></li>
    <li><input id="ftFan" class="filterCheck" type="checkbox">Fantasy</input></li>
    <li><input id="ftMM" class="filterCheck" type="checkbox">Murder Mystery</input></li>
    <li><input id="ftH" class="filterCheck" type="checkbox">Horror</input></li>
    <li><input id="ftW" class="filterCheck" type="checkbox">Word</input></li>
    <li><input id="ftP" class="filterCheck" type="checkbox">Party</input></li>
  </ul>
</div>
</br>

<!--TODO:: create the form with elements that have to be filled in
and that no information is a duplicate.
options to add an expansion-->
<!--Add a game button  -->
<button type="button" data-toggle="collapse" class="btn btn-info btn-block" style="color:black" data-target="#addGame">Add Game
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
</br>
<div class="row">
  <button class="btn btn-info btn-md pull-right" type="submit">Submit</button>
</div>
</form>
</div>
</br>
    <input type="submit" class="btn btn-info btn-block">
</div>
</form>

<script>
$('.filterCheck').click(function() {
  var filterText = "<li id=" + this.id + ">" + this.nextSibling.data + "</li>";
  if(this.checked) {
    $("#ftchoice").append(filterText);
  } else {
    $("#ftchoice").find("#" + this.id).remove();
  }

  //slider.on('update', function(){
  //  var handles = handles()
//});

});
</script>

</body>
</html>
