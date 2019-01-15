@extends('layouts.dashboard')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">
              View Mail
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
                                        $com = DB::table('company')->where('user_id', $data->to_user)->first();
                                        ?>
                                        {{$com->name}}

                                    </strong>
                                @endif
                                @if($data->to_user == Auth::user()->id)
                                    <strong class="" style="font-weight:bold;"> Reply Message from:

                                        <?php
                                        $com = DB::table('company')->where('user_id', $data->from_user)->first();
                                        ?>
                                        {{$com->name}}

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
                                        {{\Carbon\Carbon::parse($data->created_at)->toDateString()}}
                                    </div>
                                </div>
                                <div class="portlet-body" style="height:70%;">
                                  <div class="" style="font-size:17px;">
                                      <p>{!! $data->subject !!}</p>
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
