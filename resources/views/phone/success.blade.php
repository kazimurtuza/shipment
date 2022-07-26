@extends('phone.layout')
@section('content')
    <div class="row pd">
        @if($status=='pic')

        <h1 class="text-center" style=" margin-top: 103px;font-size: 21px;"> Picked up  Documents</h1>
        @endif
       @if($status=='del')

        <h1 class="text-center" style=" margin-top: 103px;font-size: 21px;"> Delivered  Documents</h1>
        @endif

        <div class="col-12" style="text-align: center">
            <i style="  color: #4BD37B;
  font-size: 132px;" class="ico icon-ok-circled"></i>
        </div>

        <h1 class="text-center" style="font-style: normal;
  font-weight: 800;
  font-size: 31.5px;
  color: rgba(0, 0, 0, 0.67);
  line-height: 19px;
    margin-bottom: 83px;
" >Upload Successful</h1>


            @if($status=='pic')
        <span style="font-style: normal;
  font-weight: 700;
  font-size: 18px;
  margin-left: 4%;
">Next</span>
        <div class="col-12 text-center mt-3">
            <a href="{{url('mapnavigate/'.$shipment_id)}}" class="btn" style="  height: 62px;
  padding: 15px;
  background: #2B4BF2;
  width: 90%;
  color: white;
  font-size: 13px;
  border-radius: 11px;">

                <i style="font-size: 18px;" class="ico icon-direction"></i>
                Navigate to the next delivery stop
            </a>
        </div>
       @endif



    </div>
@endsection