<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dispatcher for Less</title>

    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/styles/style.min.css" />
    <link rel="stylesheet" href="assets/styles/custom.css" />

    <!--  start google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Raleway&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Quicksand:wght@300;400;500;600;700&family=Raleway&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Quicksand:wght@300;400;500;600;700&family=Raleway&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&family=Raleway&display=swap"
      rel="stylesheet"
    />

    <!-- end google font -->

    <!-- Themify Icon -->
    <link
      rel="stylesheet"
      href="assets/fonts/themify-icons/themify-icons.css"
    />

    <!-- mCustomScrollbar -->
    <link
      rel="stylesheet"
      href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css"
    />

    <!-- Waves Effect -->
    <link rel="stylesheet" href="assets/plugin/waves/waves.min.css" />

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css" />

    <!-- Remodal -->
    <link rel="stylesheet" href="assets/plugin/modal/remodal/remodal.css" />
    <link
      rel="stylesheet"
      href="assets/plugin/modal/remodal/remodal-default-theme.css"
    />
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="loginpgdiv">
          <img src="/assets/images/loginimg.png" alt="" class="loginimg" />
          <h4 class="text-center loginheadertx">Log In to Dashboard</h4>

          @if(session()->has('success'))
            <div class="text-danger text-center loginheadertx2n loginerrortxt">
              {{ session()->get('success') }}
            </div>
            @else
            <h4 class="text-center loginheadertx2n">
              Enter your email and password below
            </h4>
          @endif

            <form action="{{route('customLogin')}}" method="post">
                @csrf
          <div class="row">
            <div class="col-xs-12 inputpadding" style="margin: auto">

              <div class="form-group">
                <label for="exampleInputEmail12 " class="loginname"
                  >Email
                </label>
                <input
                  type="email"
                  name="email"
                  class="form-control logininputbox"
                  id="exampleInputEmail12"
                  placeholder="Enter your email"
                  required
                />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail13">
                  <span class="loginname">password</span>
                  <a class="pass" href="{{route('send_reset_mail')}}">Forgot password?</a>
                </label>
                <input
                  type="password"
                  name="password"
                  class="form-control logininputbox"
                  id="pss"
                  placeholder="password"
                  required
                />
                <i onclick="passtog()" id="eye" class="fa fa-eye-slash" style="cursor: pointer;position:relative;top: -31px;left: 255px;color:#9FA2B4"></i>
              </div>

              <button
                type="submit"
                class="btn btn-primary btn-sm li-btn loginbtn logtxt"
                style=" margin-bottom: 40px !important;"
                 >
                Log in
              </button>

              <h5 class="text-center">
                <span class="loginfooter">Don’t have an account?</span>
                <span style="color: #3751ff">Sign up</span>
              </h5>
            </div>
          </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>
    <!-- Sparkline Chart -->
    <script src="assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/scripts/chart.sparkline.init.min.js"></script>

    <!-- Remodal -->
    <script src="assets/plugin/modal/remodal/remodal.min.js"></script>

    <script src="assets/scripts/main.min.js"></script>
    <script>
      var i=0
      function passtog(){
        if(i==0){
          $('#pss').attr('type','text');
          $('#eye').css({ 'color': '#2ECC40'});
          $("#eye").removeClass('fa-eye-slash');
          $("#eye").addClass('fa-eye');
          i=1
        }else{
          $('#pss').attr('type','password');
          $("#eye").addClass('fa-eye-slash');
          $("#eye").removeClass('fa-eye');
          i=0
        }

      }
    </script>
  </body>
</html>
