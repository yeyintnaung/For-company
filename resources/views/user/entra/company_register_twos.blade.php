<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');

?>

@extends('layouts.dashboard')

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            
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

            <div class="row">
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase " style="color:green;">Congratulations {{Auth::user()->name}} You are Completed 40% of Querying Company Information</span>
                            </div>
                        </div>
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="note note-success">
                                <h4 class="block">Successful</h4>

                                <p> Your company was successfully registered

                                </p>
                            </div>
                        @endif
                        @include('user.entra.alert.alert')


                        <div class="portlet-body form">
                            <div class="row " style="font-weight:bold;color:#888;margin-left:33px;">

                            </div>

                            <form action='{{url('company_register_form_three')}}' enctype="multipart/form-data" role="form" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="row">
                                       
                                    <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                                        <label class="col-md-5 input-title control-label">If you have the company website please fill your company website address 
                                        </label>

                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="website"
                                                placeholder="optional" value="{{old('website')}}">
                                        </div>
                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('website') }}</strong>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>
                                        
                                    <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                        <label class="col-md-5 input-title control-label">
                                            Fill the Facebook address 
                                        </label>

                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="facebook" placeholder="optional" value="{{old('facebook')}}">
                                        </div>
                                        @if ($errors->has('facebook'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                    
                                    <div class="clearfix"></div>  

                                    <div class="form-group">
                                        <label class="col-md-5 input-title control-label">
                                            Registration Status 
                                        </label>

                                        <div class="col-md-7">
                                            <select name="registration_status" class="form-control" required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                                <option value="2">Under Process</option>
                                            </select>
                                        </div>
                                    </div>

                               

                                    <div class="clearfix"></div>
                                        
                                    <div class="form-group">
                                        <label class="col-md-5 input-title control-label">
                                            Look for investment 
                                        </label>

                                        <div class="col-md-7">
                                            <select name="investment" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>

                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="col-md-5 input-title control-label">Description</label>

                                        <div class="col-md-7">
                                            <textarea class="form-control" rows="3"
                                                name="description" required>{{old('description')}}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                             </span>
                                        @endif
                                    </div> 

                                    <div class="clearfix"></div>                                   

                                    <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                        <label for="exampleInputFile1" class="col-md-5 input-title control-label">Logo ( Optional )</label>

                                        <div class="col-md-7">
                                            <input type="file" name='logo' id="exampleInputFile1" />
                                        </div>
                                        @if ($errors->has('logo'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('logo') }}</strong>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>                                   

                                    <div class="form-group {{ $errors->has('year_esta') ? ' has-error' : '' }}">
                                        <label class="col-md-5 input-title control-label">
                                            Year Established
                                        </label>

                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="year_esta"
                                                placeholder="" value="{{old('year_esta')}}">
                                        </div>
                                        @if ($errors->has('year_esta'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('year_esta') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                        
                                    <div class="clearfix"> </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-lg green pull-right">
                                            Save And Continue To Other Page
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
