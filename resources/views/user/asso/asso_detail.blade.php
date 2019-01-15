@extends('layouts.asso_layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">

            </div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a> <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Company detail</span>
                    </li>
                </ul>
                <div class="page-toolbar">

                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            @if(\Illuminate\Support\Facades\Session::has('Edited'))
                <div class="note note-success">
                    <h4 class="block">Successful</h4>

                    <p> Your Article was {{\Illuminate\Support\Facades\Session::get('Edited')}}

                    </p>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('Added'))
                <div class="note note-success">
                    <h4 class="block">Successful</h4>

                    <p> Your Article was {{\Illuminate\Support\Facades\Session::get('Added')}}

                    </p>
                </div>
            @endif

            <h1 class="page-title"> Association detail
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet solid blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>{{$data->name}} </div>

                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height:200px">

                                </img><p> {{$data->description}} </p><br>

                            </div>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Contact Info
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="" class="fullscreen"> </a> <a href="javascript:;" class="reload"> </a>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="col-md-12 col-lg-6">
                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Country</h5>
                                    @php
                                        $city=\Illuminate\Support\Facades\DB::table('countries')->where('id',$data->country)->first();
                                    @endphp
                                    : <span style="color:#5f5963;font-weight:bold;"> &nbsp; {{$city->name}}</span>
                                </div>

                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">

                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">City</h5>:<span
                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$data->city}}</span>

                                </div>

                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Website Link </h5>
                                    : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a href="{{$data->web}}">{{$data->web}}
                                            <span class="fa fa-arrow-right"></span></a> </span>
                                </div>
                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Facebook Link </h5>
                                    : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a
                                                href="{{$data->facebook}}">{{$data->facebook}} <span
                                                    class="fa fa-arrow-right"></span></a> </span>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <h4 class="title" style="font-weight:bolder;color:#5f5963;"> Address</h4>
                                <h5 style="color: #888;font-weight:bold;">
                                    {{$data->address}}</h5>
                                <span style="color:#5f5963;font-weight:bold;">  {{$data->created_at}}</span>
                            </div>

                            &nbsp; &nbsp; &nbsp;

                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>

            </div>
            @if(Auth::user()->type == 3)
                <div class="row" style="float:right;">
                    <div class="col-xs-12">
                        <button type="button" onclick="go('{{asset('asso/asso_detail_edit')}}')"
                                class="btn btn-lg btn-success">Edit
                        </button>
                    </div>
                </div>

                <!-- END CONTENT BODY -->
                <script>
                    function go(li) {
                        window.location.assign(li);
                    }
                </script>
            @endif

        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
@endsection