@extends('layouts.main')
@section('currentpage')
<h2 class="lead">User Profile</h2>
@endsection
@section('userprofile')
  @component('partials.profile')
  @endcomponent
@endsection
@section('content')
  <p>
    User Page
  </p>
@endsection
