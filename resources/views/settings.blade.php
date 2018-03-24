@extends('layouts.one-column')
@section('pageheading')
<h2 class="lead">Settings Page</h2>
@endsection

@section('content')
  <div class ="settings-wrapper panel panel-default">
    <div class="panel-body">
    {!! Form::model(Auth::user(), ['action' => ['UserController@update', '$user' => Auth::user()], 'files' => true]) !!}
    {!! Form::token(); !!}

    <div class ="col-md-6">
      <div class ="input-group has-feedback">
        <div class ="input-group-prepend">
          <span class="input-group-text glyphicon glyphicon-user" id="basic-addon1"></span>
        </div>
        {!! Form::label('username', 'Username'); !!}
        {!! Form::text('username'); !!}
      </div>
      <div class ="input-group has-feedback">
        <div class ="input-group-prepend">
          <span class="input-group-text glyphicon " id="basic-addon1"></span>
        </div>
        {!! Form::label('email', 'Email'); !!}
        {!! Form::text('email'); !!}
      </div>
      <div class ="input-group has-feedback">
        <div class ="input-group-prepend">
          <span class="input-group-text glyphicon " id="basic-addon1"></span>
        </div>
        {!! Form::label('name', 'Name'); !!}
        {!! Form::text('name'); !!}
      </div>
    </div>
    <div class="input-group has-feedback">
      <div class="input-group-prepend">
        <div class="avatar col-md-6">
          {!! Form::label('image', 'Profile Picture'); !!}
          {!! Form::file('image'); !!}
        </div>
      </div>
    </div>
    <div class="input-group">
      <div class="input-group-prepend">
        {!! Form::button('Update Settings', ['type' => 'submit', 'class' => "btn btn-info"]) !!}
      </div>
    </div>
    
    

    {!! Form::close() !!}
  </div>
  </div>
@endsection
