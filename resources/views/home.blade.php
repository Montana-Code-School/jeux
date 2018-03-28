@extends('layouts.two-column')

@section('pageheading')
  <h2 class="lead">My Games</h2>
@endsection

@section('left-column')
    @component('partials.index', ['games' => $data])
      oops
    @endcomponent
@endsection

@section('right-column')
  @component('partials.filter')
    Filter Component did not load
  @endcomponent
@endsection
