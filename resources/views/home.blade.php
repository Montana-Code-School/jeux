@extends('layouts.main')
@section('pageheading')
  <h2 class="lead">My Games</h2>
@endsection
@section('content')
<div class="game-popup row">
  <div class="col-sm-8">
    @component('partials.index')
      oops
    @endcomponent
  </div>
  <div class="col-sm-4 filter-container">
    Right side
    @section('filtercontainer')
    @endsection
  </div>
</div>
@endsection
