@extends('admin.pages.master')

@section('content')
<div class="animate form login_form">
  <section class="login_content">
    <form action="{{route('admin-signup')}}" method="post">
      @csrf
      <h1>Create Account</h1>
      <div>
        <input type="text" name="username" class="form-control" placeholder="Username *" value="{{$name}}"  />
      </div>
      {{-- email --}}
      <div>
        <input type="text" name="email" class="form-control" placeholder="Email *" value="{{$email}}" />
      </div>
      {{-- pass --}}
      <div>
        <input type="password" name="password" class="form-control" placeholder="Password *" />
      </div>

      <div>
        @if(!empty($ErrMsg))
          <div class="alert alert-danger text-left">
            @foreach($ErrMsg as $err)
              <li>{{$err}}</li>
            @endforeach
          </div>
        @endif
        <button class="btn btn-primary">Sign up</button>
      </div>

      <div class="clearfix"></div>

      <div class="separator">
        <p class="change_link">Already a member ?
          <a href="{{route('admin-login')}}" class="to_register"> Log in </a>
        </p>

        <div class="clearfix"></div>
        <br />

        <div>
          <h1><i class="fa fa-paw"></i> Kmt Hcmute!</h1>
          <p>©{{date("Y")}} All Rights Reserved. Kmt Hcmute! . Privacy and Terms</p>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection

