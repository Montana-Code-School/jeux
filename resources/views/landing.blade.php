@extends('layouts.landing')
@section('content')

<div id="title-sketch-holder">
</div>

<div class="title-container">
  <h1><a href="{{ url('/login') }}">b<sup>3</sup></a></h1>
</div>

<script>
setInterval(function(){
  var hue = ((Math.sin(performance.now()/500)+1)/2) * 360;
  var value = "hsl("+hue+", 50%, 50%)"
  $(".title-container h1 a").css("color", value);
}, 30);
</script>

<script type='text/javascript' src="{{ asset('js/title-sketch.js') }}"></script>
@endsection
