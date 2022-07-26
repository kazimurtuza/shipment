<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500;1,600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500;1,600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons/themify-icons.css')}}"/>
    <link rel="stylesheet" href="assets/fonts/fontello/fontello.css" />
    <title>Hello, world!</title>
    {{--<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>--}}
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: 'Roboto';
            font-style: normal;
        }
        .headtx{
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 20px;
            text-align: center;
            color: #000000;
            opacity: 0.7;
            padding: 30px;
            background: #F4F4F4;
        }

        ul {
            list-style: none;
        }
        ul li::before {
            content: "\2022";
            color: red;
            font-weight: bold;
            font-size: 10px;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
        .itembtn{
            border: 1px solid #D0D0D0;
            box-sizing: border-box;
            border-radius: 23px;
            border-radius: 10px;
            font-weight: 400;
            font-size: 11px;
        }
        .or{
            left: 50%;
            position: absolute;
            top: 2px;
            background: white;
            padding-left: 6px;
            padding-right: 6px;
        }
        .labeltx{
            position: absolute;
            background: white;
            left: 36px;
            bottom: 29px;
            font-size: 11px;
            padding: 1px;
        }
        .bdradi{
            margin-top: 40px;
            border-radius: 10px;
        }
        .pd{
            padding-left: 12%;
            padding-right: 13%;
        }


        /*new phone image*/

        /*.take-picture {*/
            /*display: inline-block;*/
            /*margin: 0 auto;*/
            /*padding: 15px 20px;*/
            /*text-align: center;*/
            /*background-color: blue;*/
            /*color: #fff;*/
            /*cursor: pointer;*/
        /*}*/
        /*.single-img-show {*/
            /*width:200px;height: 300px;*/
        /*}*/
        /*.single-image {*/
            /*float: left;*/
            /*display: inline-block;*/
        /*}*/

        /*new phone image*/
    </style>
</head>
<body>
    @yield('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

@yield('script')
</body>
</html>
