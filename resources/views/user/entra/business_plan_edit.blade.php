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
            <h1 class="page-title page_title"> 
                Business Plan Edit
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
                            {!! Form::model($data,['method'=>'post','url'=>'/business_plan_edit','enctype'=>"multipart/form-data"])!!}
                            <div class="">

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="list-group-item bg-green bg-font-blue" style="text-align: center;">
                                            <h4 style="font-weight:bolder;"> Product Information....</h4></div>
                                    </label>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="row">&nbsp;</div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label class="input-title">Title of your products/Services

                                        </label>

                                        <input type="text" name="title" data-required="1" value="{{$data->title}}"
                                               class="form-control" required/>

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('business_hub_id') ? ' has-error' : '' }}">
                                        <label class="input-title">Select your Product/Services Industry 1

                                        </label> <select class="form-control select2me" name="business_hub_id">
                                            <?php
                                            $bh = \Illuminate\Support\Facades\DB::table('business_hub')->orderBy('description','asc')->get();
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
                                    <div class="form-group {{ $errors->has('business_group_id') ? ' has-error' : '' }}">
                                        <label class="input-title">Select your Product/Services Industry 2

                                        </label>

                                        <select class=" select2me" name="business_group_id" required/>
                                        @php
                                        $selected_bg=DB::table('business_group')->orderBy('name','asc')->where('id',$data->business_group_id)->first();
                                        @endphp
                                        <option value="{{$selected_bg->id}}" style="word-wrap:break-word"
                                                selected>{{$selected_bg->name}}</option>

                                        <?php
                                        $busg = \Illuminate\Support\Facades\DB::table('business_group')->get();
                                        ?>
                                        @foreach ($busg as $bg)
                                            <option value="{{$bg->id}}"
                                                    style="word-wrap:break-word">{{$bg->name}}</option>
                                            @endforeach
                                            </select>

                                            @if ($errors->has('business_group_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('business_group_id') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                                </div>

                                <div class="col-md-6 {{ $errors->has('stage_of_product') ? ' has-error' : '' }}">
                                    <label class="input-title">Choose Stage of your Product/Services

                                    </label> <select class=" select2me" name="stage_of_product" required/>
                                    @php
                                    switch ($data->stage_of_product) {
                                    case 'start_up':
                                    $sop='Sart Up';
                                    break;
                                    case 'ready_for_launch':
                                    $sop='Ready For Launch';
                                    break;
                                    case 'market':
                                    $sop='Market';
                                    break;
                                    case 'profitable':
                                    $sop='Profitable';
                                    break;
                                    case 'other':
                                    $sop='other';
                                    }
                                    @endphp
                                    <option value="{{$data->stage_of_product}}" style="word-wrap:break-word"
                                            selected>{{$sop}}</option>


                                    <option value="start_up" style="word-wrap:break-word">Start Up</option>
                                    <option value="ready_for_launch" style="word-wrap:break-word">Ready For Launch
                                    </option>
                                    <option value="market" style="word-wrap:break-word">Market</option>
                                    <option value="profitable" style="word-wrap:break-word">Profitable
                                    </option>
                                    <option value="other" style="word-wrap:break-word">Other</option>
                                    </select>
                                    @if ($errors->has('stage_of_product'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('stage_of_product') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">

                                        <label class="">Please Describe your product/services in detail

                                        </label>

                                        <br> <textarea class="wysihtml5 form-control" rows="4" name="description"
                                                       data-error-container="#editor1_error">{{$data->description}}</textarea>
                                        <div id="editor1_error">
                                        </div>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="row"></div>
                                <div class=" ">

                                    <label class="control-label col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="list-group-item bg-green bg-font-blue" style="text-align: center;">
                                            <h4 style="font-weight:bolder;"> Market Analysis....</h4></div>
                                    </label>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="row">&nbsp;</div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('target_customer') ? ' has-error' : '' }}">
                                        <label class="input-title"> Who are your Target Customer !detail

                                        </label>
                                            <textarea class="" rows="4" name="target_customer" style="width:100%;"
                                                      data-error-container="" maxlength="500"
                                                      required>{{$data->target_customer}}</textarea>

                                        @if ($errors->has('target_customer'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('target_customer') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('market_value') ? ' has-error' : '' }}">
                                        <label class="input-title">Describe the Market Value of your Product/Service
                                            detail

                                        </label>

                                            <textarea class="" rows="4" name="market_value" style="width:100%;"
                                                      data-error-container="" maxlength="500"
                                                      required>{{$data->market_value}}</textarea>

                                        @if ($errors->has('market_value'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('market_value') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('competitor_des') ? ' has-error' : '' }}">
                                        <label class="input-title">Explain your competitors' positioning and
                                            describe their strengths and weaknesses.

                                        </label>

                                            <textarea class="" rows="4" name="competitor_des" style="width:100%;"
                                                      data-error-container="" maxlength="500"
                                                      required>{{$data->competitor_des}}</textarea>

                                        @if ($errors->has('competitor_des'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('competitor_des') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>

                                <input type="hidden" name="city_id" value="1"/>
                                <div class="row">&nbsp;</div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="input-title">Description </label>

                                            <textarea class="wysihtml5 form-control" rows="4" name="description"
                                                      data-error-container="#editor1_error">{{$data->description}}</textarea>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                        @endif

                                    </div>
                                </div>


                                <div class="row">&nbsp;</div>

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="list-group-item bg-green bg-font-blue" style="text-align: center;">
                                            <h4 style="font-weight:bolder;"> Your Management Team ....</h4></div>
                                    </label>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="row">&nbsp;</div>

                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('user_position') ? ' has-error' : '' }}">
                                        <label class="input-title">What is your position in your company?

                                        </label>

                                        <input type="text" name="user_position" data-required="1"
                                               value="{{$data->user_position}}"
                                               class="form-control" required/>

                                        @if ($errors->has('user_position'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('user_position') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <div class="form-group {{ $errors->has('founders') ? ' has-error' : '' }}">
                                        <label class="input-title">Who are founders of your company?

                                        </label>
                                        <input type="text" name="founders" data-required="1" value="{{$data->founders}}"
                                               class="form-control" required/>
                                        @if ($errors->has('founders'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('founders') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('background_founders') ? ' has-error' : '' }}">
                                        <label class="input-title">What is the background of your founder?

                                        </label>
                                            <textarea rows="4" style="width:100%;" name="background_founders"
                                                      data-error-container="" maxlength="500" class="form-control"
                                                      required>{{$data->background_founders}}</textarea>


                                        @if ($errors->has('background_founders'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('background_founders') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <div class="form-group {{ $errors->has('count_employees') ? ' has-error' : '' }}">
                                        <label class="input-title">How many employees are currently working for your
                                            company?

                                        </label>
                                        <input type="number" name="count_employees" data-required="1"
                                               value="{{$data->count_employees}}"
                                               class="form-control" required/>
                                        @if ($errors->has('count_employees'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('count_employees') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                        <label class="input-title">Where is the Management Located?
                                        </label>


                                        <select class="form-control select2me" name="country_id" required>
                                            @php
                                            $selected_country=DB::table('countries')->where('id',$data->country_id)->first();
                                            @endphp
                                            <option value="{{$selected_country->id}}"
                                                    style="word-wrap:break-word">{{$selected_country->name}}</option>
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

                                    <div class="form-group {{ $errors->has('background_employees') ? ' has-error' : '' }}">
                                        <label class="input-title">What is the background of your employees?

                                        </label>

                                            <textarea class="" rows="4" style="width:100%" name="background_employees"
                                                      data-error-container="" maxlength="500"
                                                      required>{{$data->background_employees}}</textarea>


                                        @if ($errors->has('background_employees'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('background_employees') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">&nbsp;</div>

                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-6 col-md-4 ">
                                        <div class="list-group-item bg-green bg-font-blue" style="text-align: center;">
                                            <h4 style="font-weight:bolder;"> Financial Information....</h4></div>
                                    </label>
                                    <div class="col-md-4">

                                    </div>

                                </div>
                                <div class="row">&nbsp;</div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('looking_investment') ? ' has-error' : '' }}">
                                        <label class="input-title">How many Investment are you looking for?

                                        </label>

                                        <input type="text" name="looking_investment" data-required="1"
                                               class="form-control" value="{{$data->looking_investment}}" required/>

                                        @if ($errors->has('looking_investment'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('looking_investment') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('sharer') ? ' has-error' : '' }}">
                                        <label class="input-title">How much Share do you want to offer?

                                        </label>

                                        <input type="text" name="sharer" data-required="1"
                                               class="form-control" value="{{$data->sharer}}" required/>

                                        @if ($errors->has('sharer'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('sharer') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('monthly_revenues') ? ' has-error' : '' }}">
                                        <label class="input-title">What are your company's monthly revenues?

                                        </label>
                                        <input type="text" name="monthly_revenues" data-required="1"
                                               class="form-control" value="{{$data->monthly_revenues}}" required/>

                                        @if ($errors->has('monthly_revenues'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('monthly_revenues') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('monthly_expenses') ? ' has-error' : '' }}">
                                        <label class="input-title">What are your company's monthly expenses?
                                        </label>

                                        <input type="text" name="monthly_expenses" data-required="1"
                                               class="form-control" value="{{$data->monthly_expenses}}" required/>

                                        @if ($errors->has('monthly_expenses'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('monthly_expenses') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('video_url') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-3 input-title">Upload the video files that
                                        Explain about
                                        your business plan?(optional)
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" name="video_url"/>
                                    </div>
                                    @if ($errors->has('video_url'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('video_url') }}</strong>
                                                     </span>
                                    @endif
                                </div>

                            </div>
                            <input type="hidden" name="id" value="{{$data->id}}"/>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-lg blue" style="float:right;">Save And Send
                                        </button>
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
