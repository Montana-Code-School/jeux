@extends('layouts.one-column')
@section('pageheading')
<h2 class="lead">Settings</h2>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class ="settings-wrapper panel panel-default">
        <div class="panel-body">
          {!! Form::model(Auth::user(), ['action' => ['UserController@update', '$user' => Auth::user()], 'files' => true, 'class' => 'form-horizontal']) !!}
          {!! Form::token(); !!}
          <div class="container-fluid">
            <div class="row">
              <!--NAME  CHECK-->
              <div class="form-group">
                <div class="col-md-10">
                <label for="name" class="col-md-4 control-label">{!! Form::label('name', 'Change Name', ['dusk' => 'update-name-label']); !!}</label>
                  <div class ="input-group has-feedback">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                    {!! Form::text('name', null, array('class' => 'form-control', 'dusk' => 'update-name-input')); !!}
                  </div>
                </div>
              </div>
              <!--USERNAME CHECK -->
              <div class="form-group">
                <div class="col-md-10">
                <label for="username" class="col-md-4 control-label">{!! Form::label('username', 'Change Username', ['dusk' => 'update-username-label']); !!}</label>
                  <div class ="input-group has-feedback">
                    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-user"></span></span>
                    {!! Form::text('username', null, array('class' => 'form-control', 'dusk' => 'update-username-input')); !!}
                  </div>
                </div>
              </div>
              <!--EMAIL  CHECK-->
              <div class="form-group">
                <div class="col-md-10">
                <label for="username" class="col-md-4 control-label">{!! Form::label('email', 'Change Email', ['dusk' => 'update-email-label']); !!}</label>
                  <div class ="input-group has-feedback">
                    <span class="input-group-addon" id="basic-addon3"><span class="glyphicon glyphicon-envelope"></span></span>
                    {!! Form::text('email', null, array('class' => 'form-control', 'dusk' => 'update-email-input')); !!}
                  </div>
                </div>
              </div>
              <!--CHANGE PASSWORD CHECK-->
              <div class="form-group">
                <div class="col-md-10">
                <label for="password" class="col-md-4 control-label">{!! Form::label('change', 'Change Password', ['dusk' => 'update-change-label']); !!}</label>
                  <div class ="input-group has-feedback">
                    <span class="input-group-addon" id="basic-addon4"><span class="glyphicon glyphicon-asterisk"></span></span>
                    {!! Form::password('password', array('class' => 'form-control', 'dusk' => 'update-change-label')); !!}
                  </div>
                </div>
              </div>
              <!--CONFIRM PASSWORD CHECK-->
              <div class="form-group">
                <div class="col-md-10">
                <label for="password" class="col-md-4 control-label">{!! Form::label('confirm', 'Confirm Password', ['dusk' => 'update-confirm-label']); !!}</label>
                  <div class ="input-group has-feedback">
                    <span class="input-group-addon" id="basic-addon5"><span class="glyphicon glyphicon-asterisk"></span></span>
                     {!! Form::password('password', array('class' => 'form-control', 'dusk' => 'update-confirm-label')); !!}
                  </div>
                </div>
              </div>
              <!--PROFILE PICTURE CHECK-->
              <div class="form-group">
                <div class="col-md-10">
                <label for="picture" class="col-md-4 control-label">{!! Form::label('image', 'Profile Picture', ['dusk' => 'update-profile-pic-label']); !!}</label>
                  <div class="input-group has-feedback">
                    <div class="input-group-prepend">
                      <div class="avatar">
                        {!! Form::file('image', ['dusk' => 'update-profile-pic']); !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--UPDATE SETTINGS -->
              <div class="form-group">
                <div class="col-md-offset-9 col-md-3">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        {!! Form::button('Update Settings', ['type' => 'submit', 'dusk' => 'update-button', 'class' => "btn btn-info"]) !!}
                      </div>
                  </div> <!-- /.input-group -->
                </div>
              </div> <!-- /.form-group -->
            </div> <!-- /.row -->
          </div> <!-- /.container-fluid -->
          {!! Form::close() !!}
          </form> <!-- /.form-horizontal -->
        </div> <!-- /.panel-body -->
      </div> <!-- /.settings-wrapper panel panel-default -->
    </div> <!-- /.col-md-8 col-md-offset-2 -->
  </div> <!-- /.row -->
</div> <!-- /.container -->

@endsection
