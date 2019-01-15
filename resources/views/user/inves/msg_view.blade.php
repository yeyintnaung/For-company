@extends('layouts.inves_layouts.dashboard')
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
            <h1 class="page-title"> Read message
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                   <strong class="" style="font-weight:bold;">  Message To:
                                       @if($data->from_type == 'c')
                                           <?php
                                               $com=DB::table('company')->where('user_id',$data->from_user)->first();
                                           ?>
                                           {{$com->name}} ({{$com->email}})
                                           <span class="label label-sm label-warning">Company</span>
                                       @else
                                           <?php
                                           $com=DB::table('investor')->where('user_id',$data->from_user)->first();
                                           ?>
                                           {{$com->name}}
                                           <span class="label label-sm label-info">Investor</span>
                                       @endif
                                   </strong>
                            </div>



                        </div>
                        @include('user.entra.alert.balert')


                                <div class="c-contact" style="padding:18px; border:2px solid #67809F;background-color:#67809F;">
                                    <div class="caption" >

                                        <h4><strong style="color:white;">{{$data->title}}</strong></h4>
                                        <strong><p  class="c-font-lowercase" style="color:#c1c1c1;text-indent: 12px;">{{$data->subject}}</p></strong>
                                        <h5 class="" style="color:white;">Date: {{$data->created_at}}  </h5>


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

