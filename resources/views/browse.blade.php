@extends("layouts.main")

@section("currentpage")
  <h2 class="lead">
    Browse
  </h2>
@endsection

@section("content")
  <div class="game-gallery">
    <div class="game-content row">
      <div class="col-sm-8">
        @component('partials.games')
          oops
        @endcomponent
      </div>
  </div>
  <div class="filter">

  </div>
@endsection
