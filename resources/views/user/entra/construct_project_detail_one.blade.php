@extends('layouts.dashboard')
@section('content')
    <!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Project Detail
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
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

<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
            <div class="alert alert-success">
                Sucessfully requested for this project
            </div>
            <h1 class="page-title page_title">
            Project Detail <span class="pannel-title">Upload By
                @php
                    $user=DB::connection('mysql_service')->table('users')->where('id',$data->user_id)->first();
                @endphp
                {{ $user->name }}
                @if($data->confirm != 'done')
                    <span class="label label-warning"> Open </span>&nbsp;&nbsp;&nbsp;&nbsp;
                @else
                    <span class="label label-danger"> Close </span>&nbsp;&nbsp;&nbsp;&nbsp;
                @endif
                 @php
                 $check_rq=DB::connection('mysql_service')->table('request')->where([['post_id','=',$data->id],['post_uploader_id','=',$data->user_id],['requester_id','=',Auth::user()->id]])->first();
                @endphp

                @if($check_rq->status == 'rq')
                    <span class="label label-danger"> Requested </span>&nbsp;&nbsp;&nbsp;&nbsp;
                @elseif($check_rq->status == 'con')
                    <span class="label label-info">You have been confirmed</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    @else
                    <span class="label label-danger">Expired</span>&nbsp;&nbsp;&nbsp;&nbsp;

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

                            <p> Successfully Send </p>
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
                            </div>
                            <div class="col-xs-12">&nbsp;</div>
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
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <!--   </div> -->

                <!-- END VALIDATION STATES-->
            </div>
            <div class="row">&nbsp;</div>
        </div>
    </div>


@endsection