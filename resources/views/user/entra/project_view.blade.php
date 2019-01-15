@extends('layouts.dashboard')
@section('content')
<!-- BEGIN SIDEBAR -->
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper" >
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" >

        <div class="page-bar" >
            <ul class="page-breadcrumb" >
                <li >
                    <a href="#" class="list-name"> Your Projects</a >
                    <i class="fa fa-circle" ></i >
                </li >

            </ul >
        </div >

        <h1 class="page-title page_title">
            Projects
        </h1 >

        <div class="row">

            @include('user.entra.alert.alert')
            &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="row">

            <div class="col-md-12">
                <a href="{{url('entra/create_project')}}" class="btn btn-success" style="float:right;">Create New Project ...
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row" >
            @foreach($data as $d)

                <div class="col-md-6 " >
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet box blue-hoki" >
                        <div class="portlet-title" >

                            <div class="caption" >
                                <i class="fa fa-gift" ></i >
                            </div >
                            <div class="actions" >
                                <a href="{{url('entra/project_detail/'.$d->id)}}"
                                   class="btn btn-default btn-sm" >
                                    <i class="fa fa-search" ></i > View Detail
                                </a >

                            </div >


                        </div >
                        <div class="portlet-body" >
                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                 data-rail-color="yellow"
                                 data-handle-color="#a1b2bd" >
                                <strong >{{$d->name}}</strong >


                                <br />

                                {!! $d->description !!}
                            </div >
                                <span class="badge badge-danger">
                                    {{$d->competitor_count}}
                                </span>
                            <strong style="color:#67809f;" >Competitors</strong >
                            &nbsp;&nbsp;
                            &nbsp;&nbsp;


                            <strong style="color:#67809f;" >Post Date : {{$d->created_at}}</strong >

                        </div >
                    </div >
                    <!-- END Portlet PORTLET-->
                </div >
            @endforeach


        </div >
        <div class="row">
            <div class="col-sm-4">&nbsp;&nbsp;&nbsp;
            </div>
            <div class=" col-sm-6">
                {{$data->links()}}
            </div>
            <div class="col-sm-2">&nbsp;&nbsp;&nbsp;
            </div>
        </div>

    </div >
    <!-- END CONTENT BODY -->
</div >
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler" >
    <i class="icon-login" ></i >
</a >
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

<!-- END FOOTER -->
</div>
<!-- BEGIN QUICK NAV -->


@endsection
