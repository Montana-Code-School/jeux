@extends('layouts.landing')
@section('content')

 <div id="title-sketch-holder">
 </div>

 <div class="title-container">
   <h1>b<sup>3</sup></h1>
 </div>

 <script>
 setInterval(function(){
   var hue = ((Math.sin(performance.now()/500)+1)/2) * 360;
   var value = "hsl("+hue+", 100%, 50%)"
   $(".title-container h1").css("color", value);
 }, 30);

 </script>

<script type='text/javascript' src="{{ asset('js/title-sketch.js') }}"></script>
@endsection
