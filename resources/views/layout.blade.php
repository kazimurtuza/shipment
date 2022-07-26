<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>Dispatcher for Less</title>

    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('assets/styles/style.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/styles/custom.css')}}"/>


    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Raleway&display=swap"
            rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Quicksand:wght@300;400;500;600;700&family=Raleway&display=swap"
            rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Quicksand:wght@300;400;500;600;700&family=Raleway&display=swap"
            rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&family=Raleway&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Public+Sans:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&family=Quicksand:wght@300;400;500;600;700&family=Raleway&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&family=Public+Sans:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&family=Quicksand:wght@300;400;500;600;700&family=Raleway&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap"
          rel="stylesheet">

    {{--datatable--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">--}}
<!-- Themify Icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons/themify-icons.css')}}"/>


    <!-- Ion Range SLider -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/ionrangen/css/ion.rangeSlider.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugin/ion-range-slider/css/ion.rangeSlider.skinFlat.css')}}"> --}}



<!-- mCustomScrollbar -->
    <link
            rel="stylesheet"
            href="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}"
    />

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css')}}"/>
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/sweet-alert/sweetalert.css')}}"/>
    <!-- Remodal -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/modal/remodal/remodal.css')}}"/>
    <link
            rel="stylesheet"
            href="{{ asset('assets/plugin/modal/remodal/remodal-default-theme.css')}}"
    />
    <!-- start jquery steps -->

    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.steps.css')}}"/>

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

    <!-- DateRangepicker -->
    <link
            rel="stylesheet"
            href="{{ asset('assets/plugin/daterangepicker/daterangepicker.css')}}"
    />

    {{--select2--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

    {{--select2--}}

    {{--date range select--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>


    {{--map--}}
    <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet"
          type="text/css"/>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


    @yield('page_css')


    <style>
        .footermid {
            background: #edeaea;
            color: #F2371E;
            font-size: 10px;
            padding: 8px 8px;
            border-radius: 13px;
            font-family: 'Poppins';
            font-style: normal;
            font-size: 9px;
            width: 100%;
        }


        .footermid:hover {
            cursor: pointer;
        }

        #usdi {
            border: 1px solid #9a9a9a;
            padding: 2px 4px 2px 4px;
            border-radius: 20px;
            font-size: 10px;
            margin-bottom: 6px;

        }

        .frequency {
            margin-top: 15px;
            border-radius: 10px;
            border-color: #a39a9a;
            height: 36px;
            width: 78%;
        }

        .margintopsm {
            margin-top: -15px !important;
        }

        .navigation .menu a i {
            color: #9f9f9c;
        }
    </style>


</head>
<?php
$role_id = $role = \Illuminate\Support\Facades\Auth::user()->role;


$active_driver_list = \App\Models\Driver::where(function ($q) {
    $q->where('created_at', '>=', \Carbon\Carbon::now()->subDays(14)->startOfDay())
        ->orWhereHas('shipment', function ($j) {
            $j->where('actual_delivery_date', '>=', \Carbon\Carbon::now()->subDays(14)->format('Y-m-d'));
        })
        ->orWhereHas('shipment', function ($k) {
            $k->where('actual_pickup_date', '>=', \Carbon\Carbon::now()->subDay(14)->format('Y-m-d'));
        });
})
    ->get();



$empty_driver_list = \App\Models\Driver::whereNotIn('id', $active_driver_list->pluck('id')->toArray())->get();

$empty_driver_number = $empty_driver_list->count();
//$active_driver_number = $active_driver_list->count();
$active_driver_number = count($active_driver_list);


function getfromname($form)
{
    $fromdata = explode(",", $form);
    $fromsiz = count($fromdata);
    if ($fromsiz >= 3) {
        $fromfirst = $fromdata[$fromsiz - 2];
        $fromsecond = $fromdata[$fromsiz - 3];
    } else {
        $fromfirst = $fromdata[$fromsiz - 1];
        $fromsecond = $fromdata[$fromsiz - 2];

    }
    return [$fromsecond, $fromfirst];
}
$lastDeliveryinfo = \App\Models\shipment::where('driver_id', 2)->where('actual_delivery_date', '!=', null)->orderBy('actual_delivery_date', 'desc')->first();

function getdriverinfo($dv_id)
{
    $lastDeliveryinfo = \App\Models\shipment::where('driver_id', $dv_id)->where('actual_delivery_date', '!=', null)->orderBy('actual_delivery_date', 'desc')->first();

    if ($lastDeliveryinfo) {
        $to = $lastDeliveryinfo->to;
        $isNowFree = $lastDeliveryinfo->actual_delivery_date < \Carbon\Carbon::now()->format('Y-m-d');
        $isTodayFree = $lastDeliveryinfo->actual_delivery_date == \Carbon\Carbon::now()->format('Y-m-d');
        $isTomorrowFree = $lastDeliveryinfo->actual_delivery_date == \Carbon\Carbon::now()->addDay(1)->format('Y-m-d');
        $isInTwoDaysFree = $lastDeliveryinfo->actual_delivery_date == \Carbon\Carbon::now()->addDay(2)->format('Y-m-d');

        if ($isNowFree) {
            $status = "Now";
        } elseif ($isTodayFree) {
            $status = "Today";
        } elseif ($isTomorrowFree) {
            $status = "Tomorrow";
        } elseif ($isInTwoDaysFree) {
            $status = "In 2 days";
        } else {
            $status = "-";
        }
    } else {
        $to = false;
        $status = 'Now';
    }


//
//    $today = date('Y-m-d');
//    $tomorrow = date('Y-m-d', strtotime("+ 1 day"));
//    $aftertwodays = date('Y-m-d', strtotime("+ 2 day"));
//    $status = "";
//    $to = "";
//    $is_today_list = \App\Models\shipment::with('getdriver')->where('driver_id', $dv_id)->where('is_cancel', 0)->where('status', 1)->whereBetween('actual_delivery_date', [$today, $today])->get();
//    $is_tomorrow = \App\Models\shipment::with('getdriver')->where('driver_id', $dv_id)->where('is_cancel', 0)->where('status', 1)->whereBetween('actual_delivery_date', [$tomorrow, $tomorrow])->get();
//    $in_two_days = \App\Models\shipment::with('getdriver')->where('driver_id', $dv_id)->where('is_cancel', 0)->where('status', 1)->whereBetween('actual_delivery_date', [$aftertwodays, $aftertwodays])->get();
//    if ($is_today_list->count() > 0) {
//
//        $acdelivery_endtime = $is_today_list->last()->actual_delivery_time;
//        $esdelivery_endtime = $is_today_list->last()->delivery_time;
//        $actualdelivery_end_time = null;
//        if ($acdelivery_endtime) {
//            $actualdelivery_end_time = strtotime($acdelivery_endtime);
//            $actualdelivery_end_time = $acdelivery_endtime;
//        } else {
//            $actualdelivery_end_time = strtotime($esdelivery_endtime);
//            $actualdelivery_end_time = $esdelivery_endtime;
//        }
//           $timenow = strtotime(date('H:i:s'));
//
//        if (strtotime($actualdelivery_end_time) >= $timenow) {
//            $status = "Today";
//        } else {
//            $status = "Now";
//        }
//
//
//        $to = $is_today_list->last()->to;
//    }
//
//    if ($is_tomorrow->count() > 0) {
//        $status = 'Tomorrow';
//        $to = $is_tomorrow->last()->to;
//    }
//
//    if ($in_two_days->count() > 0) {
//        $status = 'in 2 days';
//        $to = $is_tomorrow->last()->to;
//    }


    return [$status, $to];
}

?>

<body>
<div class="loading-page" id="page-loading" style="display: none;">
    <div class="wrapper">
        <div class="circle circle-1"></div>
        <div class="circle circle-1a"></div>
        <div class="circle circle-2"></div>
        <div class="circle circle-3"></div>
    </div>
    <h1>The emails are being sent. Please hold on.…</h1>
</div>
<div class="main-menu mainmanu">

    <div class="content" style="position:relative;">
        <a class="imagelinkstyle" href="{{url('/')}}">
            <img
                    src="/assets/images/dispatch.JPG"
                    alt=""
                    style="height: 61px; width: 182px"
            />
        </a>
        <div class="navigation" style="margin-top: 50px;">
            <ul class="menu js__accordion navbar-nav">
                @if(($role_id==1)||($role_id==2))
                    <li class="nav-item {{ request()->is('shipment_summary')?'active':' ' }}">
                        <a class="waves-effect nav-link" href="{{route('shipment_summary')}}"
                        ><i class="ico icon-chart-line"></i><span class="">Overview</span></a
                        >
                    </li>
                @endif
                @if(($role_id==1)||($role_id==2))
                    <li class="nav-item {{ request()->is('customer_view')?'active':' ' }}">
                        <a class="waves-effect nav-link" href="{{route('customer_view')}}"
                        ><i class="ico icon-tasks"></i><span class="paddingleft btnclickstyle">Customers</span></a
                        >
                    </li>
                @endif

                @if(($role_id==1)||($role_id==2))
                    <li class="nav-item {{ request()->is('driver_view')?'active':' ' }}">
                        <a class="waves-effect" href="{{route('driver_view')}}"
                        ><i class="ico icon-users"></i><span class="paddingleft">Drivers</span></a
                        >
                    </li>
                @endif

                @if(($role_id==1))
                    <li class="nav-item {{ request()->is('finance')?'active':' ' }}">
                        <a class="waves-effect" href="{{route('finance')}}"> &nbsp;
                            <i class="fa fa-usd"></i><span class="paddingleft"> &nbsp; Financials</span></a>
                    </li>
                @endif
                @if(($role_id==1))
                    <li class="nav-item {{ request()->is('expense_view')?'active':' ' }}">
                        <a class="waves-effect" href="{{route('expense_view')}}"><i class="ico icon-doc"></i><span
                                    class="paddingleft">Expenses</span></a>
                    </li>
                @endif

                @if(Auth::user()->role==1)
                    <li id="cl" class="nav-item {{ request()->is('registration_view')?'active':' ' }}">
                        <a class="waves-effect" href="{{route('registration_view')}}"><i
                                    style="color:#9f9f9c !important; " class="fa fa-user-plus"></i><span
                                    class="paddingleft">Users</span></a>
                    </li>
            @endif


            {{-- <li>
              <a class="waves-effect" href="modal.html"><span class="paddingleft">untitle</span></a>
            </li> --}}
            <!-- Fontello Icon -->
                <link rel="stylesheet" href="assets/fonts/fontello/fontello.css"/>
            </ul>

            <!-- /.menu js__accordion -->
        </div>


        <!-- /.navigation -->

    </div>

    <div class="navfooter">
        <div class="row">
            <div class="col-sm-4">
                <img class="navftrimg" src="{{asset('man.png')}}">

            </div>
            <div class="col-sm-5" style="padding-left: 0px !important;">
                <span class="footermid" onclick="driverlist()"> <i style="color:red !important;" class="fa fa-user"></i> &nbsp; Dispatch <span
                            class="ftrcount">{{$active_driver_number}}</span> </span>

                <div class="footerlist" style="display: none;height: 206px;">
                    <div class="row">
                        <table class="table table-borderless" style="font-size: 11px;overflow-y: scroll;">
                            <thead>
                            <tr>

                                <th scope="col" style="padding-left: 26px;" colspan="2">Active drivers <span
                                            class="acdv">{{$active_driver_number}}</span></th>
                                <th scope="col" class="text-center">Empty <span
                                            class="empac">{{$empty_driver_number}}</span></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($active_driver_list as $dvrow)
                                <?php
                                $driver_infodata = getdriverinfo($dvrow->id);

                                ?>
                                <tr>
                                    <td>{{$dvrow->driver_name}} {{$dvrow->id}}</td>
                                    <td style="color:red">{{$driver_infodata[0]}}</td>
                                    <?php
                                    $locationval = $driver_infodata[1];
                                    if ($locationval) {
                                        $fromplace = getfromname($driver_infodata[1]);
                                    } else {
                                        $fromplace = [' ', ''];
                                    }


                                    ?>
                                    <td>{{$fromplace[0]}},{{$fromplace[1]}}</td>
                                    {{--<td>{{$driver_infodata[1]}}</td>--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <span><a href="{{route('signOut')}}" style="font-size: 22px" class="fa fa-sign-out"></a></span>
            </div>

        </div>
    </div>

    <!-- /.content -->
</div>
<!-- /.main-menu -->


<div id="wrapper" style="background-color: white">
    <div class="layout-message-wrapper">
        @if(session()->has('success'))

            <div class="alert alert-success">
                {{ session()->get('success') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
        @if(session()->has('success_alert'))

            <div class="alert alert-success">
                {{ session()->get('success_alert') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
        @endif
    </div>

    @yield('content')
</div>


<!-- //////modal//// -->
@yield('page_modals')


<!--/#wrapper -->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

{{--datatable--}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

{{--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>--}}
{{--end datatable--}}

<script src="{{ asset('assets/scripts/modernizr.min.js')}}"></script>
<script src="{{ asset('assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ asset('assets/plugin/nprogress/nprogress.js')}}"></script>
<script src="{{ asset('assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{ asset('assets/plugin/waves/waves.min.js')}}"></script>
<!-- Sparkline Chart -->
<script src="{{ asset('assets/plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{ asset('assets/scripts/chart.sparkline.init.min.js')}}"></script>

<!-- Remodal -->
<script src="{{ asset('assets/plugin/modal/remodal/remodal.min.js')}}"></script>

<script src="{{ asset('assets/scripts/main.min.js')}}"></script>

<!-- Jquery UI -->
<script src="{{ asset('assets/plugin/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js')}}"></script>

<!-- noUI Slider -->
<script src="{{ asset('assets/plugin/noUIslider/nouislider.min.js')}}"></script>
<script src="{{ asset('assets/scripts/nouislider.init.min.js')}}"></script>

<!-- Ion Ranger SLider -->
<script src="{{ asset('assets/plugin/ionrangen/js/ion.rangeSlider.min.js')}}"></script>
{{-- <script src="{{ asset('assets/scripts/ion.rangeSlider.init.min.js')}}"></script> --}}


<script src="{{ asset('assets/plugin/maxlength/bootstrap-maxlength.min.js')}}"></script>

<!-- Demo Scripts -->
<script src="{{ asset('assets/scripts/form.demo.min.js')}}"></script>

<script src="{{ asset('assets/scripts/main.min.js')}}"></script>

<script src="assets/scripts/sweetalert.init.min.js"></script>

<!-- start jquery steps -->
<script src="{{ asset('assets/lib/modernizr-2.6.2.min.js')}}"></script>
{{-- <script src="{{ asset('assets/lib/jquery-1.9.1.min.js')}}"></script> --}}
<script src="{{ asset('assets/lib/jquery.cookie-1.3.1.js')}}"></script>
<script src="{{ asset('assets/build/jquery.steps.js')}}"></script>
<script src="{{ asset('assets/build/jquery.validate.min.js')}}"></script>

<script>
    function openNewModal(oldModal, newModal) {
        $('#' + newModal).modal('show');
        $('#' + oldModal).modal('hide');

    }
</script>

{{-- /////daterange end/// --}}

<script>
    $(document).ready(function () {
        $(".select2").select2({
            placeholder: "Select",
            allowClear: true
        });
    });

    $(".btnclickstyle").on('click', function () {
        $(this).parent().parent().addClass("myClassyourClass");
    })


    $(document).ready(function () {
        $('ul.navbar-nav >li')
            .click(function (e) {
                $('ul.navbar-nav > li')
                    .removeClass('active');
                $(this).addClass('active');
            });
    });


    $(document).ready(function () {
            $('#table_id').DataTable();

            var oTable = $('#table_id').DataTable();
            $('#myInputTextField').on('input', function () {
                oTable.search($(this).val()).draw();
            });
        }
    );


    function driverlist() {
        $('.footerlist').toggle();

    }

</script>


@yield('script')


</body>
</html>
