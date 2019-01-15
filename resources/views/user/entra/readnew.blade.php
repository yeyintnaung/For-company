@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#" class="list-name">Read News</a> <i class="fa fa-circle"></i>
                    </li>

                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title page_title">
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row" style='overflow:auto;height:823px;'>
                @foreach($news as $n)
                    <div class="col-md-12">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>{{$n->title}} </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a> <a href="#" class="fullscreen"> </a>
                                </div>

                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                                    <strong>{{$n->title}}</strong> <br/>
                                    <img src="{{asset('upload/'.$n->image)}}" width="152" style=" vertical-align: text-top;float:left;margin:9px;"></img>
                                    {!! $n->des !!}
                                </div>
                                <strong style="color:#67809f;">{{$n->created_at}}</strong>

                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                @endforeach

            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
    <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
@endsection