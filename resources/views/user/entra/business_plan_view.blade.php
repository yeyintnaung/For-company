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
            <h1 class="page-title page_title"> Business Plan
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
                            <div class="pannel-title">
                                You have no business plans to browse the investors! Please Don’t miss  your great Opportunities .

                            </div>
                            <div style="margin-left:40%;margin-bottom:10%;margin-top:7%;">
                            <a href="{{url('entra/business_plan')}}" class="btn btn-lg green"> Create Your Business Plan
                                <i class="fa fa-plus"></i>
                            </a>
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
