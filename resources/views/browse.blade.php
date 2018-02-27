@extends("layouts.main")
@extends("partials.navbar")

@section("currentpage")
  <h2 class="lead">
    Browse
  </h2>
@endsection

@section("content")
  <div class="game-gallery">


      @foreach ($games as $game)
       {{ $game->name }}
      </br>
      </br>
       @if ($games == 'name')
       {{name}}

      @endif
      @endforeach



  </div>
  <div class="filter">

  </div>
@endsection
