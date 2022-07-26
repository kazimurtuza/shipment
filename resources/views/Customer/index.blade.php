@extends('layout')
@section('page_css')
  <style>

    .select2-container {
      width: 231px !important;
    }
    .btntx{
      font-weight: 400;
      font-size: 12px;
      line-height: 17px;
      margin-top: 11px !important;
    }

    .hidenagen{
      display: none;
    }
    .customerlistbt>.select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #020202;
      border-radius: 10px;
    }
    .labposi{
      left: -76px;
      top: 18px;
    }
    .agetnumber{
      position: absolute;
      background: blue;
      padding: 4px;
      font-size: 10px;
      width: 20px;
      height: 19px;
      border-radius: 50%;
      color: white;
      text-align: center;
      top: 14px;
      left: 96px;
      line-height: 11px;
    }
    .agetnumberedit{
      position: absolute;
      background: blue;
      padding: 4px;
      font-size: 10px;
      width: 20px;
      height: 19px;
      border-radius: 50%;
      color: white;
      text-align: center;
      top: 14px;
      left: 96px;
      line-height: 11px;
    }
      .margintopsm{
          margin-top: -15px !important;
      }
  </style>
  @endsection
@section('content')

<div class="main-content">

        <div class="row">

          <div class="m-4 custom_position">
            <h1 class="tableheadtxt">Customer</h1>
            <h5 class="tablesecondhead" style="margin-top: 21px">
              Add, Change or manage all your customers.

            </h5>
          </div>
        </div>
        <div class="row row-inline-block small-spacing">
          <div class="col-xs-12" style="background-color: white">
            <div class="box-content">
              <div class="row mb-20px marginfix">
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
                    data-target="#boostrapModal-1"
                    onclick="addnewuser()"
                  >
                    New Customer
                  </button>
                </div>
              </div>
              <!-- /.box-title -->

              <div class="table-responsive">
                <table id="table_id" class="table table-striped table-bordered" >
                  <thead>
                    <tr class="tbl-head-txt tableheadtx">
                      <th style="width: 246px;">Company</th>
                      <th class="hidden_ico" style="background-image:none !important;" >MC#</th>
                      <th class="hidden_ico" style="background-image:none !important;" >Tracking</th>
                      <th class="hidden_ico" style="background-image:none !important;" >Contacts</th>
                        <th class="hidden_ico" style="background-image:none !important;" >Shipments</th>
                      <th class="hidden_ico" style="background-image:none !important;" >Total
                          bookings</th>
                        <th class="hidden_ico" style="background-image:none !important;" >Paid Invoice</th>

                      <th class="hidden_ico" style="background-image:none !important;" >Balance</th>

                        @if(getroleid()==1)
                      <th class="hidden_ico" style="background-image:none !important;" >Action</th>
                            @endif
                    </tr>
                  </thead>
                  <tbody id="myTable">
                  <?php

                  function getinfo($customer_id){
                   $totalshipment= \App\Models\shipment::where('customer_id',$customer_id)->count();
                    $totalbid=\App\Models\shipment::where('customer_id',$customer_id)->sum('bid_price');

                    return ['total_ship'=>$totalshipment,'total_bid'=>$totalbid];
                  }


                  ?>

                  @foreach($customer_list as $data)
                    <?php $getdata=getinfo($data->id)?>
                    <tr class="tablebodytxt3">
                      <td>{{$data->company_name}}</td>
                      <td>{{$data->mc_number}}</td>
                      <td>{{$data->tracking_email}}</td>
                      <td>{{$data->allcustomeragent->count()}}</td>
                        <td  class="text-center" >{{$getdata['total_ship']}}</td>
                      <td>${{$data->shipmentdetails->where('is_cancel',0)->sum('bid_price')}}</td>
                      <td>${{$data->shipmentdetails->where('is_cancel',0)->where('is_paid',1)->sum('bid_price')}}</td>
                      <td>${{$getdata['total_bid']}}</td>
                        @if(getroleid()==1)
                        <td class="ieditbtn">
                            <a   data-toggle="modal"
                                 data-target="#boostrapModal-1" onclick="editdata({{json_encode($data)}})"> <i class="fa fa-edit" style="  margin-left: 30px;font-size: 28px;cursor: pointer"></i> </a>
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




<div
      class="modal fade"
      id="boostrapModal-1"

      role="dialog"
      aria-labelledby="myModalLabel"
    >

      <div class="modal-dialog midmodel" role="document">
        <div class="modal-content modalstyle">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true" class="closbtdst">&times;</span>
            </button>
            <!-- <h4 class="modal-title" id="myModalLabel">Add a new customer</h4>
            <span class="secondtitle">
              Add a new customer We will send pickup and delivery updates to
              your customers.
            </span> -->

            <h4 class="modal-title modalheadtx" id="myModalLabel">
              Add a new customer
            </h4>
            <h5 class="modal-title modalheadtx2nd" style="  font-size: 11px;
  line-height: 6px;
  margin-top: 23px !important;" id="myModalLabel1">
              Add a new customer We will send pickup and delivery updates to
              your customers.
            </h5>
          </div>

          <form action="{{route('insert_customer')}}" method="post">
            @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-6 col-md-offset-3">
                <label class="form-label labelstyle" for="formControlReadonly"
                  >Company Name*</label
                >
                <input name="company_name" class="form-control input_radius" type="text" required />
                @error('company_name')
                <div class="text-danger inputerror">{{ $message }}</div>
                @enderror
              </div>
                <input type="hidden" value="{{ old('edit') }}" name="edit" id="edit">
                <input type="hidden" value="{{ old('id') }}" name="id" id="custom_id">
              <div
                class="mt-4 col-xs-8 col-md-offset-2"
                style="margin-top: 20px"
              >
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <input type="radio" value="1" id="id1"  name="customer_type" checked />
                    <span class="radio_txt">Broker</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <input type="radio" value="2" id="id2"  name="customer_type" />
                    <span class="radio_txt">Shipper</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <input type="radio" value="3" id="id2"   name="customer_type" />
                    <span class="radio_txt">Forwarder</span>
                  </div>
                </div>
              </div>

              <div class="col-xs-6 col-md-offset-3">
                <label class="form-label labelstyle" for="formControlReadonly"
                  >MC Number *</label>
                <input
                  class="form-control input_radius"
                  name="mc_number"
                  type="text"
                  required
                />
                @error('mc_number')
                <div class="text-danger inputerror">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-xs-6 col-md-offset-3">
                <label class="form-label labelstyle" for="formControlReadonly"
                  >Tracking Email *</label
                >
                <input
                  class="form-control input_radius"
                  name="tracking_email"
                  type="email"
                  required
                />
                @error('tracking_email')
                <div class="text-danger inputerror">{{ $message }}</div>
                @enderror
              </div>


              <div id="contactedit" class="col-xs-6 col-md-offset-3 customerlistbt" style="margin-top: 30px;display: none" >
                <i style="position: absolute;
                cursor: pointer;
  right: -9px;
  top: 13px;
  font-size: 18px;
  color: blue !important;" class="fa fa-plus-circle"  data-toggle="modal" data-target="#exampleModaledit"></i>

                <select  class="form-control select2step22 cutomername" id="contactnamelistedit">
                  <option value="s">Contacts edit</option>
                </select>

                <span class="agetnumberedit">0</span>

              </div>

              <div id="contacteadd" class="col-xs-6 col-md-offset-3 customerlistbt" style="margin-top: 30px" >
                <i style="position: absolute;
                cursor: pointer;
  right: -9px;
  top: 13px;
  font-size: 18px;
  color: blue !important;" class="fa fa-plus-circle"  data-toggle="modal" data-target="#exampleModal"></i>

                <select  class="form-control select2step22 cutomername" id="contactnamelist">
                  <option value="s">Contacts</option>
                </select>

                <span class="agetnumber">0</span>

              </div>




                <br>
                <br>
                <br>



             
              <div
                class="mt-4 col-xs-8 col-md-offset-2"
                style="margin-top: 20px"
              >
                <div class="row">
                  <div class="col-xs-12" style="margin-bottom: -31px !important;">
                    <strong>Billing</strong>
                    <div id="agentinputlist">
                    </div>
                    <br><br>
                  </div>
                  <div class="col-xs-4 text-center">
                    <input type="radio" value="1" id="prid1" name="process_type" checked />
                    <span class="radio_txt">Factor</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <input type="radio" value="2" class="paiddata" id="prid2"  name="process_type" />
                    <span class="radio_txt">Quickpay</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <input type="radio" value="3" id="prid3" name="process_type" />
                    <span class="radio_txt">Direct</span>
                  </div>
                </div>
              </div>
                <div class="col-xs-8 col-lg-offset-2" style="display: none" id="quick2">
              <div class="row">
                <div class="col-xs-8">
                  <label class="form-label labelstyle" for="formControlReadonly"
                  >Accounting Email *</label
                  >
                  <input
                          id="accountemail2"
                          class="form-control input_radius acccount_email accountemail2"
                          name="acccount_email2"
                          type="email"



                  />
                  @error('tracking_email')
                  <div class="text-danger inputerror">{{ $message }}</div>
                  @enderror

                </div>

                <div class="col-xs-3" style="padding: 0px;"  >
                  <label class="form-label labelstyle" style="opacity: 0" for="formControlReadonly"
                  >*</label
                  >
                  <input

                          class="form-control input_radius pay_percen"
                          name="pay_percent"
                          type="number"
                          step="any"
                          placeholder="%*"

                  />
                  @error('tracking_email')
                  <div class="text-danger inputerror">{{ $message }}</div>
                  @enderror
                </div>

                  <div class="col-sm-12 modalheadtx2nd btntx">Invoices will be sent to this email once the shipment is delivered.</div>



              </div>

                    </div>
                <div class="col-xs-8 col-lg-offset-2" style="display: none" id="direct">
              <div class="row">
                <div class="col-xs-10 col-lg-offset-1" >
                  <label class="form-label labelstyle" for="formControlReadonly"
                  >Accounting Email *</label
                  >
                  <input
                          id="accountemail3"
                          class="form-control input_radius acccount_email"
                          name="acccount_email"
                          type="email"

                  />
                  @error('tracking_email')
                  <div class="text-danger inputerror">{{ $message }}</div>
                  @enderror
                  <div class="modalheadtx2nd btntx">Invoices will be sent to this email once the shipment is delivered.</div>
                </div>


              </div>

                    </div>

            </div>
          </div>
          <div class="modal-footer contetn_center">
            <button
              type="submit"
              class="btn btn-primary btn-sm waves-effect waves-light input_radius btntxt"
            >
              Complete
            </button>
          </div>

          </form>
        </div>
      </div>
    </div>










