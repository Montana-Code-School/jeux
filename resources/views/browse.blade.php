@extends("layouts.main")

@section("currentpage")
  <h2 class="lead">
    Browse
  </h2>
@endsection

@section("content")
  <div class="game-gallery">

    <ul>
      @foreach ($games as $game)
        <li>{{ $game->name }}</li>
      @endforeach
    </ul>


  </div>
  <div class="filter">

  </div>
@endsection
