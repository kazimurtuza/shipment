@extends('phone.layout')
@section('content')
    <h1 class="headtx">Scan Pickup Documents</h1>
    <?php $shipmentdata=\App\Models\shipment::find($shipment_id);

//    dd($delivery);
    ?>
    <div class="bg-success" id="imageview" style="display:none;position: fixed;top:0px;bottom: 0px;right: 0px;left: 0px" >

        <div style="height: 80%" class="bg-info">
            <video id="video" autoplay></video>
        </div>
        <div style="height: 20%;background:rgba(0,0,0,0.9);text-align: center">
            {{--id="click-photo"--}}
            {{--<button class="start-camera">Start Camera</button>--}}
            <span  class="take-picture" style="height:55px; width: 55px; position: absolute;
  bottom: 59px;padding: 12px 16px;background: #4e67de;cursor: pointer;border-radius: 50%;  margin-left: -35px
;"
                  ><img style="width: 30px;position:absolute;right: 12px;" src="{{asset('scan.png')}}"alt=""></span>


            <!--<button class="switch">On / Off</button>-->
        </div>
    </div>

    {{--new phone image--}}


    <div id="input-img">

    </div>
    {{--new phone image--}}


    <form action="{{route('updatepickup_from_phone')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row pd" id="phototake">
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <li class="text-center text-danger">{{ $error }}</li>
                @endforeach
            </div>


            {{--<input type="hidden" name="pickuptime" id="pickuptime">--}}
            <input type="hidden" name="inv_id"value="{{$shipmentdata->invoice_no}}">
            <input type="hidden" name="shipment_id"value="{{$shipment_id}}">
            <div class="col-12"> <h4 style="font-weight: 700;font-size: 11.5px;line-height: 19px;color: rgba(0, 0, 0, 0.67);">
                    <strong>Pickup address &nbsp;:</strong>&nbsp; {{$shipmentdata->form}}</h4></div>
            <div class="col-12" id="image_first_view" style=" color: #2B4BF2; padding: 20px;  text-align: center;border: 2px dotted #bfb2b2;border-radius: 39px;" >


                <label>
                    <div class="take-picture">
                        <h1 style="padding-bottom: 3px;margin-bottom: 0px;"><img  style="height: 96px;" src="{{asset('scan.png')}}"></h1>
                        <span onclick="hiddenme()"  style="font-weight: 700;font-size: 15px; color:#00357b !important;">Scan documents <br></span>
                    </div>
                    <input type="file" accept="image/*" capture="camera" id="logoImage" name="picture" style="display: none;">
                </label>
            </div>

            <div  class="col-12" style="display:none;color: #2B4BF2; padding: 20px;  text-align: center;border: 2px dotted #bfb2b2;border-radius: 39px;"id="start-camera3">
                <div class="row">

                    <div class="col-8" style="overflow-x: scroll">
                        <table id="tbcanvas">

                        </table>

                    </div>
                    <canvas id="canvas" style="display: none" width="200" height="213"></canvas>
                    <div class="col-4" >

                        <label>
                            <div class="take-picture">
                                <h5  id="start-camera2" style="padding-bottom: 3px;margin-bottom: 0px;margin-top: 70%;" ><span
                                            style="
  border: 2px solid;
  padding: 2px 7px 2px 7px;
  border-radius: 25px;
  font-size: 16px;
  font-weight: 500;">+</span></h5>
                                <span   id="start-camera5"  style="font-weight: 700;font-size: 9px; color:#00357b !important;">Add another page<br></span>
                            </div>
                            <input type="file" accept="image/*" capture="camera" id="logoImage" name="picture" style="display: none;">
                        </label>
                    </div>



                </div>

            </div>
            {{--take image--}}


            <button id="click-photo" style="display: none">Click Photo</button>

            {{--take image--}}


            <h1 style="margin-top:10px;font-weight: 700;font-size: 11.5px;">Please check if:   </h1>
            <ul style="  margin-left: 15%;font-weight: 400;font-size: 10.5px;line-height: 19px;">
                <li>The image is clear and not blury</li>
                <li>All information is visible (signatures)</li>
                <li>The document is not captured at an angle</li>
                <li>All pages are included</li>
            </ul>


            <h1 style="margin-top:10px;font-weight: 700;font-size: 11px;">Please enter the pickup time  </h1>

            <?php
            $date=strtotime(date('Y-m-d H:i:s'));


            ?>
            {{--<div class="col-1"></div>--}}
            {{--<div class="col-3"> <span class="btn itembtn pickid" onclick="pickuptime({{$date}},this)">Now</span></div>--}}
            {{--<div class="col-4"><span class="btn itembtn pickid" onclick="pickuptime({{$date-(60*5)}},this)">5 mins ago</span></div>--}}
            {{--<div class="col-4"><span class="btn itembtn pickid" onclick="pickuptime({{$date-(60*10)}},this)">10 mins ago</span></div>--}}
            {{----}}
            <br>

            {{--<div style="position: relative;  top: 17px;"><hr> <span class="or">or</span></div>--}}

            <div class="col-6" style="position: relative ">
                <label class="labeltx" for="">Pickup date</label>
                <input required type="date" style="width: 140px;" name="pickupdate" value="{{$shipmentdata->pickup_date}}" class="form-control bdradi">
            </div>
            <div class="col-6" style="position: relative">
                <label class="labeltx" for="">Pickup time</label>
                <input required type="time" name="pickuptime" value="{{$shipmentdata->pickup_time}}" class="form-control bdradi">
            </div>

            <div class="col-12 text-center mt-5">
                <button class="btn"  style="background: #2B4BF2;  width: 53%; color:white">Submit</button>
            </div>

        </div>
    </form>

    <div id="my_camera"></div>
    <!--<input type=button value="Take Snapshot" onClick="take_snapshot()">-->

    <!--<div id="results" ></div>-->
