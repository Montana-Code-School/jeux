@extends('layouts.main')
@section('currentpage')
<h2 class="lead">Settings Page</h2>
@endsection

@section('content')
  <div class ="settings-wrapper panel panel-default">
    <div class="panel-body">
    <form action="" method="POST">
      <div class ="col-md-6">
        <div class ="input-group">
          <div class ="input-group-prepend">
            <span class="input-group-text glyphicon glyphicon-user" id="basic-addon1"></span>
          </div>
          <input type="text" name="username" placeholder="change username" class="form-control">
        </div>
        <div class ="input-group">
          <div class ="input-group-prepend">
            <span class="input-group-text glyphicon " id="basic-addon1"></span>
          </div>
          <input type="text" name="email" placeholder="change email" class="form-control">
        </div>
        <div class ="input-group">
          <div class ="input-group-prepend">
            <span class="input-group-text glyphicon " id="basic-addon1"></span>
          </div>
          <input type="text" name="change password" placeholder="old password" class="form-control">
        </div>
        <div class ="input-group">
          <div class ="input-group-prepend">
            <span class="input-group-text glyphicon " id="basic-addon1"></span>
          </div>
          <input type="text" name="confirm password" placeholder="new password" class="form-control">
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
