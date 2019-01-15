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
            <h1 class="page-title page_title">
                Investor Profile
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                            </div>
                        </div>
                        @include('user.entra.alert.balert')
                        <div class="portlet-body">
                            <div class="col-md-6">
                            <form class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->name}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Business Type
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            @php
                                                $bhn=\Illuminate\Support\Facades\DB::table('business_hub')->where('id',$data->business_hub_id)->first();
                                            @endphp
                                            {{$bhn->description}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Country
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            @php
                                                $cn=\Illuminate\Support\Facades\DB::table('countries')->where('id',$data->country_id)->first();
                                            @endphp
                                            {{$cn->name}}
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Budget Min
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->budget_min}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Budget Max
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->budget_max}}
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">created_at
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->created_at}}
                                        </div>

                                    </div>

                                </div>


                            </form>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <a class="btn btn-success" href="{{url('entra/inves_activities/'.$data->user_id)}}')">Activities
                                        </a>

                                    </div>

                                </div>
                            </div>
                            <!-- END FORM-->
                        </div><div class="col-md-6">

                                <div class="c-contact" style="padding:18px; border:2px solid #67809F;background-color:#67809F;">
                                    <div class="caption" >
                                        <h3 class="" style="color:white;">Send Message to {{$data->name}}</h3>
                                        <p  class="c-font-lowercase" style="color:#c1c1c1;">Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email from the form below and we will get back to you as soon as we can.</p>
                                    </div>
                                    <form action="{{url('entra/reply_message')}}" method="post" enctype="multipart/form-data"
                                          class="form-horizontal">
                                        {{csrf_field()}}

                                        <input type="hidden" placeholder="Your Name" name="from_user" value="{{Auth::user()->id}}" class="form-control input-md" >
                                        <input type="hidden" placeholder="Your Email" name="to_user" value="{{$data->user_id}}" class="form-control input-md" >
                                        <div class="form-group">

                                            <input type="text" name="title" placeholder="Title"  class="form-control input-md"> </div>
                                        <input type="hidden" name="type" value=""/>
                                        <div class="form-group">
                                            <textarea rows="8" name="subject"  placeholder="Write comment here ..." class="form-control input-md"></textarea>
                                        </div>
                                        <button type="submit" class="btn grey">Send</button>
                                    </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
    <script>
        function go(link) {
            window.location.assign(link);
        }
        ;
    </script>


@endsection
