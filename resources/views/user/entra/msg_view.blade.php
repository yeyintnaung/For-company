@extends('layouts.dashboard')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <h1 class="page-title page_title"> 
                Send Message
            </h1>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <strong class="" style="font-weight:bold;"> Message To:
                                    <?php
                                    $com = \Illuminate\Support\Facades\DB::table('company')->where('user_id', $data->to_user)->first();?>{{$com->name}}</strong>
                            </div>

                        </div>
                        @include('user.entra.alert.balert')

                        <div class="c-contact" style="padding:18px; border:2px solid #67809F;background-color:#67809F;">
                            <div class="caption">

                                <h4><strong style="color:white;">{{$data->title}}</strong></h4>
                                <strong>
                                    <p class="c-font-lowercase" style="color:#c1c1c1;text-indent: 12px;">{{$data->subject}}</p>
                                </strong>
                                <h5 class="" style="color:white;float:left;">Date: {{$data->created_at}}  </h5> &nbsp;
                                &nbsp; &nbsp;

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

