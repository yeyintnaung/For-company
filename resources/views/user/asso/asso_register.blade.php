@extends('layouts.asso_layouts.dashboard')

@section('content')
    <div class="page-content-wrapper" >
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" >
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm" >

            </div >
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar" >
                <ul class="page-breadcrumb" >
                    <li >
                        <a href="index.html" >Home</a >
                        <i class="fa fa-circle" ></i >
                    </li >
                    <li >
                        <span >Association Registration Form</span >
                    </li >
                </ul >
            </div >
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row" >
                <div class="col-md-12 " >
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered" >
                        <div class="portlet-title" >
                            <div class="caption font-red-sunglo" >
                                <i class="icon-settings font-red-sunglo" ></i >
                                <span class="caption-subject bold uppercase" > Association Register Form</span >
                            </div >
                        </div >
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="note note-success" >
                                <h4 class="block" >Successful</h4 >

                                <p > Your Association was successfully registered

                                </p >
                            </div >
                        @endif
                        <div class="portlet-body form" >
                            <form action='{{url('asso/asso_register')}}' enctype="multipart/form-data" role="form"
                                    method="post" >
                                {{csrf_field()}}
                                <div class="row" >
                                    <div class="form-body" >

                                        <div class="col-md-6" >
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
                                                <label >Company Name</label >
                                                <input type="text" class="form-control" name="name"
                                                        placeholder="Association Name" value="{{old('name')}}" >
                                                @if ($errors->has('name'))
                                                    <span class="help-block" >
                                                    <strong >{{ $errors->first('name') }}</strong >
                                                     </span >
                                                @endif
                                            </div >
                                        </div >
                                        <div class="col-md-6" >

                                            <div class="form-group  {{ $errors->has('phone') ? ' has-error' : '' }}" >
                                                <label >Phone No.</label >

                                                <input type="number" class="form-control" name="phone"
                                                        placeholder="Phone No." value="{{old('phone')}}" >
                                                @if ($errors->has('phone'))
                                                    <span class="help-block" >
                                                    <strong >{{ $errors->first('phone') }}</strong >
                                                     </span >
                                                @endif
                                            </div >
                                        </div >
                                    </div >
                                </div >
                                <div class="row" >
                                    <div class="form-body" >
                                        <div class="col-md-6" >
                                            <div class="form-group {{ $errors->has('web') ? ' has-error' : '' }}" >
                                                <label >Website Link</label >

                                                <input type="text" class="form-control" name="web"
                                                        placeholder="optional" value="{{old('web')}}" >
                                                @if ($errors->has('web'))
                                                    <span class="help-block" >
                                                    <strong >{{ $errors->first('web') }}</strong >
                                                     </span >
                                                @endif
                                            </div >
                                        </div >
                                        <div class="col-md-6" >

                                            <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}" >
                                                <label >Facebook Link</label >

                                                <input type="text" class="form-control" name="facebook"
                                                        placeholder="optional" value="{{old('facebook')}}" >
                                                @if ($errors->has('facebook'))
                                                    <span class="help-block" >
                                                    <strong >{{ $errors->first('facebook') }}</strong >
                                                     </span >
                                                @endif
                                            </div >
                                        </div >
                                    </div >
                                </div >


                                <div class="row" >
                                    <div class="form-body" >
                                        <div class="col-md-6" >
                                            <div class="form-group" >
                                                <label >Business's Hub</label >
                                                @php
                                                    $business_hubs=\Illuminate\Support\Facades\DB::table('business_hub')->orderBy('description','asc')->get();
                                                @endphp
                                                <select name="business_hub" class="form-control" >
                                                    @foreach($business_hubs  as $bh)
                                                        <option value="{{$bh->id}}" >{{$bh->description}}</option >
                                                    @endforeach

                                                </select >
                                            </div >
                                        </div >
                                        <div class="col-md-6" >
                                            <div class="form-group" >
                                                <label >Country </label >
                                                @php
                                                    $country=\Illuminate\Support\Facades\DB::table('country')->orderBy('name','asc')->get();
                                                @endphp
                                                <select name="country" class="form-control" >
                                                    @foreach($country as $cou)
                                                        <option value="{{$cou->id}}" >{{$cou->name}}</option >
                                                    @endforeach

                                                </select >
                                            </div >
                                        </div >
                                    </div >
                                </div >
                                <div class="row" >
                                    <div class="form-body" >
                                        <div class="col-md-6" >
                                            <div class="form-group" >
                                                <label >City </label >
                                                <select name='city' class="form-control" >
                                                    <option value="1" >Option 1</option >

                                                </select >
                                            </div >
                                        </div >
                                        <div class="col-md-6" >

                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}" >
                                                <label >Description</label >
                                                <textarea class="form-control" rows="3"
                                                        name="description" >{{old('description')}}</textarea >
                                                @if ($errors->has('description'))
                                                    <span class="help-block" >
                                                    <strong >{{ $errors->first('description') }}</strong >
                                                     </span >
                                                @endif
                                            </div >

                                        </div >

                                    </div >

                                    <div class="row" >
                                        <div class="form-body" >

                                            <div class="col-md-6" >
                                                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}" >
                                                    <label >Address</label >
                                                    <textarea class="form-control" name="address" rows="3"
                                                            name="address" >{{old('address')}}</textarea >
                                                    @if ($errors->has('address'))
                                                        <span class="help-block" >
                                                    <strong >{{ $errors->first('address') }}</strong >
                                                     </span >
                                                    @endif
                                                </div >

                                                <div class="form-actions" >
                                                    <button type="submit" class="btn blue" >Submit</button >
                                                    <button type="button" class="btn default" >Cancel</button >
                                                </div >
                                            </div >
                                        </div >
                                    </div >
                                </div >

                            </form >
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <!-- END SAMPLE FORM PORTLET-->
                        </div >
                    </div >
                    <!-- END CONTENT BODY -->
                </div >
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <a href="javascript:;" class="page-quick-sidebar-toggler" >
                    <i class="icon-login" ></i >
                </a >
                <!-- END QUICK SIDEBAR -->
            </div >
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <!-- END FOOTER -->
        </div >
        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay" ></div >
@endsection
