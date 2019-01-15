@extends('layouts.dashboard')

@section('content')
<!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Company Register
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
@if(\Illuminate\Support\Facades\Session::has('no_auth'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    You need to register or login to see projects details
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif


<div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
    <div class="col-sm-12" >
        <div class=""  style="margin-left:8%;margin-right:4%;width:80%;background-color:#e4e44d;margin-top:34px;border-radius:4px !important;height:43px;">
            <div style="margin-left:4%;padding-top:1%;font-size:17px;font-weight:bolder;">
              <a href="">  Home </a> >>>   Company Registration Form
            </div>
        </div>
        <form action='{{url('company_register_form_two')}}' enctype="multipart/form-data" role="form" method="post" class="form-horizontal" style="margin-top:22px;">
            {{csrf_field()}}
            <div class="row">


                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label input-title f_label">
                        What is the name of your Company?
                    </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control f" name="name"
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
                    <label class="col-md-3 control-label input-title f_label">
                        What Business Hubs are you in?
                    </label>
                    <div class="col-md-7">
                        <select class="form-control select2me f" name="business_hub">
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
                    <label class="col-md-3 control-label input-title f_label">
                        Tell me the Address of Your Company?
                    </label>
                    <div class="col-md-7">
                                            <textarea class="form-control f" name="address" rows="3"
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
                    <label class="col-md-3 control-label input-title f_label">Phone No.</label>

                    <div class="col-md-7">
                        <input type="number" class="form-control f" name="phone"  placeholder="Phone No." value="{{old('phone')}}" required/>
                    </div>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                             </span>
                    @endif
                </div>

                <div class="clearfix"></div>


                <div class="form-group">
                    <label class="col-md-3 control-label input-title f_label"> Country </label>

                    <div class="col-md-7">
                        <select class="form-control f" id="country" name="country_id">
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
                    <label class="input-title control-label col-md-3 f_label">City/State? </label>

                    <div class="col-md-7">
                        <select class="form-control f" id="cities" name="city_id">
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
                    <label class="input-title col-md-3 control-label f_label">
                        What is Email of your Company?
                    </label>

                    <div class="col-md-7">
                        <input type="email" class="form-control f" name="email" placeholder="Email of your Company" value="{{old('email')}}" required/>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                     </span>
                    @endif
                </div>



                <div class="row">
                    <div class="col-xs-12 col-md-2">&nbsp;</div>
                    <div class="col-xs-12 col-md-8" >
                        <button type="submit" class="btn btn-lg green pull-right f" style="float:right;">Save And Continue To Other Page</button>
                    </div>
                    <div class="col-xs-12 col-md-2">&nbsp;</div>

                </div>
            </div>

        </form>


</div>
</div>

@endsection