@extends('layout')
@section('content')
<div class="main-content">

          <div class="row">

          <div class="m-4 custom_position">
            <h1 class="tableheadtxt" >Drivers</h1>


            <h5 class="tablesecondhead" style="margin-top: 21px">
             Add, Change or manage all drivers in your organization.
             Start by completing driver profiles from the ADP tab.
            </h5>
          </div>
        </div>
        <div class="row row-inline-block small-spacing">
          <div class="col-xs-12" style="background-color: white;margin-top: 65px;">

            <div class="box-content">
              <div class="row mb-20px">
                <div class="col-sm-4">
                  <form>
                    <div class="input-group custom-search-input m-4">
                      <input
                        type="text"
                        id="myInputTextField"
                        class="form-control"
                        placeholder="Search"
                      />
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-6 text-right">
                  <button
                    class="btn thm-btn margin-bottom-10 waves-effect waves-light addbtntxtblack"
                    data-toggle="modal"
                    data-target="#boostrapModal-12"
                    id="addnew_driver11"
                  >
                    New Driver
                  </button>
                </div>
              </div>
              <!-- /.box-title -->

              <div class="table-responsive" >
                <table id="table_id" class="table table-striped table-bordered" >
                  <thead id="sitebordernone">
                    <tr class="tbl-head-txt tableheadtx" >
                      <th>Name</th>
                      <th class="hidden_ico" style="background-image:none !important;" >Phone</th>
                      <th class="hidden_ico" style="background-image:none !important;" >Email</th>
                      <th class="hidden_ico" style="background-image:none !important;" >Vehicle</th>
                      <th class="hidden_ico" style="background-image:none !important;" >Gas card number</th>
                      @if(getroleid()==1)
                      <th class="hidden_ico" style="background-image:none !important;" >Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody id="myTable">
                  @foreach( $driver_list as $data )
                      <tr class="tablebodytxt3">
                          <td>{{$data->driver_name}}</td>
                          <td>{{$data->mobile}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->vehicle_number}}</td>
                          <td>{{$data->gas_card_number}}</td>
                          @if(getroleid()==1)
                          <td class="ieditbtn">
                              <a   data-toggle="modal"
                                   data-target="#boostrapModal-12" onclick="editdata({{json_encode($data)}})"> <i class="fa fa-edit" style="  margin-left: 30px;font-size: 28px;cursor: pointer"></i> </a>
                              {{--<a href="{{url('delete_user/'.$data->id)}}" onclick="editdata({{json_encode($data)}})"> <i class="ico mdi mdi-delete" style="font-size: 28px;color:#ff0052;cursor: pointer"></i> </a>--}}

                          </td>
                              @endif

                      </tr>
                      @endforeach

                 
                 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-content -->
          </div>
          <!-- /.col-xs-12 -->
        </div>
        <!-- /.row row-inline-block small-spacing -->
     
      </div>
@endsection

