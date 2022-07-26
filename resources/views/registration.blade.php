@extends('layout')
@section('page_css')
    <style>
        .deletebtn{
            border-radius: 18px;
            padding: 3px 32px;
            line-height: 30px;
        }
    </style>
    @endsection
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="m-4 custom_position">
                <h1 class="tableheadtxt">Registration</h1>
                <h5 class="tablesecondhead" style="margin-top: 25px">
                    Only registered users can access this system
                </h5>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button
                                style="margin-right: 60px;"
                                class="btn thm-btn margin-bottom-10 waves-effect waves-light addbtntxtblack"
                                data-toggle="modal"
                                data-target="#boostrapModal-12"
                        >
                            New User
                        </button>
                    </div>
                </div>


                <div class="row">

                    <div class="table-responsive" style="margin-top: 40px !important;margin-right: 67px;">
                        <table class="table table-bordered tablesutom">
                            <thead>
                            <tr class="tbl-head-txt tableheadtx">

                                <th>SI</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Created by</th>
                                <th>Action</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                    function name($id){
                                     $data=\App\Models\User::where('id',$id)->first();
                                     if($data){}
                                        return $data->name;
                                    }


                            $i=1; ?>


                            @foreach($userlist as $data)


                                <tr class="tablebodytxt3">

                                    <td>{{$i++}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>
                                        @if($data->role==1)
                                            Super Admin
                                            @else
                                             Admin
                                            @endif
                                    </td>
                                    <td>{{name($data->created_by)}}</td>
                                    <td class="ieditbtn">
                                        <a   data-toggle="modal"
                                             data-target="#boostrapModal-10" onclick="editdata({{json_encode($data)}})"> <i class="fa fa-edit" style="font-size: 23px;cursor: pointer"></i> </a>
                                        <a onclick="ConfirmDelete(this)" data-href="{{url('delete_user/'.$data->id)}}" href="javascript:void(0)"> <i class="ico mdi mdi-delete" style="font-size: 23px;color:#ff0052;cursor: pointer"></i> </a>

                                        {{--<a id="delete{{$data->id}}" class="delete{{$data->id}}" href="{{url('delete_user/'.$data->id)}}">s</a>--}}
                                      </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <input type="hidden" id="deleteuser_id">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('page_modals')



        <div
                class="modal fade"
                id="boostrapModal-12"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content modalstyle" style="width: 480px;height:655px;margin-left: 70px;">
                    <div class="modal-header">
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true" class="closbtdst">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Add a new User
                        </h4>
                        {{--<span class="modalheadtx2nd" style="font-size: 12px;">Add payment structure, automatic payments, email alerts and more.</span>--}}
                    </div>
                    <div class="modal-body">

                        <form action="{{route('registration_insert')}}" method="post">
                            @csrf

                        <div class="row">
                            <div class="col-xs-12 inputpadding" style="margin: auto">

                                <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Name
                                    </label>
                                    <input
                                            type="text"
                                            name="name"
                                            class="form-control logininputbox"
                                            id="name"
                                            placeholder="Name"
                                            required
                                    />
                                    @error('name')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>  <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Email
                                    </label>
                                    <input
                                            type="email"
                                            name="email"
                                            class="form-control logininputbox"
                                            id="exampleInputEmail12"
                                            placeholder="Email"
                                    />
                                    @error('email')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Phone
                                    </label>
                                    <input
                                            type="text"
                                            name="phone"
                                            class="form-control logininputbox"
                                            id="phone"
                                            placeholder="Phone"
                                            required
                                    />
                                    @error('phone')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group" >
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Role
                                    </label>
                                    <select name="role" id="" class="form-control logininputbox" required>
                                        <option value="">SELECT</option>
                                        <option value="1">System Administrator</option>
                                        <option value="2">Dispatcher</option>
                                        <option value="3">Driver</option>

                                    </select>
                                    @error('role')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Password
                                    </label>
                                    <input
                                            type="text"
                                            name="password"
                                            class="form-control logininputbox"
                                            id="password"
                                            placeholder="Password"
                                            required
                                    />
                                </div>
                                </div>
                                </div>



                        <div class="col-lg-12 col-xs-12 text-center" style="position: relative;top: 31px;">

                            {{--<button--}}

                                    {{--type="submit"--}}
                                    {{--class="btn btn-primary btn-sm waves-effect waves-light btndone"--}}
                                    {{--style="margin-bottom: 61px;width: 340px;"--}}

                            {{-->--}}
                                {{--Save--}}
                            {{--</button>--}}

                            <button
                                    type="submit"
                                    class="btn btndone1"
                                    style="margin-bottom: 61px;width: 340px;"

                            >
                                Save
                            </button>
                        </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>


        {{--edit user--}}
        <div
                class="modal fade"
                id="boostrapModal-10"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myModalLabel"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content modalstyle" style="width: 480px;height:655px;margin-left: 70px;">
                    <div class="modal-header">
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true" class="closbtdst">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Edit User Data
                        </h4>
                        {{--<span class="modalheadtx2nd" style="font-size: 12px;">Add payment structure, automatic payments, email alerts and more.</span>--}}
                    </div>
                    <div class="modal-body">

                        <form action="{{route('edit_user')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-xs-12 inputpadding" style="margin: auto">

                                <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Name
                                    </label>
                                    <input
                                            type="text"
                                            name="name"
                                            class="form-control logininputbox name1"
                                            required



                                    />
                                    @error('name')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>  <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Email
                                    </label>
                                    <input
                                            type="email"
                                            name="email"
                                            class="form-control logininputbox email"

                                            placeholder="Email"

                                    />
                                    @error('email')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>  <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Phone
                                    </label>
                                    <input
                                            type="text"
                                            name="phone"
                                            class="form-control logininputbox phone"

                                            placeholder="Phone"

                                    />
                                    <input type="hidden" name="id" id="setid">
                                    @error('phone')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group" id="id_100">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Role
                                    </label>
                                    <select name="role" id="" class="form-control logininputbox" required>
                                        <option value="">SELECT</option>
                                        <option value="2">Admin</option>
                                        <option value="1">Super Admin</option>

                                    </select>
                                    @error('role')
                                    <div class="text-danger inputerror">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail12 " class="loginname"
                                    >Password
                                    </label>
                                    <input
                                            type="text"
                                            name="password"
                                            class="form-control logininputbox"
                                            id="passworddt"
                                            placeholder="Password"

                                    />
                                </div>
                                </div>
                                </div>



                        <div class="col-lg-12 col-xs-12 text-center" style="position: relative;top: 31px;">

                            <button

                                    type="submit"
                                    class="btn btn-primary btn-sm waves-effect waves-light btndone"
                                    style="margin-bottom: 61px;width: 386px;"
                                    onclick="openNewModal('boostrapModal-12','boostrapModal-300')"
                            >
                                Save
                            </button>
                        </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>





        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaldelete">--}}
        {{--Launch demo modal--}}
        {{--</button>--}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" >
                <div class="modal-content" style="  width: 385px;
  border-radius: 37px;
  margin-left: 134px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style=" padding-bottom: 2px;">
                        <h3 style="text-align: center">Are you sure you want to delete?</h3>
                    </div>
                    <div class="modal-footer" style="display: flex;justify-content: center">
                        <a href="" id="deleteLink" class="btn deletebtn" style="background:#F24221;color:white">Yes</a>
                        <button type="button" class="btn btn-secondary deletebtn" style="color:white;background: #837a7a;" data-dismiss="modal">No</button>

                    </div>
                </div>
            </div>
        </div>


@endsection

@section('script')
    <script>
        $(document).ready(function(){
            @if($errors->any())
                $('#boostrapModal-12').modal('show')

            @endif

        })

        function editdata($data){
            $('.name1').val($data.name);
            $('.phone').val($data.phone);
            $('.email').val($data.email);
            $('#setid').val($data.id);

            $('#passworddt').val('');


            $("div#id_100 select").val($data.role);
           }

        function ConfirmDelete(button){
            let link = $(button).attr('data-href');
            $("#exampleModaldelete #deleteLink").attr('href', link);
            $("#exampleModaldelete").modal('show');
        }

    </script>

@endsection





