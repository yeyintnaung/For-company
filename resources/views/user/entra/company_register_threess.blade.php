@extends('layouts.dashboard')

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">

            </div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#" class="list-name">Home</a> <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span class="list-name">Company Registration Form</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Company Register Form</span>
                            </div>
                        </div>
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="note note-success">
                                <h4 class="block">Successful</h4>

                                <p>
                                    Your company was successfully registered
                                </p>
                            </div>
                        @endif
                        @include('user.entra.alert.alert')


                        <div class="portlet-body form">
                            <div class="row " style="font-weight:bold;color:#888;margin-left:33px;">
                                Hi {{Auth::user()->name}}<br>
                                Please Complete the information for your Company!

                            </div>

                            <form action='{{url('company_register')}}' enctype="multipart/form-data" role="form" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_name') ? ' has-error' : '' }}">
                                                <label>Can you tell the name of CEO, founder or Managing Director?
                                                </label>

                                                <input type="text" class="form-control" name="ceo_name"
                                                        placeholder="Optional" value="{{old('ceo_name')}}">
                                                @if ($errors->has('ceo_name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ceo_name') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_email') ? ' has-error' : '' }}">
                                                <label>
                                                    Fill the email address of him/her
                                                </label>

                                                <input type="email" class="form-control" name="ceo_email"
                                                        placeholder="Optional" value="{{old('ceo_email')}}">
                                                @if ($errors->has('ceo_email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ceo_email') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <button type="submit" class="btn btn-lg blue" style="float:right;">
                                            Save And Finished
                                        </button>

                                    </div>
                                </div>
                            </form>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <!-- END SAMPLE FORM PORTLET-->
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
        <div class="quick-nav-overlay"></div>
@endsection
