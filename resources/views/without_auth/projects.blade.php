@extends('without_auth.dashboard')

@section('content')


    <!-- BEGIN SIDEBAR -->

    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="margin-left:0px;">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-purple-soft"></i>
                        <span class="caption-subject font-purple-soft bold uppercase">Projecst</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab" aria-expanded="false">Construction </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_2" data-toggle="tab" aria-expanded="true"> Electricity(M&E) </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"> Water and pipe (M&E) </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_4" data-toggle="tab" aria-expanded="false"> Prague and Floor </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_5" data-toggle="tab" aria-expanded="false"> Aluminum </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_6" data-toggle="tab" aria-expanded="false"> CCTV </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_7" data-toggle="tab" aria-expanded="false">Interior Design and
                                Decoration </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_8" data-toggle="tab" aria-expanded="false">Painting </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_9" data-toggle="tab" aria-expanded="false"> Air-con </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_10" data-toggle="tab" aria-expanded="false">
                                Security Solution Provider </a>
                        </li>

                    </ul>
                    <div class="tab-content" style="">
                        <div class="tab-pane fade active in" id="tab_1_1">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['rb1', 'b1', 'b2', 'b3'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade " id="tab_1_2">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fr3', 'rb3'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab_1_3">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fr1', 'rb2'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab_1_4">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fr7', 'fr7'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab_1_5">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fr5', 'fr5'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab_1_6">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fr8', 'rb5'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab_1_7">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fn1', 'fn2', 'fn3', 'fn4'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab_1_8">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type',['rb1', 'b1', 'b2', 'b3'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade " id="tab_1_9" style="height:1111px;overflow:scroll;">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fr4', 'rb4'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>
                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                                 {{$d->quotation}}
                                                 </span>
                                            <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab_1_10">
                            <?php

                            $data = DB::connection('mysql_service')->table('for_repair')->where([['confirm', '=', 'confirmed']])->whereIn('fr_type', ['fr8', 'rb5'])->orderBy('created_at','desc')->get();
                            ?>
                            @foreach($data as $d)
                                <div class="col-md-6 ">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box blue-hoki">
                                        <div class="portlet-title">

                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>


                                            @if($d->close == 0)

                                                <div class="actions">
                                                    <a href="{{url('detail_without_auth/'.$d->id)}}"
                                                       class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View
                                                        More
                                                    </a>
                                                </div>
                                            @else
                                                <div class="actions">
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        Expired
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                                 data-rail-color="yellow"
                                                 data-handle-color="#a1b2bd">
                                              
                                                <strong> Points:{{$d->project_define_point}}
                                                </strong>
                                                <br/>
                                                {!! str_limit($d->description,140) !!}
                                            </div>
                                            <span class="badge badge-danger">
                                    {{$d->quotation}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                            <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                                        </div>
                                    </div>
                                    <!-- END Portlet PORTLET-->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="clearfix margin-bottom-20"></div>

                </div>
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
