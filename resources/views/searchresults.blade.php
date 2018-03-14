@extends('layouts.two-column')

@section('pageheading')
<h2 class="lead">Search Results Page</h2>
@endsection

@section('left-column')
    @component('partials.index', ['games'=>$games])
      oops
    @endcomponent
    <br><p>You Searched For: {{$search_games}}</p><br/>
    <br><p class="text-right">More Games...</p><br/>
    <br><p class="text-right">More People...</p><br/>
@endsection

@section('right-column')
  <!-- put filter here -->
@endsection
