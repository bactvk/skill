<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <title>Manager system - Kmt</title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      .capcha_img img{
        width: 200px;
      }
      .captcha{
        margin-bottom: 20px;
      }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="">
              @csrf
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="userName *" name="username" value="{{$name}}" />
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
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
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

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              {{-- email --}}
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              {{-- pass --}}
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
        
              <div>
                <a class="btn btn-primary submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
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
      </div>
    </div>

    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript">
      $(".btn-refresh").click(function(){

        $.ajax({
           type:'GET',
           url:'/refresh_captcha',
           success:function(data){
              $(".captcha span").html(data.captcha);
           }
        });

      });
    </script>
  </body>
</html>
