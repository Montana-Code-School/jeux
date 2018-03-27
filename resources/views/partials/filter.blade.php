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
        <h2 class="text-center">Options</h2>
      </br>
      <form>
        <input type="text" placeholder="Filter..."></input>
        <input type="submit">
        <ul id="ftchoice" style=""></ul>
        <ul id="input-format" style-""></ul>
      </form>
    </br>
  </br>
  <div id="slider">
    <script>
    var num = wNumb({decimals: 0})
    noUiSlider.create(slider, {
      start: [20, 80],
      connect: true,
      tooltips:false,
      range: {
        'min': 0,
        'max': 100
      }

    });
  </script>
</div>
</br>
</br>
</br>

  <div id="sliderPlay"></div>
    <script>
    var num = wNumb({decimals: 0})
    noUiSlider.create(sliderPlay, {
      start: [2, 4],
      connect: true,
      tooltips: [ num, num ],
      pips: {
        mode:'steps',
        density: 1,
        format: num
      },
      range: {
        'min': 1,
        'max': 20
      }

    });
  </script>
</br>
</br>
<button data-toggle="collapse" class="btn btn-primary btn-block" data-target="#time">Time
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
<button data-toggle="collapse" class="btn btn-primary btn-block" data-target="#genres">Genres
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
<button data-toggle="collapse" class="btn btn-primary btn-block" data-target="#addGame">Add Game
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
  <button class="btn btn-primary btn-lg pull-right" type="submit">Submit</button>
</div>
</form>
</div>
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
});

var inputFormat = document.getElementById('input-format');

sliderFormat.noUiSlider.on('update', function( values, handle ) {
	inputFormat.value = values[handle];
});

inputFormat.addEventListener('change', function(){
	sliderFormat.noUiSlider.set(this.value);
});
</script>

</body>
</html>
