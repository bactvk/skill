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
      {{-- <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
 --}}
      <div class="login_wrapper">

        @yield('content')

        
      </div>
    </div>
    @if(Session::has('msg'))
      <div class="messageSuccess">
        <div class="col-md-4 alert alert-success text-center" style="position: fixed;right: 25%; top: 7%;font-size: 18px">
            {{Session::get('msg')}}
        </div>
      </div>
    @endif

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
