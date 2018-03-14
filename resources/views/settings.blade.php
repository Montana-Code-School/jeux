@extends('layouts.one-column')
@section('pageheading')

<h2 class="lead">Settings Page</h2>
@endsection

@section('content')
  <div class ="settings-wrapper panel panel-default">
    <div class="panel-body">
    <form action="" method="POST" action="{{ url('user/update') }}" enctype="multipart/form-data">
      <div class ="col-md-6">
        <div class ="input-group has-feedback">
          <div class ="input-group-prepend">
            <span class="input-group-text glyphicon glyphicon-user" id="basic-addon1"></span>
          </div>
          <label for="username">Change Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="change username" value="{{ $user->username }}">
        </div>
        <div class ="input-group has-feedback">
          <div class ="input-group-prepend">
            <span class="input-group-text glyphicon " id="basic-addon1"></span>
          </div>
          <label for="email">Change Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="change email" value="{{ $user->email }}">
        </div>
      </div>
      <div class="avatar col-md-6">
        <img src="https://loremflickr.com/320/240">
        <input type="file" name="upload-avatar">
      </div>
      <button type="button" class="btn btn-success">Update Settings</button>
    </form>
  </div>
  </div>
@endsection
