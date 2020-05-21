@extends('admin.pages.master')

@section('content')
<div class="animate form login_form">
  <section class="login_content">
    <form method="post" action="">
      @csrf
      <h1>Login Form</h1>
      <div>
        <input type="text" class="form-control" placeholder="userName *" name="username" value="@if(!empty($name)){{$name}} @endif" />
      </div>
      <div>
        <input type="password" class="form-control" placeholder="password *" name="password" />
      </div>
      {{-- capcha --}}
      <div>
        <div class="captcha">
          <span class="capcha_img">{!! captcha_img('flat') !!}</span>
          <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
        </div>
        <input id="captcha" type="text" class="form-control" placeholder="Enter captcha *" name="captcha">
      </div>

      <div>
        @if(!empty($ErrMsg))
          <div class="alert alert-danger text-left">
            @foreach($ErrMsg as $err)
              <li>{{$err}}</li>
            @endforeach
          </div>
        @endif

        <input class="btn btn-primary" type="submit" name="" value="Log in">
        {{-- <a class="reset_pass" href="#">Lost your password?</a> --}}
      </div>

      <div class="clearfix"></div>

      <div class="separator">
        <p class="change_link">New to site?
          <a href="{{route('admin-signup')}}" class="to_register"> Create Account </a>
        </p>

        <div class="clearfix"></div>
        <br />

        <div>
          <h1><i class="fa fa-paw"></i> Kmt Hcmute!</h1>
          <p>©2020 All Rights Reserved. Kmt Hcmute! . Privacy and Terms</p>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection