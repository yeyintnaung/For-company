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
                        <a href="#" class="list-name">Associations</a> <i class="fa fa-circle"></i>
                    </li>
                </ul>
            </div>
 
            <h1 class="page-title page_title">
                Associations
            </h1>

            <div class="row" style='overflow:auto;height:823px;'>
                @foreach($data as $d)
                    <div class="col-md-6 ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>{{$d->name}}
                                </div>
                                <div class="actions">

                                    <a href="{{url('entra/asso_detail/'.$d->id)}}"
                                            class="btn btn-default btn-sm"> <i class="fa fa-pencil"></i> See More </a>
                                    <a href="javascript:;" class="btn"> </a>
                                </div>

                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:200px" data-rail-visible="1"
                                        data-rail-color="yellow" data-handle-color="#a1b2bd">
                                    <strong>{{$d->title}}</strong> <br/>
                                    {{$d->description}}</div>
                                <strong style="color:#67809f;">Created At:{{$d->created_at}}</strong>

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

    <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
@endsection