@extends('layouts.main')

@section('currentpage')
  <h2 class="lead">User Profile</h2>
@endsection

@section('profile')
  @include('partials.profile', ['myVar'=>$user])
@stop

@section('content')
  <p>
    User Page

    {{ $user[0] }}
  </p>
@endsection
