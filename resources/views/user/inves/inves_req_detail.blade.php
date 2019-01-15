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
            <h1 class="page-title">
                Investor Detail
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
                            <form class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 input-title">Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->name}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Business Type
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
                                        <label class="control-label col-md-3 input-title">Country
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            @php
                                            $cn=\Illuminate\Support\Facades\DB::table('countries')->where('id',$data->country_id)->first();
                                            @endphp
                                            {{$cn->name}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">City
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            @php
                                                $ct=\Illuminate\Support\Facades\DB::table('cities')->where('id',$data->city_id)->first();
                                            @endphp
                                            {{$ct->name}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Phone
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->phone}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Background Information
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->background_info}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Full Address
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->address}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Business Hub
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            @php
                                            $bharr=explode(',',$data->business_hub_id);
                                            @endphp
                                            @foreach($bharr as $bhr)
                                               <?php
                                                $bhname=\Illuminate\Support\Facades\DB::table('business_hub')->where('id',$bhr)->first();
                                                ?>
                                                {{$bhname->description}} , {{''}}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Country to invest
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">


                                                <?php
                                                $cname=\Illuminate\Support\Facades\DB::table('countries')->where('id',$data->country_id_to_invest)->first();
                                                ?>
                                                {{$cname->name}}

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Stage of product
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            @php
                                            $sarr=explode(',',$data->stage_of_product);
                                            @endphp
                                            @foreach($sarr as $sr)
                                                {{$sr}}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label col-md-3 input-title">Budget Min
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->budget_min}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 input-title">Budget Max
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            {{$data->budget_max}}
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label class="control-label col-md-3 input-title">created_at
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
                                        <button class="btn btn-success" onclick="go('{{url('inves_req_edit')}}')">Edit
                                        </button>

                                    </div>

                                </div>
                            </div>
                            <!-- END FORM-->
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
