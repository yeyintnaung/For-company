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
                        <a href="#" class="list-name">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span class="list-name">Association detail</span>
                    </li>
                </ul>
                <div class="page-toolbar">

                </div>
            </div>
            <!-- END PAGE BAR -->


            <h1 class="page-title page_title"> Association detail
                <span class="label label-sm label-info">
                    @php
                        $bh=DB::table('business_hub')->where('id',$data->business_hub)->first();
                    @endphp
                    {{$bh->description}} 
                </span>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet solid blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>{{$data->name}}


                            </div>
                            <div style="float:right;">
                                <a href="{{url('entra/asso_activity/'.$data->user_id)}}" class="btn green">
                                    Activities <i class="fa fa-plus"></i>
                                </a>

                            </div>


                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height:200px">


                                </img>
                                <p> {{$data->description}} </p><br>


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
                                <a href="" class="fullscreen"> </a>
                                <a href="javascript:;" class="reload"> </a>
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


                            &nbsp;

                        </div>
                    </div>
                    <div class="col-md-4">
                        &nbsp;
                    </div>
                    <?php

                    $member_arry = explode(',', $data->members_id);
                    ?>
                    @if (in_array(Auth::user()->id,$member_arry))
                        <div class="col-md-4">

                            &nbsp;
                            <div class="btn-group btn-group btn-group-justified">


                                <a href="#" class="btn purple disabled"
                                   style="font-size:18px;"> Joined </a>
                            </div>
                        </div>
                    @else
                        <div class="col-md-4">

                            &nbsp;
                            <div class="btn-group btn-group btn-group-justified">


                                <a href="{{url('entra/asso_request/'.$data->id)}}" class="btn green"
                                   style="font-size:18px;"> Join </a>
                            </div>
                        </div>
                    @endif
                    &nbsp;
                    <div class="col-md-4">
                        &nbsp;
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>

            </div>


        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
@endsection