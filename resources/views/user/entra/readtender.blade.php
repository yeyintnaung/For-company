@extends('layouts.dashboard')

@section('content')
@section('title')
    Tender's Detail
@endsection
<div class="">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">


            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title page_title">
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="col-xs-12" style='overflow:auto;height:auto;' id="full">
            <div class="col-md-12">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>{{$data->title}} </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a> <a href="#" class="fullscreen"> </a>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow"
                             data-handle-color="#a1b2bd">
                            <strong>{{$data->title}}</strong> <br/>
                            <img src="" width="152"
                                 style=" vertical-align: text-top;float:left;margin:9px;"></img> {!! $data->description !!}
                        </div>
                        <strong style="color:#67809f;">{{$data->created_at}}</strong>

                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>

        </div>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<!-- END QUICK SIDEBAR -->

<!-- END CONTAINER -->
@endsection