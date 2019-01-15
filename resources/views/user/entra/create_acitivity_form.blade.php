@extends('layouts.dashboard')

@section('content')
@section('title')
    Create New Activity
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
    <div class="col-xs-12" style="background-color:white;">
        <!-- BEGIN CONTENT BODY -->
        <div class="col-xs-12">
            <!-- BEGIN PAGE HEADER-->
           
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title page_title">
                Create Your Acitivity
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="col-xs-12">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                            </div>

                        </div>
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="note note-success">
                                <h4 class="block">Successful</h4>

                                <p> Your form was successfully {{\Illuminate\Support\Facades\Session::get('success')}}

                                </p>
                            </div>
                        @endif
                        <div class="portlet-body">


                            <form action="{{url('entra/create_activity')}}" method="post" enctype="multipart/form-data"
                                  class="form-horizontal">
                                <div class="form-body">


                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="control-label input-title col-md-3">Description
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-9">
                                            <textarea class="wysihtml5 form-control" rows="6" name="description" data-error-container="#editor1_error"></textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                        @endif

                                    </div>

                                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label class="control-label input-title col-md-3">Photo
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">

                                        <input type="file" name='image' id="exampleInputFile1" required/>
                                            </div>
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input name="__submit__" type="submit" class="btn green" value="Upload"/>
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>

                            </form>

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


@endsection