@section('page_modals')

    <form action="{{route('insert_driver')}}" method="post">
        @csrf
 <div
      class="modal fade"
      id="boostrapModal-12"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content modalstyle" style="width: 580px;height: 692px;">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true" class="closbtdst">&times;</span>
            </button>
            <h4 class="modal-title myModalLabel23" id="addnew_driver">
              Add a new driver
            </h4>
            <span class="modalheadtx2nd" style="font-size: 12px;">Add payment structure, automatic payments, email alerts and more.</span>

          </div>
          <div class="modal-body">
            

                <div class="col-lg-6 col-xs-6 ">
                     <h5>Driver Name</h5>

                      	<div class="input-group margin-bottom-20 margintopsm">
							<div class="input-group-btn"><label for="driver_name" class="btn btn-default input_drv_icon"><i class="ico icon-user"></i></div>
							<!-- /.input-group-btn -->
							<input id="driver_name" type="text" name="driver_name" value="{{ old('driver_name') }}" class="form-control input_drv round_style" placeholder="First Last">

                        </div>

                    @error('driver_name')
                    <div class="text-danger inputerror">{{ $message }}</div>
                    @enderror

              </div>




              <div class="col-lg-6 col-xs-6 ">
                     <h5>Email</h5>

                      	<div class="input-group margin-bottom-20 margintopsm">
							<div class="input-group-btn"><label for="email" class="btn btn-default input_drv_icon">@</div>
							<!-- /.input-group-btn -->
							<input id="email" name="email" type="text" class="form-control input_drv" placeholder="email@compa.com">

                        </div>
                  @error('email')
                  <div class="text-danger inputerror">{{ $message }}</div>
                  @enderror


              </div>
              <div class="col-lg-6 col-xs-6 ">
                 <h5>Mobile</h5>
                         	<div class="input-group margin-bottom-20 margintopsm">
							<div class="input-group-btn"><label for="mobile" class="btn btn-default input_drv_icon"><i class="fa fa-phone"></i></label> </div>
							<!-- /.input-group-btn -->
							<input id="mobile" type="text" name="mobile" class="form-control input_drv" placeholder="xxx-xxx-xxxx">

                            </div>
                       @error('mobile')
                      <div class="text-danger inputerror">{{ $message }}</div>
                      @enderror



              </div>
              <div class="col-lg-12 col-xs-12 "></div>

                    <div class="col-lg-6 col-xs-6 ">
                 <h5>Vehicle number</h5>
                         	<div class="input-group margin-bottom-20 margintopsm">
							<div class="input-group-btn"><label for="vehicle_number" class="btn btn-default input_drv_icon"><i class="fa fa-truck"></i></div>
							<!-- /.input-group-btn -->
							<input id="vehicle_number" type="text" name="vehicle_number" class="form-control input_drv" placeholder="Vehicle number">

                            </div>

                        @error('vehicle_number')
                        <div class="text-danger inputerror">{{ $message }}</div>
                        @enderror
   
              
              </div>
                    <div class="col-lg-6 col-xs-6 ">
                 <h5>Gas card number</h5>


                         	<div class="input-group margin-bottom-20 margintopsm">
							<div class="input-group-btn"><label for="gas_card_number" class="btn btn-default input_drv_icon"><i class="fa fa-credit-card-alt"></i></div>
							<!-- /.input-group-btn -->
							<input id="gas_card_number" name="gas_card_number" type="text" class="form-control input_drv" placeholder="5203352154000">
                            </div>
                        @error('gas_card_number')
                        <div class="text-danger inputerror">{{ $message }}</div>
                        @enderror


              </div>
             
       
        <div class="col-lg-12 col-xs-12 " style=" margin-top: 30px;"> <h5>Pay Structure</h5></div>


        <div class="col-lg-12 col-xs-12 " style=" margin-top: 6px;">
        <div class="row" style="  font-size: 15px;">
            <dov class="col-sm-3 text-center">
                <input class="form-check-input radiobt" type="radio" name="paystatus" id="PerMile" value="1">
                <br><label class="form-check-label" for="inlineRadio2">Per Mile</label>
            </dov>
            <dov class="col-sm-3 text-center">
                <input class="form-check-input radiobt" type="radio" name="paystatus" id="prsrevenue" value="2">
                <br><label class="form-check-label" for="inlineRadio2">% of revenue</label>
            </dov>
            <dov class="col-sm-3 text-center">
                <input class="form-check-input radiobt" type="radio" name="paystatus" id="prsprofit" value="3">
                <br><label class="form-check-label" for="inlineRadio2">% of profit</label>
            </dov>
            <dov class="col-sm-3 text-center">
                <input class="form-check-input radiobt" type="radio" name="paystatus" id="Fixed" value="4">
                <br><label class="form-check-label" for="inlineRadio2">Fixed</label>
            </dov>
        </div>
        </div>








        {{--<div class="col-lg-12 col-xs-12 " style=" margin-top: 30px;"> <h5>Pay structure (percentage of profit)</h5></div>--}}

              {{--<div class="col-lg-12 col-xs-12 " style="margin-top: -112px;">--}}

                {{--<h5 class="slidertxt" style="top: 134px;position: relative;">Company</h5>--}}
                {{--<h5 class="slidertxt"  style="top: 125px;left:2px;position: relative;">min</h5>--}}
                {{--<h5 class="slidertxt" style="  top: 57px;left: 451px;position: relative;">Driver</h5>--}}
					      {{--<input id="ion-range-ss01" name="profit_percentage" value="50" class="js-range-slider">--}}
                {{--<h5 class="slidertxt" style="top: -32px;left: 458px;position: relative;">max</h5>--}}
					{{--<div id="ion-range-01"></div>--}}

              {{--</div>--}}

              <div class="col-lg-12 col-xs-12 text-center" style="position: relative;top: 31px;">

                  <div
                          style="  cursor: pointer;
  margin: auto;
  padding: 6px;
  border-radius: 10px;
  margin-bottom: 61px;
  width: 386px;
  background: #0b74f7;
  /* text-align: center; */
  color: white;"
                          {{--onclick="openNewModal('boostrapModal-12','boostrapModal-300')"--}}
                          onclick="openpaystatus()"
                  >
                      Next
                  </div>




                  {{--<div  class="btn btn-primary btn-sm waves-effect btncss1 btndone" >1</div>--}}
                  {{--<div class="btn btn-primary btn-sm waves-effect btncss2 btndone">2</div>--}}
              </div>


          </div>

        </div>
      </div>
    </div>







       <!-- //////modal Upload a document//// -->
    <div
      class="modal fade" id="boostrapModal-300" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content modalstyle" style="height: 311px">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true" class="closbtdst">&times;</span>
            </button>
            <h4 class="modal-title modalheadtx" id="setemailpart">Add a new driver</h4>
            <h4
              class="modal-title"
              id="myModalLabel"
              style="color: #818181;
  margin-top: 16px;
  margin-bottom: -29px;
  font-size: 12px"
            >
             Add payment structure, automatic payments, email alerts and more.
            </h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12" style="margin-top: 44px;">
              </div>
              <div class="col-xs-1">
         

								<input type="checkbox"  style="margin-top: 14px;margin-left: 10px;paddign: 11px;height: 19px;width: 19px;" name="email_status" id="terms" data-error="Before you wreck yourself" checked >
								<label for="terms"></label>
								<div class="help-block with-errors"></div>
	
					
						</div>

                <input type="hidden" name="edit" value="{{ old('edit') }}" id="edit">
                <input type="hidden" name="id" value="{{ old('id') }}"  id="driver_id">
            <div class="col-xs-11">
                  <span class="addnewdrivertxt">Send email notifications about pick up, delivery (time, date, location) and
                    <span style="color: #000000;font-weight:600;">estimated payment for  shipments.</span> </span>
                </div>
                </div>
          
            
          </div>
          <div class="modal-footer contetn_center" style="padding-top: 20px;">
            <a
             onclick="openpaystatus()"
            class="pointer"
            style="color: #000000;
  margin-top: 9px;
  margin-right: 196px;">
  <i class="fa fa-angle-left" ></i> &nbsp;&nbsp;
           Previous
            </a>
            <button
              type="submit"
              class="btn btn-primary btn-sm waves-effect waves-light btndone"
            >
              Complete
            </button>
          </div>
        </div>
      </div>


        {{----}}
    </div>


        <!-- //////modal  % of revenue //// -->
    <div
      class="modal fade" id="boostrapModalrevenue2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content modalstyle" style="height: 311px">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true" class="closbtdst">&times;</span>
            </button>
            <h4 class="modal-title modalheadtx" id="setemailpart">Complete Mustafa Faqiri’s driver profile</h4>
            <h4
              class="modal-title" id="myModalLabel" style="color: #818181;margin-top: 16px;margin-bottom: -29px;font-size: 12px">
                Add payment structure, automatic payments, email alerts and more.
            </h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12" style="margin-top: 10px;">
              </div>
              <div class="col-xs-6" >
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10"> <span>Payment type &nbsp; &nbsp; Fixed <br> <br></span></div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-1" style="  border-bottom: 1px solid #d4d4d4;"> <span> <i id="usdi" class="fa fa-usd"></i></span></div>
                    <div class="col-sm-8" style="border-bottom: 1px solid #D4D4D4;"><input style="  margin-top: 3px;border: none;padding-bottom: 4px;" type="text" name="fixed" placeholder="Amount"></div>
                </div>

                <br>
            </div>

                <div class="col-xs-6">
                    <span>Frequency</span> <br>
                    <select  name="" id="" class="form-control frequency" >
                        <option value=""> Week </option>
                    </select>
                </div>
                </div>


          </div>
          <div class="modal-footer contetn_center" style="padding-top: 20px;">
            <a onclick="openNewModal('boostrapModal-300','boostrapModal-12')" class="pointer" style="color: #000000;margin-top: 9px;margin-right: 196px;">
              <i class="fa fa-angle-left" ></i> &nbsp;&nbsp;
              Previous
            </a>
            <button
              type="submit"
              class="btn btn-primary btn-sm waves-effect waves-light btndone">
              Complete
            </button>
          </div>
        </div>
      </div>


        {{----}}
    </div>




        <!-- //////modal  Payment type Fixed//// -->
        <div
                class="modal fade" id="boostrapModalfixed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modalstyle" style="height: 311px">
                    <div class="modal-header">
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true" class="closbtdst">&times;</span>
                        </button>
                        <h4 class="modal-title modalheadtx" id="setemailpart">Complete Mustafa Faqiri’s driver profile</h4>
                        <h4
                                class="modal-title" id="myModalLabel" style="color: #818181;margin-top: 16px;margin-bottom: -29px;font-size: 12px">
                            Add payment structure, automatic payments, email alerts and more.
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12" style="margin-top: 10px;">
                            </div>



                            <div class="col-xs-6" >
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10"> <span>Payment type &nbsp; &nbsp; Fixed <br> <br></span></div>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-1" style="  border-bottom: 1px solid #d4d4d4;"> <span> <i id="usdi" class="fa fa-usd"></i></span></div>
                                    <div class="col-sm-8" style="border-bottom: 1px solid #D4D4D4;"><input style="  margin-top: 3px;border: none;padding-bottom: 4px;" type="text" placeholder="Amount"></div>
                                </div>

                                <br>
                            </div>

                            <div class="col-xs-6">
                                <span>Frequency</span> <br>
                                <select  name="" id="" class="form-control frequency" >
                                    <option value=""> Week </option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer contetn_center" style="padding-top: 20px;">
                        <a onclick="openNewModal('boostrapModalfixed','boostrapModal-12')" class="pointer" style="color: #000000;margin-top: 9px;margin-right: 196px;">
                            <i class="fa fa-angle-left"  ></i> &nbsp;&nbsp;
                            Previous
                        </a>
                        <span
                                onclick="openNewModal('boostrapModalfixed','boostrapModal-300')"
                                class="btn btn-primary btn-sm waves-effect waves-light btndone">
                            Next
                        </span>
                    </div>
                </div>
            </div>

        </div>





        {{--per mile--}}
        <div
                class="modal fade" id="boostrapModalpermile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modalstyle" style="height: 311px">
                    <div class="modal-header">
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true" class="closbtdst">&times;</span>
                        </button>
                        <h4 class="modal-title modalheadtx" id="setemailpart">Complete Mustafa Faqiri’s driver profile</h4>
                        <h4
                                class="modal-title" id="myModalLabel" style="color: #818181;margin-top: 16px;margin-bottom: -29px;font-size: 12px">
                            Add payment structure, automatic payments, email alerts and more.
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12" style="margin-top: 10px;">
                            </div>



                            <div class="col-xs-6" >
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10"> <span>Payment type &nbsp;&nbsp; Per Mile <br> <br></span></div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <div class="row"  style="  border-bottom: 1px solid #d4d4d4;">
                                            <div class="col-sm-2"> <span> <i id="usdi" class="fa fa-usd"></i></span></div>
                                            <div class="col-sm-8"><input style="border: none;padding-bottom: 4px;" name="per_mile" type="text" placeholder="Amount"></div>

                                        </div>

                                    </div>
                               </div>

                                <br>
                            </div>

                            <div class="col-xs-6">

                            </div>
                        </div>


                    </div>
                    <div class="modal-footer contetn_center" style="padding-top: 20px;">
                        <a onclick="openNewModal('boostrapModalpermile','boostrapModal-12')" class="pointer" style="color: #000000;margin-top: 9px;margin-right: 196px;">
                            <i class="fa fa-angle-left" ></i> &nbsp;&nbsp;
                            Previous
                        </a>
                        <span

                                onclick="openNewModal('boostrapModalpermile','boostrapModal-300')"

                                class="btn btn-primary btn-sm waves-effect waves-light btndone">
                            Next
                        </span>
                    </div>
                </div>
            </div>

        </div>




        {{--Profit--}}
        <div class="modal fade" id="boostrapModalprofit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modalstyle" style="height: 380px;">
                    <div class="modal-header">
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true" class="closbtdst">&times;</span>
                        </button>
                        <h4 class="modal-title modalheadtx" id="setemailpart">Complete Mustafa Faqiri’s driver  Profit</h4>
                        <h4
                                class="modal-title" id="myModalLabel" style="color: #818181;margin-top: 16px;margin-bottom: -29px;font-size: 12px">
                            Add payment structure, automatic payments, email alerts and more.
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12 " style=" margin-top: -23px;"> <h5>Pay structure (percentage of profit)</h5></div>

                            <div class="col-lg-12 col-xs-12 " style="  margin-top: -116px; margin-bottom: 223px;height: 0px;">

                                <h5 class="slidertxt" style="top: 134px;position: relative;">Company</h5>
                                <h5 class="slidertxt"  style="top: 125px;left:2px;position: relative;">min</h5>
                                <h5 class="slidertxt" style="  top: 57px;left: 451px;position: relative;">Driver</h5>
                                <input id="ion-range-ss01" name="profit_percentage" value="50" class="js-range-slider">
                                <h5 class="slidertxt" style="top: -32px;left: 458px;position: relative;">max</h5>
                                <div id="ion-range-01"></div>

                            </div>


                        </div>

                    </div>
                    <div class="modal-footer contetn_center" style="padding-top: 20px;">
                        <a onclick="openNewModal('boostrapModalprofit','boostrapModal-12')" class="pointer" style="color: #000000;margin-top: 9px;margin-right: 196px;">
                            <i class="fa fa-angle-left" ></i> &nbsp;&nbsp;
                            Previous
                        </a>
                        <span

                                onclick="openNewModal('boostrapModalprofit','boostrapModal-300')"

                                class="btn btn-primary btn-sm waves-effect waves-light btndone">
                            Next
                        </span>
                    </div>
                </div>
            </div>

        </div>




        {{--revenue--}}
        <div class="modal fade" id="boostrapModalrevenue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content modalstyle" style="height: 380px;">
                    <div class="modal-header">
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true" class="closbtdst">&times;</span>
                        </button>
                        <h4 class="modal-title modalheadtx" id="setemailpart">Complete Mustafa Faqiri’s driver  revenue</h4>
                        <h4
                                class="modal-title" id="myModalLabel" style="color: #818181;margin-top: 16px;margin-bottom: -29px;font-size: 12px">
                            Add payment structure, automatic payments, email alerts and more.
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12 " style=" margin-top: -23px;"> <h5>Pay structure (percentage of revenue)</h5></div>

                            <div class="col-lg-12 col-xs-12 " style="  margin-top: -116px; margin-bottom: 223px;height: 0px;">

                                <h5 class="slidertxt" style="top: 134px;position: relative;">Company</h5>
                                <h5 class="slidertxt"  style="top: 125px;left:2px;position: relative;">min</h5>
                                <h5 class="slidertxt" style="  top: 57px;left: 451px;position: relative;">Driver</h5>
                                <input id="ion-range-ss02" name="percentage_revenue" value="50" class="js-range-slider">
                                <h5 class="slidertxt" style="top: -32px;left: 458px;position: relative;">max</h5>
                                <div id="ion-range-01"></div>

                            </div>


                        </div>

                    </div>
                    <div class="modal-footer contetn_center" style="padding-top: 20px;">

                        <a onclick="openNewModal('boostrapModalrevenue','boostrapModal-12')" class="pointer" style="color: #000000;margin-top: 9px;margin-right: 196px;">
                            <i class="fa fa-angle-left" ></i> &nbsp;&nbsp;
                            Previous
                        </a>
                        <span

                                onclick="openNewModal('boostrapModalrevenue','boostrapModal-300')"
                                class="btn btn-primary btn-sm waves-effect waves-light btndone">
                            Next
                        </span>
                    </div>
                </div>
            </div>

        </div>


    </form>