@endsection

@section('script')





    <script>
        let camera_button = document.querySelector("#start-camera");
        let video = document.querySelector("#video");
        let click_button = document.querySelector("#click-photo");
        let canvas = document.querySelector("#canvas");
        var stream;





        async function  opencamera(){
            $('#phototake').hide();
            $('#start-camera').hide();
            $('#imageview').show();
            $('#start-camera3').show();

            stream = await navigator.mediaDevices.getUserMedia({video:{
                    width: screen.height,
                    height: screen.width,
                    facingMode: {
                        exact: 'environment'
                    }},
                    audio: false });
            video.srcObject = stream

        }


        click_button.addEventListener('click', async function() {
            let randomid=Math.floor(Math.random() * 1000);

            $('#tbcanvas').prepend(`
             <td style="position: relative">
                <!--<canvas  width="200" height="213"></canvas>-->
                <input type="hidden" id="bill${randomid}" name="bill_of_lading[]">

                <img id="${randomid}" show-data="${randomid}" onclick="viewimg(this)" width="200" height="213" src="" alt="Red dot" />
             <div id="viewdiv${randomid}"  style="position:relative;display: none">
 <img id="view${randomid}" style="  position: fixed;
  left: 46px;
  top: 228px;
  border-radius: 14px;
  z-index: 30;" width="300" height="400" src="" alt="Red dot" />

 <span  data-hide="${randomid}" onclick="deleteview(this)" style="  color: white;
  background: red;
  padding: 0px 8px;
  border-radius: 50%;
  position: fixed;
  right: 93px;
  top: 236px;
  z-index: 99;
  cursor: pointer;">
                &times;
                </span>
</div>
                <span onclick="deletecanv(this)" style="color:white;background:black; padding:0px 8px;border-radius:50%; position: absolute;right: 14px;top:2px;z-index:999!important;cursor: pointer">
                &times;
                </span>

                </td>
            `)




            // canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            // let image_data_url = canvas.toDataURL('image/jpeg');

            // data url of the image
            // console.log(image_data_url);


            $("#"+randomid).attr("src", image_data_url);
            $("#view"+randomid).attr("src", image_data_url);
            $("#img"+randomid).attr("href", image_data_url);
            $("#bill"+randomid).val(image_data_url);
            stream.getTracks().forEach(function(track) {
                track.stop();
            });


        });

        function hiddenme(){

            $('#phototake').hide()
            $('#start-camera').hide()
            $('#imageview').show()
            $('#start-camera3').show()
        }
        function hiddencamera(){
            $('#phototake').show()
            $('#imageview').hide()

        }
        async  function  deletecanv(data){
            $(data).parent().remove();
            $('#imageview').hide()

        }

        function pickuptime(date,data2){
            $('#pickuptime').val(date);

            $('.pickid').css({'background-color' : 'rgb(246 246 246)'})
            $(data2).css({'background-color' : '#2ECC40'});
        }


        function viewimg(data){
            let id=$(data).attr('show-data');
            $("#viewdiv"+id).show();
        }
        function deleteview(data){
            let id=$(data).attr('data-hide');
            $("#viewdiv"+id).hide();

        }
    </script>

    {{--new phone image--}}

    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script>
        $("body").on("change", "#logoImage", function(e){
            var files = e.target.files;
            var done = function (url) {

            //     $("#input-img").append(`
            //     <div class="single-image">
            //         <button class="cancel-button" type="button">X</button>
            //         <img src="${url}" class="single-img-show" ">
            //         <input type="hidden" name="input_name[]" value="${url}">
            //     </div>
            // `);
            //     $("#logoImage").val('');




               // my coded

                $('#image_first_view').hide();
                // $('#phototake').hide();
                // $('#start-camera').hide();
                // $('#imageview').show();
                $('#start-camera3').show();

                let image_data_url=url;

                let randomid=Math.floor(Math.random() * 1000);

                $('#tbcanvas').prepend(`
             <td style="position: relative">
                <!--<canvas  width="200" height="213"></canvas>-->
                <input type="hidden" id="bill${randomid}" name="bill_of_lading[]">

                <img id="${randomid}" show-data="${randomid}" onclick="viewimg(this)" width="200" height="213" src="" alt="Red dot" />
             <div id="viewdiv${randomid}"  style="position:relative;display: none">
 <img id="view${randomid}" style="  position: fixed;
  left: 46px;
  top: 228px;
  border-radius: 14px;
  z-index: 30;" width="300" height="400" src="" alt="Red dot" />

 <span  data-hide="${randomid}" onclick="deleteview(this)" style="  color: white;
  background: red;
  padding: 0px 8px;
  border-radius: 50%;
  position: fixed;
  right: 93px;
  top: 236px;
  z-index: 99;
  cursor: pointer;">
                &times;
                </span>
</div>
                <span onclick="deletecanv(this)" style="color:white;background:black; padding:0px 8px;border-radius:50%; position: absolute;right: 14px;top:2px;z-index:999!important;cursor: pointer">
                &times;
                </span>

                </td>
            `)




                // canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                // let image_data_url = canvas.toDataURL('image/jpeg');

                // data url of the image
                // console.log(image_data_url);


                $("#"+randomid).attr("src", image_data_url);
                $("#view"+randomid).attr("src", image_data_url);
                $("#img"+randomid).attr("href", image_data_url);
                $("#bill"+randomid).val(image_data_url);
               // my coded
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                reader = new FileReader();
                reader.onload = function (e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    {{--new phone image--}}


@endsection
