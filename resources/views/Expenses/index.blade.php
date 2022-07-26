@extends('layout')
@section('page_css')
  <style>
    .dataTables_info,.dataTables_paginate {
      display: none !important;
    }
  </style>
@endsection

@section('content')
 <div class="main-content">
        <div class="row">
          <div class="m-4 custom_position">
            <h1 class="tableheadtxt">Expenses</h1>
            <h5 class="tablesecondhead" style="margin-top: 21px">
              Determine recurring expenses for your shipments
            </h5>
          </div>
        </div>
        <div class="row row-inline-block small-spacing">
          <div class="col-lg-6 col-xs-12">
            <!-- /.box-content -->
          </div>

          <div
            class="col-xs-12"
            style="background-color: white; margin-top: 65px"
          >
            <div class="box-content">
              <div class="row mb-20px text-center">
                <a href="" style="color: #0b74f7"   data-toggle="modal"
                   data-target="#boostrapModal-12">Edit</a>
              </div>
              <!-- /.box-title -->
              <div class="row">
                <div class="col-xs-6">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-bordered">
                      <thead>
                        <tr class="tbl-head-txt tableheadtx">
                          <th>Type</th>
                          <th class="hidden_ico">Cost</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="tablebodytxt3">
                          <td>Truck and insurance Daily</td>
                          <td>$ <span>{{$expense->truck_per_day+$expense->insurance_per_day}}</span> Per Day</td>
                        </tr>
                        <tr class="tablebodytxt3">
                          <td>Truck Miles</td>
                          <td>$<span>{{$expense->truck_per_mile_cost}}</span> Per Mile</td>
                        </tr>
                        <tr class="tablebodytxt3">
                          <td>Dispatch</td>
                          <td> <span>{{$expense->dispatch_bid_percentage}}</span> % of Bid</td>
                        </tr>
                        <tr class="tablebodytxt3">
                          <td>Factoring</td>
                          <td>{{$expense->factoring_bid_percentage}}% of Bid</td>
                        </tr>
                        <tr class="tablebodytxt3">
                          <td>Gas </td>
                          <td>${{$expense->per_gallon_gas_price}} Per Gallon</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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


    @csrf
    <div
            class="modal fade"
            id="boostrapModal-12"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content modalstyle" style="width: 500px;height:500px;">
          <div class="modal-header">
            <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
            >
              <span aria-hidden="true" class="closbtdst" style="top: -8px !important;">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">
              Edit Expense
            </h4>
            {{--<span class="modalheadtx2nd" style="font-size: 12px;">Add payment structure, automatic payments, email alerts and more.</span>--}}
          </div>
          <form action="{{route('expense_edit')}}" method="post">
            @csrf
          <div class="modal-body tablebodytxt3">
            <div class="row">
              <div class="col-xs-6"><td>Truck per Day</td>
                <br>
                @if ($errors->has('truck_per_day'))
                  <span class="text-danger txst1">{{ $errors->first('truck_per_day') }}</span>
                @endif
              </div>
              <div class="col-xs-1"></div>
              <div class="col-xs-4"><input type="text" name="truck_per_day" value="{{$expense->truck_per_day}}" class="truck_per_day btn_input_style tablebodytxt33" ></div>
            </div>
            <div class="row">
              <div class="col-xs-6"><td>
                  Insurance Per Day
                  <br>
                  @if ($errors->has('insurance_per_day'))
                    <span class="text-danger txst1">{{ $errors->first('insurance_per_day') }}</span>
                  @endif

                </td></div>
              <div class="col-xs-1"></div>
              <div class="col-xs-4">
                <input type="text" name="insurance_per_day" value="{{$expense->insurance_per_day}}" class="insurance_per_day btn_input_style tablebodytxt33" >

              </div>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <td>Gas Per Gallon  Price</td>
                <br>
                @if ($errors->has('per_gallon_gas_price'))
                  <span class="text-danger txst1">{{ $errors->first('per_gallon_gas_price') }}</span>
                @endif


              </div>
              <div class="col-xs-1"></div>
              <div class="col-xs-4">
                <input type="text" name="per_gallon_gas_price" value="{{$expense->per_gallon_gas_price}}"  class="per_gallon_price btn_input_style tablebodytxt33" >

              </div>

            </div>


            <div class="row">
              <div class="col-xs-6"><td>Truck Per Mile Cost</td>

                <br>
                @if ($errors->has('truck_per_mile_cost'))
                  <span class="text-danger txst1">{{ $errors->first('truck_per_mile_cost') }}</span>
                @endif

              </div>
              <div class="col-xs-1"></div>
              <div class="col-xs-4"><input type="text" name="truck_per_mile_cost" value="{{$expense->truck_per_mile_cost}}" class="truck_per_mile btn_input_style tablebodytxt33" ></div>
            </div>
            <div class="row">
              <div class="col-xs-6"><td>Dispatch Bid Percentage</td>
                <br>
                @if ($errors->has('dispatch_bid_percentage'))
                  <span class="text-danger txst1">{{ $errors->first('dispatch_bid_percentage') }}</span>
                @endif
              </div>
              <div class="col-xs-1"></div>
              <div class="col-xs-4"><input type="text" name="dispatch_bid_percentage" value="{{$expense->dispatch_bid_percentage}}" class="dispatch_bid_per btn_input_style tablebodytxt33" ></div>
            </div>
            <div class="row">
              <div class="col-xs-6"><td>Factoring Bid Percentage</td> <br>
                @if ($errors->has('factoring_bid_percentage'))
                  <span class="text-danger txst1">{{ $errors->first('factoring_bid_percentage') }}</span>
                @endif
              </div>
              <div class="col-xs-1"></div>
              <div class="col-xs-4"><input type="text" name="factoring_bid_percentage" value="{{$expense->factoring_bid_percentage}}" class="fac_bid_per btn_input_style tablebodytxt33" ></div>
            </div>









            <div class="col-lg-12 col-xs-12 text-center" style="margin-top: 55px">

              <button

                      type="submit"
                      class="btn btn-primary btn-sm waves-effect waves-light btndone"
                      style="margin-bottom: 61px;width:261px;"
                      onclick="openNewModal('boostrapModal-12','boostrapModal-300')"
              >
                Save Changes
              </button>
            </div>


          </div>
          </form>
        </div>
      </div>
    </div>




@endsection
@section('script')


  <script>
   $(document).ready(function(){
     @if($errors->any())
     $("#boostrapModal-12").modal('show');
     @endif

   })
  </script>
  @endsection