<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content" style="  margin-top: 66%;
  left: 100%;
  border-radius: 12px;">
      <div class="modal-header" style="  border-bottom: 1px solid #dcdada;">
        <h5 class="modal-title" id="exampleModalLabel">Add a contact</h5>
        <button type="button" class="close" style="  margin-top: -20px !important;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center !important;">
    <div class="row">
      <div class="col-xs-12 ">
        <label class="form-label labelstyle labposi" for="formControlReadonly">Name *</label>
        <input
                id="agent_name"
                class="form-control input_radius"
                type="text"

        />
        @error('agent_name')
        <div class="text-danger inputerror">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-xs-12">
        <label class="form-label labelstyle labposi" for="formControlReadonly">Email *</label>
        <input
                id="agent_email"
                class="form-control input_radius"
                type="email"
        />
        @error('agent_email')
        <div class="text-danger inputerror">{{ $message }}</div>
        @enderror


      </div>
      <br>
      <br>


    </div>
        <br>
        <br>
        <button onclick="agetadd()" type="button" style="margin: auto;font-size: 13px;
          background: #2f80ed;
          color:white;
  margin: auto;
  padding: 2px 41px;
  border-radius: 10px;" class="btn ">Add</button>
      </div>

    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-sm" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content" style="  margin-top: 66%;
  left: 100%;
  border-radius: 12px;">
      <div class="modal-header" style="  border-bottom: 1px solid #dcdada;">
        <h5 class="modal-title" id="exampleModalLabel">Add a contact</h5>
        <button type="button" class="close" style="  margin-top: -20px !important;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center !important;">
        <div class="modal-body" style="text-align: center !important;">
          <form action="{{route('agent_add')}}}" method="post" onsubmit="submitcustomeragent(this)">
            <div class="row">
              <input type="hidden" id="customerget_id" name="customer_id">
              <div class="col-xs-12 ">
                <label class="form-label labelstyle labposi" for="formControlReadonly">Name *</label>
                <input
                        class="form-control input_radius"
                        name="agent_name"
                        id="agent_nameid"
                        type="text"
                        required
                />
                @error('agent_name')
                <div class="text-danger inputerror">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-xs-12">
                <label class="form-label labelstyle labposi" for="formControlReadonly">Email *</label>
                <input
                        class="form-control input_radius"
                        name="agent_email"
                        id="agent_emailid"
                        type="email"
                        required
                />
                @error('agent_email')
                <div class="text-danger inputerror">{{ $message }}</div>
                @enderror
              </div>
              <br>

            </div>
            <br>
            <br>
            <button type="submit" style="margin: auto; font-size: 12px;
          background: #2f80ed;
          color:white;
  margin: auto;
  padding: 2px 41px;
  border-radius: 10px;" class="btn ">Add</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>




