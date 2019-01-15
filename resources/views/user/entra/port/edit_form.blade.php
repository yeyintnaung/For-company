@extends('layouts.dashboard')

@section('content')
@section('title')
    Edit Activity
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
<div class="col-xs-12" style="background-color:white;">
    <!-- BEGIN CONTENT BODY -->
    <div class="col-xs-12">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title page_title">
            Edit Your Acitivity
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
                        {!! Form::model($data,['method'=>'post','url'=>'entra/portfolio/edit/'.$data->id,'enctype'=>'multipart/form-data','class'=>'form-horizontal'])!!}
                        {{csrf_field()}}
                        <div class="form-body">
                            <div class="form-group {{ $errors->has('project_name') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">Project's Name
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control f" name="project_name"
                                           placeholder="Optional" value="{{$data->project_name}}">
                                    @if ($errors->has('project_name'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('project_name') }}</strong>
                                                     </span>
                                    @endif
                                </div>
                                @if ($errors->has('project_name'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('project_name') }}</strong>
                                                     </span>
                                @endif

                            </div>
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">Address
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control f" name="address"
                                           placeholder="Optional" value="{{$data->address}}">
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                     </span>
                                    @endif
                                </div>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                     </span>
                                @endif

                            </div>
                            <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">Start Date
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control f" name="start_date"
                                           placeholder="Optional" value="{{\Carbon\Carbon::parse($data->start_date)->toDateString()}}">
                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                     </span>
                                    @endif
                                </div>
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                     </span>
                                @endif

                            </div>
                            <div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">End Date
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control f" name="end_date"
                                           placeholder="Optional" value="{{\Carbon\Carbon::parse($data->end_date)->toDateString()}}">
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                     </span>
                                    @endif
                                </div>
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                     </span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">Description
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control f" rows="3"
                                              name="description" required>{{$data->description}}</textarea>

                                </div>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                @endif

                            </div>

                            <input type="hidden" name="id"
                                   value="{{$data->id}}"
                                   class="form-control"/>
                            <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">Photo
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">

                                    <input type="file" name='photo' id="exampleInputFile1">
                                </div>
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                     </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('photo1') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">Photo
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">

                                    <input type="file" name='photo1' id="exampleInputFile1">
                                </div>
                                @if ($errors->has('photo1'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('photo1') }}</strong>
                                                     </span>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('photo2') ? ' has-error' : '' }}">
                                <label class="control-label col-md-3">Photo
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">

                                    <input type="file" name='photo2' id="exampleInputFile1">
                                </div>
                                @if ($errors->has('photo2'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('photo2') }}</strong>
                                                     </span>
                                @endif
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input  type="submit" value="Upload"/>
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
