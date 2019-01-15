@extends('layouts.asso_layouts.dashboard')
@section('content')
    <div class="page-content-wrapper" >
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" >
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title" >
            </h1 >
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row" >
                <div class="col-md-12" >
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered" >
                        <div class="portlet-title" >
                            <div class="caption" >
                                <i class="icon-settings font-dark" > Request Message</i >
                            </div >


                        </div >


                        <div class="row" >


                            <div class="c-contact"
                                    style="padding:18px; border:2px solid #67809F;background-color:#67809F;" >
                                <div class="caption" >
                                    <h3 class="" style="color:white;" >Request message from
                                        <?php
                                        $com_name = DB::table('company')->where('id', $data->com_id)->first();
                                        ?>
                                        {{$com_name->name}}<span
                                                style="float:right;font-size:18px;font-weight:bold" >{{$data->created_at}}</span >
                                    </h3 >

                                </div >
                                <p class="c-font-lowercase" style="color:#c1c1c1;" >{{$data->request_message}}</p >


                                <a href="{{url('asso/confirm_request/'.$data->id)}}"
                                        class="btn grey" >Confirm to join</a >
                            </div >


                        </div >
                    </div >

                    <!-- END VALIDATION STATES-->
                </div >
            </div >
        </div >
    </div >
    <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->

    </div>
    <!-- BEGIN QUICK NAV -->



@endsection
