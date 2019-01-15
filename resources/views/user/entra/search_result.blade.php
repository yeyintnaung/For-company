@extends('layouts.dashboard')

@section('content')


    <!-- BEGIN SIDEBAR -->

    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
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
                        <a href="index.html"> Search Result</a> <i class="fa fa-circle"></i>
                    </li>

                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title page_title">
                Search Result </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">

                @include('user.entra.alert.alert')
                &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="row">

            </div>
            <div class="input-title"> Company</div>
            <div class="row">
                @foreach($com as $d)
                    <div class="col-md-6 ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">

                                <div class="caption">
                                    <img src="{{asset('users/entro/photo/'.$d->logo)}}" style="width:33px;border:1px solid lightslategray;border-radius:50% !important;"/>
                                    {{$d->name}}
                                </div>
                                <div class="actions">

                                    <a href="{{url('other_company_detail/'.$d->id)}}" class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View Detail
                                    </a>

                                </div>

                            </div>

                        </div>
                        <!-- END Portlet PORTLET-->

                    </div>
                @endforeach

            </div>
              <div class="input-title">Investor</div>

            <div class="row">
                @foreach($inves as $in)
                    <div class="col-md-6 ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">

                                <div class="caption">
                                    <i class="fa fa-gift"></i>
                                    {{$in->name}}
                                </div>
                                <div class="actions">

                                    <a href="{{url('entra/see_inves/'.$in->id)}}" class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View Detail
                                    </a>

                                </div>

                            </div>

                        </div>
                        <!-- END Portlet PORTLET-->

                    </div>
                @endforeach

            </div>
           <div class="input-title">Association</div>
            <div class="row">
                @foreach($asso as $ass)
                    <div class="col-md-6 ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box grey-gallery">
                            <div class="portlet-title">

                                <div class="caption">
                                    <i class="fa fa-gift"></i>
                                    {{$ass->name}}
                                </div>
                                <div class="actions">
                                    <a href="{{url('entra/asso_detail/'.$ass->id)}}"
                                            class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View Detail
                                    </a>

                                </div>

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
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->


@endsection
