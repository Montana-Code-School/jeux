@extends('layouts.one-column')

@section('pageheading')
<h2 class="lead">User Profile</h2>
@endsection

@section('userprofile')
  @component('partials.profile')<!--this doesn't exist yet -->
  @endcomponent
@endsection

@section('left-column')
  @component('partials.index')
  @endcomponent
@endsection

<!-- @section('right-column')
  @component(partials.filter)
  @endcomponent
@endsection -->
