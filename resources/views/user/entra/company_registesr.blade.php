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
                        @include('user.entra.alert.alert')

                        <div class="portlet-body form">
                            <div class="row " style="font-weight:bold;color:#888;margin-left:9px;">
                                Hi {{Auth::user()->name}}<br>
                                Please Complete the information for your Company!

                            </div>
                            <div class="clearfix"></div>

                            <form action='{{url('company_register_form_two')}}' enctype="multipart/form-data" role="form" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="row">
                                
                                        
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-5 control-label input-title">
                                            What is the name of your Company?
                                        </label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Company Name" value="{{old('name')}}" required="required" />
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group {{ $errors->has('business_hub') ? ' has-error' : '' }}">
                                        <label class="col-md-5 control-label input-title">
                                            What Business Hubs are you in?
                                        </label>
                                        <div class="col-md-7">
                                            <select class="form-control select2me" name="business_hub">
                                                <?php
                                                $bh = \Illuminate\Support\Facades\DB::table('business_hub')->orderBy('description','asc')->get();
                                                ?>
                                                @foreach ($bh as $b)
                                                    <option value="{{$b->id}}"
                                                            style="word-wrap:break-word">{{str_limit($b->description,'50')}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('business_hub'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('business_hub') }}</strong>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>
                                       
                                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label class="col-md-5 control-label input-title">
                                            Tell me the Address of Your Company?
                                        </label>
                                        <div class="col-md-7">
                                            <textarea class="form-control" name="address" rows="3"
                                                name="address">{{old('address')}}</textarea>
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="form-group  {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="col-md-5 control-label input-title">Phone No.</label>

                                        <div class="col-md-7">
                                            <input type="number" class="form-control" name="phone"  placeholder="Phone No." value="{{old('phone')}}" required/>
                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>

                                    
                                    <div class="form-group">
                                        <label class="col-md-5 control-label input-title"> Country </label>

                                        <div class="col-md-7">
                                            <select class="form-control" id="country" name="country_id">
                                                <?php
                                                $bcc = \Illuminate\Support\Facades\DB::table('countries')->get();

                                                ?>
                                                   <option value="150" style="word-wrap:break-word">
                                                      Myanmar
                                                </option>
                                                @foreach ($bcc as $bc)
                                                <option value="{{$bc->id}}" style="word-wrap:break-word">
                                                        {{$bc->name}}
                                                </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="clearfix"></div>

                                    <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                        <label class="input-title control-label col-md-5">City/State? </label>

                                        <div class="col-md-7">
                                            <select class="form-control " id="cities" name="city_id">
                                                <?php
                                                $states = DB::table('states')->where('country_id', 150)->get();
                                                foreach ($states as $s) {
                                                $cities = DB::table('cities')->where('state_id', $s->id)->get();
                                                ?>
                                                @foreach ($cities as $bc)
                                                    <option value="{{$bc->id}}">{{$bc->name}}</option>

                                                @endforeach

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        @if ($errors->has('city_id'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('city_id') }}</strong>
                                             </span>
                                        @endif
                                    </div>

                                    <div class="clearfix"></div>
                            
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="input-title col-md-5 control-label">
                                            What is Email of your Company?
                                        </label>

                                        <div class="col-md-7">
                                            <input type="email" class="form-control" name="email" placeholder="Email of your Company" value="{{old('email')}}" required/>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                     </span>
                                        @endif
                                    </div>



                                <div class="row">
                                    <div class="col-md-12" >
                                            <button type="submit" class="btn btn-lg green pull-right">Save And Continue To Other Page</button>
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

