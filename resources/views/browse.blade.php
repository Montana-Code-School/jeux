@extends("layouts.main")

@section("pageheading")
  <h2 class="lead">
    Browse
  </h2>
@endsection

@section("content")
  <div class="item-gallery">
    <div class="item-content row">
      <div class="col-sm-8">
        @component('partials.index')
          oops
        @endcomponent
      </div>
  </div>
  <div class="filter">

  </div>
@endsection