@endsection


@section('script')
    <script>

        // $('.radiobt').on('click',function(){
        //
        //     if($(this).val()==4){
        //         $('#boostrapModalfixed').modal('show')
        //
        //     }else if($(this).val()==2){
        //         $('#boostrapModalrevenue').modal('show')
        //     }
        //     else if($(this).val()==1){
        //         $('#boostrapModalpermile').modal('show')
        //     }else if($(this).val()==3){
        //         $('#boostrapModalprofit').modal('show')
        //     }
        // })
       $(".js-range-slider").ionRangeSlider({
        skin: "big",
        postfix: "%",
           min: 0
    });

       $(document).ready(function() {
           @if($errors->any())
                   {{--console.log(<?php  echo json_encode($errors->has('gas_card_number'))  ?>);--}}
           $("#boostrapModal-12").modal('show');
           @endif
       });


       $(document).ready(function(){

           $("#myInput").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $("#myTable tr").filter(function() {
                   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
               });
           });
       });


       function editdata($data){
           $('.myModalLabel23').html('Edit Driver');
           $('#setemailpart').html('Edit Driver');
           $('#edit').val(1);
           $('input[name="driver_name"]').val($data.driver_name);
           $('input[name="email"]').val($data.email);
           $('input[name="mobile"]').val($data.mobile);
           $('input[name="vehicle_number"]').val($data.vehicle_number);
           $('input[name="gas_card_number"]').val($data.gas_card_number);


           if($data.pay_status==1){$('#PerMile').prop('checked', true);
               $('input[name="per_mile"]').val($data.per_mile);}
           if($data.pay_status==2){
               $('#prsrevenue').prop('checked', true);

               var instance = $('#ion-range-ss02').data("ionRangeSlider");
               instance.update({
                   from: parseInt($data.percentage_revenue) //your new value
               });
           }
           if($data.pay_status==3){$('#prsprofit').prop('checked', true);
               var instance = $('#ion-range-ss01').data("ionRangeSlider");
               instance.update({
                   from: parseInt($data.profit_percentage) //your new value
               });
           }
           if($data.pay_status==4){ $('#Fixed').prop('checked', true);
              $('input[name="fixed"]').val($data.fixed);

           }







           $("#driver_id").val($data.id);

       }

       $('#addnew_driver11').on('click',function(){
           $('.myModalLabel23').html('Add a new driver');
           $('#setemailpart').html('Add a new driver');
           $('#edit').val(0);
       })

       function openpaystatus(){
           $('#boostrapModal-300').modal('hide')
           // alert($("input[name='paystatus']:checked").val())
           $radioval=$("input[name='paystatus']:checked").val()

           if($radioval==4){
               openNewModal('boostrapModal-12','boostrapModalfixed')
               // $('#boostrapModalfixed').modal('show')
               // $('#boostrapModal-300').modal('show')

           }else if($radioval==2){
               openNewModal('boostrapModal-12','boostrapModalrevenue')
               // $('#boostrapModalrevenue').modal('show')
           }
           else if($radioval==1){
               openNewModal('boostrapModal-12','boostrapModalpermile')
               // $('#boostrapModalpermile').modal('show')
           }else if($radioval==3){
               openNewModal('boostrapModal-12','boostrapModalprofit')
               // $('#boostrapModalprofit').modal('show')
           }
        }



    </script>
@endsection