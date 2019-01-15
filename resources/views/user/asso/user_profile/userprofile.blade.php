@extends('layouts.asso_layouts.dashboard')

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
                                        <label class="control-label col-md-3">User Email
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">

                                            {{$data->email}}
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
