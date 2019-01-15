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
            <h1 class="page-title">Search
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
                        @include('user.inves.alert.balert')

                        <div class="row">
                            <div class="col-md-6">
                                <form method='post' action="{{url('inves/search')}}" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="col-md-12"><strong>Search Company</strong></div>

                                    <div class="col-md-8">
                                        <?php
                                        $companies = \Illuminate\Support\Facades\DB::table('company')->get();
                                        ?>
                                        <select style="float:left;" class="form-control select2me" name="company">
                                            @foreach ($companies as $company)

                                                <option value="{{$company->id}}">
                                                    {{$company->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="type" value="c"/>

                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-success"
                                               value="Search">
                                        </input>
                                    </div>


                                </form>
                            </div>
                            <div class="col-md-6">
                                <form method='post' action="{{url('inves/search')}}" class="form-horizontal">
                                    <div class="col-md-12"><strong>Search Investor</strong></div>

                                    <div class="col-md-8">
                                        <?php
                                        $inves = \Illuminate\Support\Facades\DB::table('investor')->get();
                                        ?>
                                        <select style="float:left;" class="form-control select2me" name="inves">
                                            @foreach ($inves as $i)

                                                <option value="{{$i->id}}">
                                                    {{$i->name}}</option>
                                            @endforeach

                                        </select>
                                            <input type="hidden" name="type" value="i"/>


                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-success"
                                               value="Search">
                                        </input>
                                    </div>


                                </form>
                            </div>

                        </div>
                        @if(!empty($comdata))

                            @foreach($comdata as $d)
                                <div class="row" style="padding:12px;">
                                    <div class="col-md-12 ">
                                        <!-- BEGIN Portlet PORTLET-->
                                        <div class="portlet solid blue-hoki">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>{{$d->name}} </div>

                                            </div>
                                            <div style="float:right;" >
                                                <a href="{{url('inves/other_activities/'.$d->user_id)}}" class="btn green"> Activities <i class="fa fa-plus"></i>
                                                </a>

                                            </div>

                                            <div class="portlet-body">
                                                <div class="scroller" style="height:200px">
                                                    <img src="{{asset('users/entro/photo/'.$d->logo)}}" width="152"
                                                         style=" vertical-align: text-top;float:left;margin:9px;">

                                                    </img>
                                                    <p> {{$d->description}} </p>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Portlet PORTLET-->
                                    </div>
                                </div>
                                <div class="row" style="padding:12px;">
                                    <div class="col-md-3">
                                        <!-- BEGIN Portlet PORTLET-->
                                        <div class="portlet box blue-hoki">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Ceo Detail
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="" class="fullscreen"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                </div>
                                            </div>

                                            <div class="portlet-body">
                                                <ul style="list-style:none;padding-left:2px;">
                                                    <li><i class="fa fa-user" style="float:left;"></i><h5
                                                                style="color:#5f5963;font-weight:bold;">
                                                            &nbsp; {{$d->ceo_name}}</h5>
                                                    </li>


                                                    <li>
                                                        <i class="fa fa-envelope" style="float:left;"></i>
                                                        <h5 style="color:#5f5963;font-weight:bold;">
                                                            &nbsp; {{$d->ceo_email}}</h5>
                                                    </li>
                                                    <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                                                style="color:#5f5963;font-weight:bold;">
                                                            &nbsp; {{$d->ceo_phone}}</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- END Portlet PORTLET-->
                                    </div>
                                    <div class="col-md-9">
                                        <!-- BEGIN Portlet PORTLET-->
                                        <div class="portlet box blue-hoki">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Other Details of Company
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="" class="fullscreen"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                </div>
                                            </div>

                                            <div class="portlet-body">
                                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">
                                                        Looking for
                                                        investment </h5> :
                                                    @if ($d->investment == '0')
                                                        <i class="fa fa-close" style="color:darkred;"></i>
                                                    @else
                                                        <i class="fa fa-check" style="color:#32c5d2;"></i>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">
                                                        Registration
                                                        Status </h5> :
                                                    @if ($d->registration_status == '0')
                                                        <i class="fa fa-close" style="color:darkred;"></i>
                                                    @else
                                                        <i class="fa fa-check" style="color:#32c5d2;"></i>
                                                    @endif

                                                </div>
                                                <div class="col-md-12 col-lg-6">
                                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">
                                                        City</h5>:<span
                                                            style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->city_id}}</span>

                                                </div>

                                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">
                                                        Country</h5>
                                                    :
                                                    <span style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->country_id}}</span>
                                                </div>

                                                <div class="col-md-12 col-lg-6">
                                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Expire
                                                        Date</h5> :
                                                    <span style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->expire_date}}</span>
                                                </div>
                                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">
                                                        Website Link </h5>
                                                    : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a
                                                                href="{{$d->website}}">{{$d->website}} <span
                                                                    class="fa fa-arrow-right"></span></a> </span>
                                                </div>
                                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">
                                                        Facebook Link </h5>
                                                    : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a
                                                                href="{{$d->facebook}}">{{$d->facebook}} <span
                                                                    class="fa fa-arrow-right"></span></a> </span>
                                                </div>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                            </div>
                                        </div>
                                        <!-- END Portlet PORTLET-->
                                    </div>
                                </div>
                                <div class="row" style="padding:12px;">
                                    <div class="col-md-12">
                                        <!-- BEGIN Portlet PORTLET-->
                                        <div class="portlet box blue-hoki">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Contact Info
                                                </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="" class="fullscreen"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                </div>
                                            </div>

                                            <div class="portlet-body">
                                                <div class="col-md-12 col-lg-6">

                                                    <ul style="list-style:none;padding-left:2px;">
                                                        <li><i class="fa fa-user" style="float:left;"></i><h5
                                                                    style="color:#5f5963;font-weight:bold;">
                                                                &nbsp; {{$d->name}}</h5>
                                                        </li>


                                                        <li>
                                                            <i class="fa fa-envelope" style="float:left;"></i>
                                                            <h5 style="color:#5f5963;font-weight:bold;"> {{$d->email}}</h5>
                                                        </li>
                                                        <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                                                    style="color:#5f5963;font-weight:bold;">
                                                                &nbsp; {{$d->phone}}</h5>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-12 col-lg-6">
                                                    <h4 class="title" style="font-weight:bolder;color:#5f5963;"> Full
                                                        address</h4>
                                                    <h5 style="color: #888;font-weight:bold;">
                                                        {{$d->address}}</h5>
                                                </div>

                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                            </div>
                                        </div>
                                        <!-- END Portlet PORTLET-->
                                    </div>

                                </div>
                                @endforeach
                                <div style="float:right;" >
                                    <a href="{{url('inves/reply_message/'.$d->user_id)}}" class="btn green"> Send Message <i class="fa fa-arrow-right"></i>
                                    </a>

                                </div>
                                @endif
                        @if(!empty($invesdata))
                            @foreach($invesdata as $data)
                                <div class="row">&nbsp;</div>
                        <div class="portlet-body">
                            <div class="col-md-12">
                                <form class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Name
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                {{$data->name}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Business Type
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                @php
                                                    $bhn=\Illuminate\Support\Facades\DB::table('business_hub')->where('id',$data->business_hub_id)->first();
                                                @endphp
                                                {{$bhn->description}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Country
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                @php
                                                    $cn=\Illuminate\Support\Facades\DB::table('country')->where('id',$data->country_id)->first();
                                                @endphp
                                                {{$cn->name}}
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Budget Min
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                {{$data->budget_min}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Budget Max
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                {{$data->budget_max}}
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">created_at
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                {{$data->created_at}}
                                            </div>

                                        </div>

                                    </div>


                                </form>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-6" >
                                            <a href="{{url('inves/other_activities/'.$data->user_id)}}" class="btn green"> Activities <i class="fa fa-plus"></i>
                                            </a>
                                            <a href="{{url('inves/reply_message/'.$data->user_id)}}" class="btn green"> Send Messages <i class="fa fa-arrow-right"></i>
                                            </a>

                                        </div>



                                    </div>

                                </div>
                                <!-- END FORM-->
                            </div>


                        </div>
                            @endforeach
                        @endif


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
    <script>
        function go(link) {
            window.location.assign(link);
        }
        ;
    </script>


@endsection
