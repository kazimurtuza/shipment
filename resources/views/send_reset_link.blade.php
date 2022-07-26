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




</head>
<body>
<div>
    <div class="row">
        <div class="loginpgdiv" style="margin-top: 70px;  height: 320px;">

            <h4 class="text-center loginheadertx">DISPATCHER</h4>
            @if(session()->has('success'))
                <div style="
                margin: auto;
                text-align:center;
  width: 326px;
  background-color: #00bf4f !important;
  padding: 10px;
  color: white;">
                    {{ session()->get('success') }}
                </div>
            @else
                <h4 class="text-center loginheadertx2n">
                    Reset Password
                </h4>
            @endif



            <form action="{{route('submitForgetPasswordForm')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xs-12 inputpadding" style="margin: auto">

                        <div class="form-group" style="margin-top: 20px">

                            <input
                                    type="email"
                                    name="email"
                                    class="form-control logininputbox"
                                    id="exampleInputEmail12"
                                    placeholder="Enter your email"
                                    required
                            />
                            @error('email')
                            <div class="text-danger" style="text-align: center;margin-top: 5px;">{{ $message }}</div>
                            @enderror
                        </div>

                        <button
                                type="submit"
                                class="btn btn-primary btn-sm li-btn loginbtn logtxt"
                                style="   margin-top: 46px;margin-bottom: 40px !important;"
                        >
                            Send Link
                        </button>


                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
