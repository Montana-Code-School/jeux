@extends('layouts.two-column')

@section('pageheading')
<h2 class="lead"></h2>
@endsection

@section('userprofile')
  @component('partials.profile', ['user' => $data['userProfile']])<!--this doesn't exist yet -->
  @endcomponent
@endsection


@section('left-column')
  @component('partials.index', ['games' => $data['games']])
  @endcomponent
@endsection

@section('right-column')

@endsection
