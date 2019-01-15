@extends('layouts.dashboard')
@section('content')
    <div>
        <!-- BEGIN CONTENT BODY -->
        <div  class="col-xs-12" style="background-color:white;padding-bottom:22px;">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> View Mail
                <small></small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                @if($data->from_user == Auth::user()->id)
                                    <strong class="" style="font-weight:bold;">
                                        Message To:
                                        <?php
                                        $com = DB::table('investor')->where('user_id', $data->to_user)->first();
                                        ?>
                                        {{$com->name}}
                                        <span class="label label-sm label-info">Investor</span>

                                    </strong>
                                @endif
                                @if($data->to_user == Auth::user()->id)
                                    <strong class="" style="font-weight:bold;"> Message from:

                                        <?php
                                        $com = DB::table('investor')->where('user_id', $data->from_user)->first();
                                        ?>
                                        {{$com->name}}
                                        <span class="label label-sm label-info">Investor</span>

                                    </strong>
                                @endif
                            </div>


                        </div>
                        @include('user.entra.alert.balert')
                        <div class="col-md-12" style="padding-left:0px;padding-right:0px;">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>{{$data->title}} </div>
                                    <div class="actions">
                                        {{\Carbon\Carbon::parse($data->created_at)->toDateString()}} &nbsp; &nbsp;
                                        &nbsp;
                                        @if($data->from_user != Auth::user()->id)
                                            <a href="{{url('entra/reply_mail_for_bplan/'.$data->id)}}" class="btn btn-default btn-sm">
                                                <i class="fa fa-reply"></i> Reply </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="portlet-body" style="height:70%;">
                                    <div class=""
                                         style="">
                                    <div class="" style="font-size:17px;">
                                            <br>
                                            <p>{{$data->subject}}</p>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">&nbsp;</div>


                                        <?php
                                        $bp = DB::table('business_plan')->where('id', $data->business_plan_id);

                                        ?>
                                        @if($bp->count() == 0)
                                            This business proposal was deleted
                                        @else
                                            <?php
                                            $bp_data = $bp->first()->title;
                                            ?>
                                            About:
                                            <a href="{{url('inves/business_plan_detail/'.$data->business_plan_id)}}"
                                               style="color:red;">{{$bp_data}}</a>
                                            @endif

                                            </a>

                                    </div>
                                </div>
                                <!-- END Portlet PORTLET-->
                            </div>


                        </div>


                    </div>
                </div>

                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
    </div>
    <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->

    </div>
    <!-- BEGIN QUICK NAV -->



@endsection

