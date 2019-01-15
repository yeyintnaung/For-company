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

                                <p> Your company was successfully registered

                                </p>
                            </div>
                        @endif

                        <div class="portlet-body form">
                            <div class="row " style="font-weight:bold;color:#888;margin-left:33px;">
                                Hi {{Auth::user()->name}}<br>
                                Please Complete the information for your Company!

                            </div>

                            <form action='{{url('company_register')}}' enctype="multipart/form-data" role="form"
                                    method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>Email Address</label>
                                                <input type="email" class="form-control" name="email"
                                                        placeholder="Email Address" value="{{old('email')}}">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="name"
                                                        placeholder="Company Name" value="{{old('name')}}">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group  {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label>Phone No.</label>

                                                <input type="number" class="form-control" name="phone"
                                                        placeholder="Phone No." value="{{old('phone')}}">
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                                                <label>Website Link</label>

                                                <input type="text" class="form-control" name="website"
                                                        placeholder="optional" value="{{old('website')}}">
                                                @if ($errors->has('website'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('website') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                                <label>Facebook Link</label>

                                                <input type="text" class="form-control" name="facebook"
                                                        placeholder="optional" value="{{old('facebook')}}">
                                                @if ($errors->has('facebook'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('facebook') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_name') ? ' has-error' : '' }}">
                                                <label>Name of Ceo</label>

                                                <input type="text" class="form-control" name="ceo_name"
                                                        placeholder="Name of Ceo" value="{{old('ceo_name')}}">
                                                @if ($errors->has('ceo_name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ceo_name') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_phone') ? ' has-error' : '' }}">
                                                <label>Phone No. of Ceo</label>

                                                <input type="number" class="form-control" name="ceo_phone"
                                                        placeholder="Phone No. of Ceo" value="{{old('ceo_phone')}}">
                                                @if ($errors->has('ceo_phone'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ceo_phone') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('ceo_email') ? ' has-error' : '' }}">
                                                <label>Email of Ceo</label>

                                                <input type="email" class="form-control" name="ceo_email"
                                                        placeholder="Email of Ceo" value="{{old('ceo_email')}}">
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

                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('business_hub') ? ' has-error' : '' }}">
                                                <label>Business's Hub</label>
                                                <select class="form-control select2me" name="business_hub">
                                                    <?php
                                                    $bh = \Illuminate\Support\Facades\DB::table('business_hub')->orderBy('description','asc')->get();
                                                    ?>
                                                    @foreach ($bh as $b)
                                                        <option value="{{$b->id}}"
                                                                style="word-wrap:break-word">{{str_limit($b->description,'50')}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('business_hub'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('business_hub') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country </label>
                                                <select class="form-control select2me" name="country_id">
                                                    <?php
                                                    $bcc = \Illuminate\Support\Facades\DB::table('country')->get();

                                                    ?>
                                                        <option value="150"
                                                                style="word-wrap:break-word">Myanmar</option>
                                                    @foreach ($bcc as $bc)
                                                        <option value="{{$bc->id}}"
                                                                style="word-wrap:break-word">{{$bc->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City </label> <select name='city_id' class="form-control">
                                                    <option value="1">Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Look for investment </label>
                                                <select name="investment" class="form-control">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Registration Status </label>
                                                <select name="registration_status" class="form-control">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label>Description</label> <textarea class="form-control" rows="3"
                                                        name="description">{{old('description')}}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                                <label for="exampleInputFile1">Logo</label>
                                                <input type="file" name='logo' id="exampleInputFile1">
                                                @if ($errors->has('logo'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('logo') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>Address</label>
                                                <textarea class="form-control" name="address" rows="3"
                                                        name="address">{{old('address')}}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" class="btn blue">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                        </div>
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
