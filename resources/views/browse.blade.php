@extends("layouts.main")
@extends("partials.navbar")

@section("currentpage")
  <h2 class="lead">
    Browse Games
  </h2>
@endsection

@section("content")
  <div class="game-gallery">

    @show
     {{ $games }}


  </div>
  <div class="filter">

  </div>
