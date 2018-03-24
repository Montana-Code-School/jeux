@extends('layouts.two-column')

@section('pageheading')
  <h2 class="lead">My Games</h2>
@endsection

@section('left-column')
    @component('partials.index', ['games' => $data])
      oops
    @endcomponent
@endsection
