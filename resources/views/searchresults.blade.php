@extends('layouts.main')
@section('currentpage')
<h2 class="lead">Search Results Page</h2>
@endsection

@section('content')
<div class="game-content row">
  <div class="col-sm-8">
    @component('partials.games')
      oops
    @endcomponent
  </div>
  <div class="col-sm-4 filter-container">
    Right side
    @section('filtercontainer')
    @endsection
  </div>
</div>

<br><p class="text-right">More Games...</p><br/>

<div class="people-content row">
  <div class="col-sm-8">
    @component('partials.people')
      oops
    @endcomponent
  </div>
</div>

<br><p class="text-right">More People...</p><br/>

@endsection