@endsection

@section('script')
  <script>
    $('#quick2').hide()
    $('#direct').hide()
    $(document).ready(function() {
      @if($errors->any())
        $("#boostrapModal-1").modal('show');
      @endif
      @if(request()->open == 'createModal')
        $("#boostrapModal-1").modal('show');
        $('.select2step22').select2({
        placeholder: "Select"
      });
      @endif



      $('input[name="process_type"]').on('change',function(){
        $('#quick2').hide()
        $('#direct').hide()
        $('.acccount_email').attr("required", false);
        $('.pay_percen').attr("required", false);


        let id=$(this).val();

        if(id==2){
          $('#direct').hide()
          $('#quick2').show()
          $('input[name="acccount_email"]').val('')
          $('input[name="pay_percent"]').val('')


          $('.accountemail2').attr("required", true);
          $('.pay_percen').attr("required", true);
        }
          if(id==3){
            $('input[name="acccount_email"]').val('')
            $('input[name="acccount_email2"]').val('')
            $('input[name="pay_percent"]').val('')

              $('#direct').show()
              $('#quick2').hide()


              $('.pay_percen').attr("required", false);
            $('#accountemail3').attr("required", true);
          }

        else{
          $('#quick').hide().removeAttr('required');

          $('.acccount_email').attr("required", false);
          $('.pay_percen').attr("required", false);
        }


      })

    });



    $('input[name="name_of_your_radiobutton"]:checked').val();


    $(document).ready(function(){

      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    function editdata($data){

      $('#contactedit').show()
      $('#contacteadd').hide()

        $('#quick2').hide()
        $('#direct').hide()
        $('.modalheadtx').html('Edit Customer');
        $('#edit').val(1);
        $('input[name="company_name"]').val($data.company_name);
        $('input[name="tracking_email"]').val($data.tracking_email);
        $('input[name="agent_name"]').val($data.agent_name);
        $('input[name="mc_number"]').val($data.mc_number);
        $('input[name="agent_email"]').val($data.agent_email);
        $('input[name="name_of_your_radiobutton"]:checked').val();

            let typeid='id'+$data.customer_type;
            $("#"+typeid).prop("checked", true);
            let prossid='prid'+$data.process_type;
            $("#"+prossid).prop("checked", true);

        $('input[name="acccount_email"]').val($data.accounting_email)
        $('input[name="acccount_email2"]').val($data.accounting_email)
        $('input[name="pay_percent"]').val($data.pay_percent)

      if($data.process_type==2){

        $('#quick2').show();
      }else{
        $('#quick2').hide();
      }
      if($data.process_type==3){

        $('#direct').show();
      }else{
        $('#direct').hide();
      }

     $("#custom_id").val($data.id);
     $("#customerget_id").val($data.id);

      $.ajax({
        url: "{{url('customer_agentlist')}}",
        type: "get",
        data: {
          data_id:$data.id,
        },
        success: function(response) {
          $('#contactnamelistedit').empty();
          var count=0;
          response.map(function(data){
            count+=1
            $('#contactnamelistedit').append(`     <option value="${data.id}" >${data.agent}</option>`)

          })
          $('.agetnumberedit').html(count)

          $('#exampleModalcontact').modal('hide');
        },
        error: function(xhr) {
          //Do Something to handle error
        }});


      let agent_name=$('#agent_nameid').val('');
      let agent_email=$('#agent_emailid').val('');




      $('.select2step22').select2({
        placeholder: "Select"
      });


    }

    function addnewuser(){
      $('#contactedit').hide()
      $('#contacteadd').show()
      $('#quick').hide();
      $('input[name="acccount_email"]').val('')
      $('input[name="pay_percent"]').val('')
        $('.modalheadtx').html('Add a new customer');
        $('#edit').val(0);
        $('input[name="company_name"]').val('');
        $('input[name="tracking_email"]').val('');
        $('input[name="agent_name"]').val('');
        $('input[name="mc_number"]').val('');
        $('input[name="agent_email"]').val('');
        $('input[name="acccount_email2"]').val('')
        $("#prid1").prop("checked", true);
        $("#id1").prop("checked", true);


      $('.acccount_email').attr("required", false);
      $('.pay_percen').attr("required", false);


      // select2step

      $('.select2step22').select2({
        placeholder: "Select"
      });

    }

    function agetadd(){

      let agent_name= $('#agent_name').val()
      let agent_email=$('#agent_email').val()
      $('#agent_name').val('')
      $('#agent_email').val('')

              $('#agentinputlist').append(`
               <input type="hidden" class="agent_namelist" name="agent_name[]" value="${agent_name}" class="form-control input_radius" type="email" />
               <input type="hidden" name="agent_email[]" value="${agent_email}" class="form-control input_radius" type="email" />

`)

      let i=0;

      $('.agent_namelist').map(function(e){
        i+=1;
      })
      $('#contactnamelist').append(` <option value="s">${agent_name} <br><span style="font-size:9px!important;">${agent_email}</span></option>`)

      $('.agetnumber').html(i)

    }


    function submitcustomeragent(){
      event.preventDefault()
      let customer_id=$('#customerget_id').val();
      let agent_name=$('#agent_nameid').val();
      let agent_email=$('#agent_emailid').val();
      let token = "{{ csrf_token()}}";

        $.ajax({
          url: "{{url('agent_add')}}",
          type: "post",
          data: {
            _token:token,
            customer_id:customer_id,
            agent_name:agent_name,
            agent_email:agent_email,
          },
          success: function(response) {
            $('#contactnamelistedit').empty();
            var count=0;
            response.map(function(data){
              count+=1
              $('#contactnamelistedit').append(`     <option value="${data.id}" >${data.agent}</option>`)

            })
            $('.agetnumberedit').html(count)

            $('#exampleModaledit').modal('hide');



            let agent_name=$('#agent_nameid').val('');
            let agent_email=$('#agent_emailid').val('');
          },
          error: function(xhr) {
            //Do Something to handle error
          }});





    }








  </script>
@endsection