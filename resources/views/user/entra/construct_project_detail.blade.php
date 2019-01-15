@extends('layouts.dashboard')
@section('content')
    <!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Project Detail
@endsection
@section('bg')
    {{asset('images/about_banner.jpg')}}@endsection
@if(\Illuminate\Support\Facades\Session::has('no_auth'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    You need to register or login to see projects details
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif
@if(\Illuminate\Support\Facades\Session::has('no_auth'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    You need to register or login to see projects details
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif

<div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
    <div class="col-xs-12">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="note note-success">
                <h4 class="block">Successful</h4>

                <p>  {{\Illuminate\Support\Facades\Session::get('success')}}

                </p>
            </div>
        @endif
        <h1 class="page-title page_title">
            Project Detail <span class="pannel-title">Upload By
                @php
                    $user=DB::connection('mysql_service')->table('users')->where('id',$data->user_id)->first();
                @endphp
                {{ $user->name }}
                @if($data->confirm != 'done')
                    <span class="label label-warning"> Open </span>
                @else
                    <span class="label label-danger"> Close </span>
                @endif

                </span>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="col-xs-12">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="">

                    @if(\Illuminate\Support\Facades\Session::has('send'))
                        <div class="note note-success">
                            <h4 class="block">Successful</h4>

                            <p> Successfully Send

                            </p>
                        </div>
                    @endif
                    <div class="row ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="col-md-12" style="background-color:white;">
                            <div class="portlet-title">

                                {{--<div class="caption">--}}
                                {{--<i class="fa fa-gift"></i>--}}
                                {{--</div>--}}


                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="col-xs-12 col-sm-12 col-md-12" style="height:auto;">
                                    <strong>{{$data->name}}</strong> <br/>
                                    {!! $data->description !!}
                                    <br>
                                </div>

                                <strong style="color:#67809f;">
                                    <span style="color:#36c6d3">Post Date :</span> {{$data->created_at}}
                                </strong>
                                <br>
                                <strong style="color:#67809f;">
                                    <span style="color:#36c6d3">Phone No :</span> {{$data->phone}}
                                </strong>
                                <br>

                                <strong style="color:#67809f;">
                                    <span style="color:#36c6d3">Address :</span> {{$data->address}}
                                </strong>
                            </div>
                            <div class="col-xs-12">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <?php
                                $get_draw1 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $data->id], ['position', '=', 1]]);
                                ?>
                                @if($get_draw1->count() != 0 )
                                    <a href="{{'http://localhost/constructback/public/user_attachments/'.$get_draw1->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw1->first()->file_name}}"> Draw 1
                                        <span class="fa fa-download"></span></a>
                                @else
                                @endif
                                <?php
                                $get_draw2 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $data->id], ['position', '=', 2]]);
                                ?>
                                @if($get_draw2->count() != 0 )
                                    <a href="{{'http://localhost/constructback/public/user_attachments/'.$get_draw2->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw2->first()->file_name}}"> Draw 2
                                        <span class="fa fa-download"></span>
                                    </a>
                                @else

                                @endif
                                <?php
                                $get_draw3 = DB::connection('mysql_service')->table('attachment')->where([['project_id', '=', $data->id], ['position', '=', 3]]);
                                ?>
                                @if($get_draw3->count() != 0 )
                                    <a href="{{'http://localhost/constructback/public/user_attachments/'.$get_draw3->first()->file_name}}"
                                       class="btn blue" download="{{$get_draw3->first()->file_name}}"> Draw 3
                                        <span class="fa fa-download"></span></a>
                                @else
                                @endif

                                <br>
                                <br>
                                <br>
                                <?php
                                $com_id = \Illuminate\Support\Facades\DB::table('company')->where('user_id', Auth::user()->id)->first();
                                $check_downloaded = \Illuminate\Support\Facades\DB::connection('mysql_service')->table('upload_form_for_quo')->where([['com_id', '=', $com_id->id], ['project_id', '=', $data->id]]);
                                ?>

                                @if(!empty($check_downloaded->count()))


                                @else

                                    <form action="{{url('entra/upload_quotation')}}" method="post"
                                          enctype="multipart/form-data">
                                        <label>To upload Quotation</label><br>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="file" name="quotation_file"/>
                                            <input type="hidden" name="pid" value="{{$data->id}}"/>
                                            <input type="hidden" name="cid" value="{{$com_id->id}}"/>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="submit" name="quotation_file"/>
                                        </div>
                                    </form>
                                    <br>
                                    <br>
                                    <br>


                                @endif


                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <a href="{{url('public/users/entro/qfile/forop/'.$data->quotation_file)}}"
                                       class="btn yellow" style="width:60%;"> Download Quotation form
                                        <span class="fa fa-envelope  "></span></a>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <a href="{{url('entra/cancel_request/'.$data->id)}}" class="btn green"
                                       style="width:60%;"> Cancel Request <span class="fa fa-paper-plane"></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="col-md-12">

            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> Sending Quotation Table</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn green  btn-outline dropdown-toggle"
                                            data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;"> <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> <i class="fa fa-file-pdf-o"></i> Save as PDF
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"> <i class="fa fa-file-excel-o"></i> Export to
                                                Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $data_q=DB::table('mail_for_project')->where([['project_id','=',$data->id],['from_user','=',Auth::user()->id]])->orWhere([['project_id','=',$data->id],['to_user','=',Auth::user()->id]])->get();
                    @endphp
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th> Name</th>
                            <th> Description</th>
                            <th> Status</th>
                            <th> Send Date</th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($message_data as $dq)
                            <tr class="odd gradeX">
                                <td>
                                {{$dq->id}}

                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{str_limit($dq->message,100)}}
                                </td>

                                <td>
                                    @if($data->confirm !='done')
                                        Open
                                    @else
                                        Close
                                    @endif
                                </td>
                                <td class="center"> {{  Carbon\Carbon::parse($dq->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{url('entra/construct_mail_view/'.$dq->id)}}"
                                       class="btn btn-small btn-success">View</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
            <!--   </div> -->

            <!-- END VALIDATION STATES-->
        </div>
        <div class="row">&nbsp;</div>
    </div>
</div>

<div class="col-xs-12" style="position:relative;background-color:#e4e44d;height:40%;width:100%;">
    <div style="margin-left:2%;margin-right:2%;margin-top:2%;">
        <div class="col-xs-6 col-sm-4" style="text-align: center;">
            <div class="col-xs-6 col-sm-6">
                <img src="{{asset('images/homepage/mail_ico.png')}}" class="footer_img"/>
            </div>
            <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                <span style="font-weight:bolder;">Email</span>
                info@masterymyanmar.com
                info@hivephing.com
            </div>
        </div>
        <div class="col-xs-6 col-sm-4" style="text-align: center;">
            <div class="col-xs-6 col-sm-6">
                <img src="{{asset('images/homepage/phone_ico.png')}}" class="footer_img"/>
            </div>
            <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                <span style="font-weight:bolder;">Call Us</span><br>
                09456114442<br>
                09773777445
            </div>
        </div>
        <div class="col-xs-12 col-sm-4" style="text-align: center;">
            <div class="col-xs-6 col-sm-6">
                <img src="{{asset('images/homepage/location_ico.png')}}" class="footer_img"/>
            </div>
            <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                <span style="font-weight:bolder;">Address</span><br>
                No.112 myin thar 9 street,south okkalarpa township<br>
                Yangon
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-1 col-sm-3">
            &nbsp;
        </div>
        <div class="col-xs-12 col-sm-6">
            <img src="{{asset('images/homepage/facebook_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/google_plus-ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/linkedin_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/wk_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/ytube_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/digg_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/z_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
        </div>
        <div class="col-xs-1 col-sm-3">
            &nbsp;
        </div>

    </div>
    <div class="col-xs-12"
         style="text-align: center;margin-bottom:22px;font-weight:bolder;font-size:15px;color:#345884;margin-top:12px;">
        2018 Mastery Co.Ltd All Rights Reserved.

    </div>
</div>

@endsection