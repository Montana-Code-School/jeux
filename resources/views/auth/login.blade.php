@extends('layouts.one-column')
@section('pageheading')
<h2 class="lead">Login</h2>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
            <!--EMAIL -->
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                </div>
            </div>
            <!-- PASSWORD -->
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                </div>
            </div>
            <!--CHECKBOX -->
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                      <input dusk="remember-me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>
            </div>
            <!--FORGOT YOUR PASSWORD -->
            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <button dusk="login-btn" type="submit" class="btn btn-info">
                    Login
                </button>
                <a dusk="forgot-password" class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
              </div>
            </div>
            <!--NO ACCOUNT -->
            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <div style="color: white;">Don't Have An Account?
                </div>
              </div>
            </div>
            <!--REGISTER HERE  -->
            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <a dusk="register-btn" class="btn btn-info register-btn color:black;" href="{{ route('register') }}">
                Register Here
                </a>
              </div>
            </div>
          </form>
        </div> <!-- ./panel-body -->
      </div> <!-- ./panel panel-default -->
    </div> <!-- ./col-md-8 col-md-offset-2 -->
  </div> <!-- ./row -->
</div> <!-- ./container -->
@endsection
