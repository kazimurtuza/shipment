<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/custom.css" />
    <title>Hello, world!</title>
</head>
<style>
    .cardbody{
        background: #ffffff;
        border: 1px solid #dfe0eb;
        box-sizing: border-box;
        border-radius: 8px;
        box-shadow: 0px 10px 24px rgb(54 123 245 / 25%);
        margin-top: 63px !important;
        padding: 30px;
    }
</style>
<body>
<div>
    <form action="{{route('submitResetPasswordForm')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-xs-6 cardbody" style="margin:auto;width: 400px">
                <h4 class="text-center" style="margin-bottom: 10px;">DISPATCHER</h4>
                <h6 class="text-center" style="margin-bottom: 32px;color:#8f8f8f;">Reset Password</h6>

                <div class="form-group">

                    <input
                            type="email"
                            name="email"
                            class="form-control logininputbox"
                            id="exampleInputEmail12"
                            placeholder="Enter your email"
                            required
                    />

                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="token" value="{{$token}}">

                <div class="form-group">

                    <input
                            type="password"
                            name="password"
                            class="form-control logininputbox"
                            id="exampleInputEmail12"
                            placeholder="Enter your Password"
                            required
                    />
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">

                    <input
                            type="password"
                            name="password_confirmation"
                            class="form-control logininputbox"
                            id="exampleInputEmail12"
                            placeholder="Confirm password"
                            required
                    />
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button
                        type="submit"
                        class="btn btn-sm btn-primary btn-block  text-center"
                        style="margin:auto;margin-top: 36px;margin-bottom: 40px !important;"
                >
                    Reset Password
                </button>


            </div>
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>