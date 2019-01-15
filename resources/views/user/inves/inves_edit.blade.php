@extends('layouts.inves_layouts.dashboard')

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
            <h1 class="page-title"> Edit Inverstor Infomation
                <small></small>
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
                        <div class="portlet-body">
                            {!! Form::model($data,['method'=>'post','url'=>'inves_req_edit'])!!}
                            {{csrf_field()}}

                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="list-group-item bg-green bg-font-blue"
                                             style="text-align: center;">
                                            <h4 style="font-weight:bolder;"> Personal Information....</h4></div>
                                    </label>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="row">&nbsp;</div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="input-title">What is your full name?

                                        </label>

                                        <input type="text" name="name" data-required="1" value="{{$data->name}}"
                                               class="form-control" required/>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="input-title">What is your phone number?

                                        </label>

                                        <input type="number" name="phone" data-required="1" value="{{$data->phone}}"
                                               class="form-control" required/>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('background_info') ? ' has-error' : '' }}">
                                        <label class="input-title">What is your background information?

                                        </label>

                                            <textarea class="" rows="4" style="width:100%" name="background_info"
                                                      data-error-container="" maxlength="500"
                                                      required>{{$data->background_info}}</textarea>


                                        @if ($errors->has('background_info'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('background_info') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label class="input-title">What is your contact address?

                                        </label>

                                            <textarea class="" rows="4" style="width:100%" name="address"
                                                      data-error-container="" maxlength="500"
                                                      required>{{$data->address}}</textarea>


                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>

                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                        <label class="input-title">Country?
                                        </label>


                                        <select class="form-control" id="country" name="country_id" required>
                                            @php
                                            $selected_country=DB::table('countries')->where('id',$data->country_id)->first();
                                            @endphp
                                            <option value="{{$selected_country->id}}" style="word-wrap:break-word" selected>{{$selected_country->name}}</option>
                                            <?php
                                            $bcc = \Illuminate\Support\Facades\DB::table('countries')->get();
                                            ?>
                                            @foreach ($bcc as $bc)
                                                <option value="{{$bc->id}}"
                                                        style="word-wrap:break-word">{{$bc->name}}</option>

                                            @endforeach
                                        </select>

                                        @if ($errors->has('country_id'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('country_id') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                        <label class="input-title">City/State?
                                        </label>


                                        <select class="form-control " id="cities" name="city_id" required>
                                            @php
                                            $selected_city=DB::table('cities')->where('id',$data->city_id)->first();
                                            @endphp
                                            <option value="{{$selected_city->id}}"
                                                    style="word-wrap:break-word" selected>{{$selected_city->name}}</option>

                                        </select>

                                        @if ($errors->has('city_id'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('city_id') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="list-group-item bg-green bg-font-blue"
                                             style="text-align: center;">
                                            <h4 style="font-weight:bolder;"> Personal Information....</h4></div>
                                    </label>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="row">&nbsp;</div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('business_hub_id') ? ' has-error' : '' }}">
                                        <label class="input-title">Which Business Industries are you interesting for
                                            the investment?

                                        </label>
                                        <select class="form-control select2me" name="business_hub_id[]"
                                                multiple required>
                                            @php
                                            $sbharr=explode(',',$data->business_hub_id);


                                            @endphp
                                            @foreach($sbharr as $sba)
                                                @php
                                                $selected_business_hub=DB::table('business_hub')->where('id',$sba)->first();
                                            @endphp
                                                <option value="{{$selected_business_hub->id}}"
                                                        style="word-wrap:break-word" selected>{{$selected_business_hub->description}}</option>
                                            @endforeach


                                            <?php
                                            $bh = \Illuminate\Support\Facades\DB::table('business_hub')->get();
                                            ?>
                                            @foreach ($bh as $b)
                                                <option value="{{$b->id}}"
                                                        style="word-wrap:break-word">{{$b->description}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('business_hub_id'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('business_hub_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('country_id_to_invest') ? ' has-error' : '' }}">
                                        <label class="input-title">Which country of business are you going to make
                                            investment?
                                        </label>


                                        <select class="form-control select2me" name="country_id_to_invest" required>
                                            @php
                                            $selected_country_ti=DB::table('countries')->where('id',$data->country_id_to_invest)->first();
                                            @endphp
                                            <option value="{{$selected_country_ti->id}}" style="word-wrap:break-word" selected>{{$selected_country_ti->name}}</option>
                                            <?php
                                            $bcc = \Illuminate\Support\Facades\DB::table('countries')->get();
                                            ?>
                                            @foreach ($bcc as $bc)
                                                <option value="{{$bc->id}}"
                                                        style="word-wrap:break-word">{{$bc->name}}</option>

                                            @endforeach
                                        </select>

                                        @if ($errors->has('country_id_to_invest'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('country_id_to_invest') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-12 {{ $errors->has('budget_min') ? ' has-error' : '' }}">

                                    <div class="col-md-12 input-title" style="padding-left:0px;">Please Describe the
                                        budget limit?(US $)

                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="budget_min" placeholder="Budget min"
                                               data-required="1" value="{{$data->budget_min}}"
                                               class="form-control" required/>
                                    </div>
                                    <div class="col-md-6">

                                        <input type="number" name="budget_max" placeholder="Budget Max"
                                               data-required="1" value="{{$data->budget_max}}"
                                               class="form-control" required/>
                                    </div>

                                    @if ($errors->has('budget_min'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('budget_min') }}</strong>
                                                     </span>
                                    @endif
                                    @if ($errors->has('budget_max'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('budget_max') }}</strong>
                                                     </span>
                                    @endif
                                </div>

                                <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <br>

                                <div class="col-md-6 {{ $errors->has('stage_of_product') ? ' has-error' : '' }}">
                                    <label class="input-title">Which business stage are you interested?

                                    </label>


                                    <select class=" select2me" name="stage_of_product[]" multiple
                                                     required/>
                                    @php
                                    $soparr=explode(',',$data->stage_of_product);


                                    @endphp
                                    @foreach($soparr as $sop)
                                        @php
                                        switch ($sop) {
                                        case 'start_up':
                                        $sopd='Sart Up';
                                        break;
                                        case 'ready_for_launch':
                                        $sopd='Ready For Launch';
                                        break;
                                        case 'market':
                                        $sopd='Market';
                                        break;
                                        case 'profitable':
                                        $sopd='Profitable';
                                        break;
                                        case 'other':
                                        $sopd='All of Stages';
                                        }
                                        @endphp

                                        <option value="{{$sop}}"
                                                style="word-wrap:break-word" selected>{{$sopd}}</option>
                                    @endforeach


                                    <option value="start_up" style="word-wrap:break-word">Start Up</option>
                                    <option value="ready_for_launch" style="word-wrap:break-word">Ready For Launch
                                    </option>
                                    <option value="market" style="word-wrap:break-word">Market</option>
                                    <option value="profitable" style="word-wrap:break-word">Profitable
                                    </option>
                                    <option value="other" style="word-wrap:break-word" >All of Stage
                                    </option>
                                    </select>
                                    @if ($errors->has('stage_of_product'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('stage_of_product') }}</strong>
                                            </span>
                                    @endif
                                </div>
                             <input type="hidden" name="id" value="{{$data->id}}"/>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">

                                            <button type="submit" class="btn btn-lg blue " style="float:right;color:white;">
                                                Edit <span class="fa fa-plus"></span>
                                            </button>
                                        </div>
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


@endsection
