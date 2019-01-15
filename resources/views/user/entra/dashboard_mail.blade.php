<?php
echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');
?>
        <!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>User Login </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('fontawesome/css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('global/css/components.min.css')}}" rel="stylesheet" id="style_compoents" type="text/css"/>
    <link href="{{asset('global/css/plugins.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('pages/css/login-5.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <!-- BEGIN THEME LAYOUT STYLES -->
    <style>
        .top_header {
            margin-left: 111px;
        }
        .f{
            border-radius: 12px !important;
        }
        .f_label{
            font-weight:bolder;color:#928989;
        }

        .background_lyrics {
            color: #ffed03;
            font-size: 33px;
            margin-left: 192px;
            margin-top: 123px;
            font-weight: bolder;
            height: 222px;
        }

        .top_m {
            float: right;
            margin-top: 5%;
        }

        .bg-z {
            height: 622px;
        }

        .login_box {
            border: 2px solid #1918182e;
            background-color: white;
            width: 312px;
            height: 422px;
            border-radius: 22px !important;
            margin-left: 17%;

        }

        .login_box_title {
            background-color: #345884;
            width: 322px;
            margin-left: -7px;
            margin-top: 8%;
            text-align: center;
            height: 47px;
            padding: 12px;
            font-size: 22px;
        }

        .footer_img {
            float: right;
            width: 61px;
            margin-top: 5%;
        }

        .login_parent {
            padding: 122px;
        }

        .latest {
            margin-left: 12px;
            width: 90%;
            border: 1px solid #cdc2c2;
            border-bottom: 2px solid #659be0;
            background-color: white;
            padding: 12px;
        }

        .bgs {
            background-image: url('http://localhost/companies/public/images/banner.jpg');
            color: white;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 433px;
        }

        .form_yk {
            padding-left: 12px;
            width: 271px;
            margin-left: 12px;
            height: 42px;
            border-radius: 9px !important;
            color: black;
            background-color: #c1c1c17a;
            border: 1px solid #b1a5a52e;
        }

        @media only screen and (max-width: 900px) {
            .top_m {
                float: none;
                margin-top: 5%;
            }

            .background_lyrics {
                color: #ffed03;
                font-size: 33px;
                margin-left: 52px;
                margin-top: 55px;
                font-weight: bolder;
                height: 222px;
            }

            .bgs {
                background-image: url('http://localhost/companies/public/images/banner.jpg');
                color: white;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                height: 433px;
            }

            .latest {
                margin-left: 22px;
                width: 90%;
                border: 1px solid #cdc2c2;
                border-bottom: 2px solid #659be0;
                background-color: white;
                padding: 12px;
            }

            .bg-z {
                height: 422px;
            }

            .login_parent {
                padding: 22px;
            }

            .top_header {
                margin-left: 111px;
            }

            .login_box {
                border: 1px solid #b1a5a52e;
                background-color: white;

                width: 312px;
                height: 422px;
                border-radius: 22px !important;
                margin-left: 28%;
            }

            .login_box_title {
                background-color: #345884;
                width: 322px;
                margin-left: -7px;
                margin-top: 8%;
                text-align: center;
                height: 47px;
                padding: 12px;
                font-size: 22px;
            }

            .form_yk {
                padding-left: 12px;
                width: 271px;
                margin-left: 22px;
                height: 42px;
                border-radius: 9px !important;
                color: black;
                background-color: #c1c1c17a;
                border: 1px solid #b1a5a52e;
            }
        }</style>

    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->

<body>
<!-- BEGIN : LOGIN PAGE 5-1 -->

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
<div class="col-xs-12" style="background:#345884;">
    <div class="col-xs-12 col-sm-2 col-md-2">
        <div class="top_header">
            <img src="{{asset('images/logo/logo.png')}}" class="logo" style="width:152px;height:82px;"/>
            <h3 class="" style="font-weight:bolder;color:white;font-size:33px;margin-top:-12px;"> HivePhing </h3>

        </div>
    </div>
    <div class="col-xs-12 col-sm-10 col-md-10">
        <div class="col-xs-12 col-sm-12 col-md-2">&nbsp;</div>
        <div class="col-xs-12 col-sm-12 col-md-8" style="color:white;text-align: center;">
            <div class="top_m" style="">
                <div class="col-xs-4  col-sm-4 col-md-4"><a href="{{url('about_us')}}"
                                                            style="text-align: center;white-space: nowrap;color:white;font-weight:bolder;">About
                        US </a></div>
                <div class="col-xs-4  col-sm-4 col-md-4"><a href=""
                                                            style="text-align: center;white-space: nowrap;color:white;font-weight:bolder;">News</a>
                </div>
                <div class="col-xs-4  col-sm-4 col-md-4"><a href=""
                                                            style="text-align: center;white-space: nowrap;color:white;font-weight:bolder;">Activities</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2">&nbsp;</div>

    </div>
</div>
<div class="col-xs-12 bgs" style="">
    <div class="col-xs-12 col-sm-12 col-md-6" style="">
        <div class="row background_lyrics" style="">
            <br>Company Registration Form
        </div>
        <div class="row" style="color:#3e3d3d;font-size:23px;margin-left:192px;margin-top:13px;visibility: hidden;">
            Hivephing is easy to
            use cloud based B2B (Business to Business)<br>used by business every hub to increase sales and ultimately
            grow
        </div>
    </div>
</div>

<div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <div class="theme-panel hidden-xs hidden-sm">

        </div>
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">

            <div class="page-toolbar">
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
            Company Detail Edit Form
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Company Edit Form</span>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="note note-success">
                            <h4 class="block">Successful</h4>

                            <p> Your company was
                                successfully {{\Illuminate\Support\Facades\Session::get('success')}}

                            </p>
                        </div>
                    @endif
                    <div class="portlet-body form">
                        <form action='{{url('company_edit')}}' enctype="multipart/form-data" role="form"
                              method="post">
                            {{csrf_field()}}
                            @foreach($data as $d)
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label>Email Address</label>
                                                <input type="text" class="form-control f" name="email"
                                                       placeholder="Email Address" value="{{$d->email}}">
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
                                                <input type="text" class="form-control f" name="name"
                                                       placeholder="Company Name" value="{{$d->name}}">
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

                                                <input type="number" class="form-control f" name="phone"
                                                       placeholder="Phone No." value="{{$d->phone}}">
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

                                                <input type="text" class="form-control f" name="website"
                                                       placeholder="optional" value="{{$d->website}}">
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

                                                <input type="text" class="form-control f" name="facebook"
                                                       placeholder="optional" value="{{$d->facebook}}">
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

                                                <input type="text" class="form-control f" name="ceo_name"
                                                       placeholder="Name of Ceo" value="{{$d->ceo_name}}">
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

                                                <input type="number" class="form-control f" name="ceo_phone"
                                                       placeholder="Phone No. of Ceo" value="{{$d->ceo_phone}}">
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

                                                <input type="email" class="form-control f" name="ceo_email"
                                                       placeholder="Email of Ceo" value="{{$d->ceo_email}}">
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
                                                <select class="form-control f select2me" name="business_hub">
                                                    <?php
                                                    $bh = \Illuminate\Support\Facades\DB::table('business_hub')->orderBy('description','asc')->get();
                                                    ?>
                                                    @php
                                                        $wb=\Illuminate\Support\Facades\DB::table('business_hub')->where([['id','=',$d->business_hub]])->first();
                                                    @endphp
                                                    <option value="{{$wb->id}}">{{$wb->description}}</option>
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

                                            <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                                <label class="input-title">Country?
                                                </label>


                                                <select class="form-control f" id="country" name="country_id" required>
                                                    @php
                                                        $selected_country=DB::table('countries')->where('id',$d->country_id)->first();
                                                    @endphp
                                                    <option value="{{$selected_country->id}}" style="word-wrap:break-word" selected>{{$selected_country->name}}</option>
                                                    <?php
                                                    $bcc = \Illuminate\Support\Facades\DB::table('countries')->get();
                                                    ?>
                                                    @foreach ($bcc as $bc)
                                                        <option value="{{$bc->id}}">{{$bc->name}}</option>

                                                    @endforeach
                                                </select>

                                                @if ($errors->has('country_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('country_id') }}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                                <label class="input-title">City/State?
                                                </label>


                                                <select class="form-control f" name="city_id" required>


                                                    @php
                                                        $selected_city=DB::table('cities')->where('id',$d->city_id)->first();
                                                    @endphp
                                                    <option value="{{$selected_city->id}}"
                                                            style="word-wrap:break-word" selected>{{$selected_city->name}}</option>
                                                    <?php

                                                    $cities = DB::table('cities')->whereBetween('state_id', ['2537','2551'])->orderBy('name','asc')->get();
                                                    ?>

                                                    @foreach ($cities as $bc)

                                                        <option value="{{$bc->id}}">{{$bc->name}}</option>

                                                    @endforeach


                                                </select>

                                                @if ($errors->has('city_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('city_id') }}</strong>
                                                         </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Invesment </label>
                                                <select name="investment" class="form-control f" required>
                                                    <option value="{{$d->investment}}" selected>
                                                        @if($d->investment == '1')
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </option>

                                                    <option value="1" selected>Yes</option>
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
                                                <select name="registration_status" class="form-control f">
                                                    <option value="{{$d->registration_status}}" selected>
                                                        @if($d->registration_status == '1')
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">NO</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>Year</label>
                                                <input type='number' class="form-control f" name="year_esta"
                                                       value="{{$d->year_esta}}"/>
                                                @if ($errors->has('year_esta'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('year_esta') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label>Description</label> <textarea class="form-control f" rows="3"
                                                                                     name="description">{!! $d->description !!}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label>Address</label>
                                                <textarea class="form-control f" name="address" rows="3"
                                                          name="address">{{ $d->address }}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
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

                                            <input type="hidden" name="id" value="{{$d->id}}"/>

                                            <div class="form-actions">
                                                <button type="submit" class="btn blue">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

</div>

<div class="col-xs-12" style="position:relative;background-color:yellow;height:40%;width:100%;">
    <div style="margin-left:2%;margin-right:2%;margin-top:2%;">
        <div class="col-xs-6 col-sm-4" style="text-align: center;">
            <div class="col-xs-6 col-sm-6">
                <img src="{{asset('images/homepage/mail_ico.png')}}" class="footer_img"/>
            </div>
            <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                <span style="font-weight:bolder;">Email</span>
                info@masterymyanmar.com
                info@hivephing.com
            </div>
        </div>
        <div class="col-xs-6 col-sm-4" style="text-align: center;">
            <div class="col-xs-6 col-sm-6">
                <img src="{{asset('images/homepage/phone_ico.png')}}" class="footer_img"/>
            </div>
            <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                <span style="font-weight:bolder;">Call Us</span><br>
                09456114442<br>
                09773777445
            </div>
        </div>
        <div class="col-xs-12 col-sm-4" style="text-align: center;">
            <div class="col-xs-6 col-sm-6">
                <img src="{{asset('images/homepage/location_ico.png')}}" class="footer_img"/>
            </div>
            <div class="col-xs-6 col-sm-6" style="text-align:left;margin-top:4%;">
                <span style="font-weight:bolder;">Address</span><br>
                No.112 myin thar 9 street,south okkalarpa township<br>
                Yangon
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-1 col-sm-3">
            &nbsp;
        </div>
        <div class="col-xs-12 col-sm-6">
            <img src="{{asset('images/homepage/facebook_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/google_plus-ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/linkedin_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/wk_ico.png')}}" style="float:left;margin-right:4%;" class="footer_img"/>
            <img src="{{asset('images/homepage/ytube_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/digg_ico.png')}}" style="float:left;margin-right:4%;"
                 class="footer_img"/>
            <img src="{{asset('images/homepage/z_ico.png')}}" style="float:left;margin-right:4%;" class="footer_img"/>
        </div>
        <div class="col-xs-1 col-sm-3">
            &nbsp;
        </div>

    </div>
    <div class="col-xs-12"
         style="text-align: center;margin-bottom:22px;font-weight:bolder;font-size:15px;color:#345884;margin-top:12px;">
        2018 Mastery Co.Ltd All Rights Reserved.

    </div>
</div>

{{--<div class="user-login">--}}
{{--<div class="user-login-5">--}}
{{--<div class="bg-img">--}}
{{--<div class="bs-reset">--}}

{{--<div class="">--}}

{{--<div class="col-md-8">--}}

{{--<div class="col-xs-6 col-sm-6 col-md-6">--}}
{{--<img src="{{asset('images/logo/logo.png')}}" class="logo" style="float: right;"/>--}}
{{--</div>--}}

{{--<div class="col-xs-6 col-sm-6 col-md-6" style="margin-top:27px;">--}}
{{--<p class="title-p"> Business Network </p>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<div class="mt-login-5-bsfix">--}}
{{--<div class="descript">--}}
{{--<p> Are you finding the right places to do business with? There are many ways to make--}}
{{--business connections but which is going to be the most effective for you? Nowadays,--}}
{{--many people are using IT to improve their Business Network. Do you want to link your--}}
{{--business to other business or associations? Hivephing has the original Business--}}
{{--Network Application that provides corporate business the means to connect with other--}}
{{--business to business and business to investors </p>--}}
{{--<div class="clearfix"></div>--}}
{{--<div>--}}
{{--<a href="{{ url('register') }}" class="btn btn-lg green start-now">--}}
{{--Getting Start Now--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-4 login-container mt-login-5-bsfix" style="min-height: 80% !important;">--}}
{{--<a href="see_project_without_auth" class="btn green"--}}
{{--style="float:right;margin-top:12px !important;">--}}
{{--To See Projects--}}
{{--</a>--}}
{{--<a href="usage" class="btn green" style="float:right;margin-top:12px !important;">--}}
{{--To Usage--}}
{{--</a>--}}
{{--<div class="login-content" style="margin-top:0% !important;">--}}

{{--<form action="{{ url('/login') }}" class="login-form" method="post">--}}
{{--{{ csrf_field() }}--}}

{{--<div class="row">--}}

{{--<div class="col-xs-12" style="padding: 20px;">--}}

{{--<a href="register" class="btn green">--}}
{{--Create an account--}}
{{--</a>--}}

{{--</div>--}}

{{--<div class="col-xs-12">--}}
{{--<input id="login"--}}
{{--class="form-control f form-control f-solid placeholder-no-fix input-bg"--}}
{{--type="email" autocomplete="off" placeholder="Email" name="email"--}}
{{--required="required"/>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="help-block">--}}
{{--<strong style="color:red;">--}}
{{--{{ $errors->first('email') }}--}}
{{--</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="col-xs-12">--}}
{{--<input id="login"--}}
{{--class="form-control f form-control f-solid placeholder-no-fix input-bg"--}}
{{--type="password"--}}
{{--autocomplete="off" placeholder="Password" name="password" required/>--}}
{{--@if ($errors->has('password'))--}}
{{--<span class="help-block">--}}
{{--<strong style="color:red;">--}}
{{--{{ $errors->first('password') }}--}}
{{--</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="col-xs-12 text-right">--}}

{{--<button class="btn green" type="submit" style="width:100%">Sign In</button>--}}
{{--</div>--}}
{{--</div>--}}

{{--</form>--}}
{{--<!-- BEGIN FORGOT PASSWORD FORM -->--}}

{{--<!-- END FORGOT PASSWORD FORM -->--}}
{{--</div>--}}
{{--<div class="" style="position:relative;padding-top:12px;float:right;">--}}
{{--<div class="row">--}}

{{--<div class="col-xs-12 ">--}}
{{--<div class="login-copyright" style="float:right;">--}}

{{--<div class="forgot-password">--}}
{{--<a href="{{ url('/password/reset') }}" id="forget-password"--}}
{{--class="forget-password" style="color: #fff;">--}}
{{--Forgot Password ?--}}
{{--</a>--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="clearfix"></div>--}}
{{--</div>--}}

{{--<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 fronteer">--}}
{{--<ul class="arrow middle">--}}
{{--<p>--}}
{{--<span class="fa fa-envelope"--}}
{{--style="color:#32c5d2;border:2px solid #93edf9;padding:12px;border-radius:50% !important;"></span>--}}
{{--We provide the Business frontier for you--}}
{{--</p>--}}

{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}
{{--Linking the Investors--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--Outlining Tendersr--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--To find and create projects--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--Sharing updated information--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--To advertise your activities--}}
{{--</li>--}}
{{--<li>--}}
{{--<span class="fa fa-paper-plane" style="color:#32c5d2;"></span>--}}

{{--To connect you to events and workshops.--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<div class="foot">--}}

{{--<div>--}}
{{--<p style="text-align: center;">--}}
{{--Delivering the latest product trends and industry news straight to your inbox.--}}
{{--</p>--}}
{{--<div class="col-md-3 col-md-offset-4 col-xs-6 col-xs-offset-3">--}}
{{--<input type="text" name="email" class="contact-email">--}}
{{--<button type="submit" name="submit" class="btn btn-lg green"> Submit </button>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<p style="margin:20px 0px;"></p>--}}

{{--<div class="footer-col col-md-4 col-xs-4">--}}
{{--<ul>--}}
{{--<li class="footer-title"> Company/SME</li>--}}
{{--<li> Register your Company Information</li>--}}
{{--<li> Browse the Project</li>--}}
{{--<li> Pitch Investor with Bussiness Plan</li>--}}
{{--<li> Join Events</li>--}}
{{--<li> Read News</li>--}}
{{--<li> Join Bussiness Association</li>--}}
{{--<li> Create Projects or call Third Party</li>--}}
{{--<li> Publish Events</li>--}}
{{--<li> Upload your Activities</li>--}}
{{--<li> Search Companies Information</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="footer-col col-md-4 col-xs-4">--}}
{{--<ul>--}}
{{--<li class="footer-title"> Investor</li>--}}
{{--<li> Register Investor Information</li>--}}
{{--<li> Pick Bussiness Proposal you want</li>--}}
{{--<li> Register your Company Information</li>--}}
{{--<li> Browse Projects</li>--}}
{{--<li> Join Events</li>--}}
{{--<li> Read News</li>--}}
{{--<li> Join Bussiness Association</li>--}}
{{--<li> Create Projects or call Third Party</li>--}}
{{--<li> Publish Events</li>--}}
{{--<li> Upload your Activities</li>--}}
{{--<li> Search Companies Information</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="footer-col col-md-4 col-xs-4">--}}
{{--<ul>--}}
{{--<li class="footer-title"> Association</li>--}}
{{--<li> Create Association</li>--}}
{{--<li> Publish New</li>--}}
{{--<li> Create Events</li>--}}
{{--<li> Create Projects</li>--}}
{{--<li> Approved your Association</li>--}}
{{--<li> Read News</li>--}}
{{--<li> Upload your Activities</li>--}}
{{--<li> Search Companies Information</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}

{{--<hr style="margin:30px; border-top: 2px solid #fff;">--}}

{{--<div class="clearfix"></div>--}}

{{--<div class="col-md-6 col-md-offset-3" id="social">--}}

{{--<ul>--}}
{{--<li> Follow us :</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on facebook"--}}
{{--href="https://www.facebook.com/businessnetwork.hivephing/" class="facebook">--}}
{{--<i class="fab fa-facebook-f" aria-hidden="true"></i>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on instagram"--}}
{{--href="https://www.instagram.com/hivephingmyanmar" class=instagram>--}}
{{--<i class="fab fa-instagram"></i>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on linkedin"--}}
{{--href="https://www.linkedin.com/in/hivephing-business-network-a90767159/" class="linkedin">--}}
{{--<i class="fab fa-linkedin-in"></i>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li>--}}
{{--<a rel="nofollow" target="_blank" title="Follow us on twitter"--}}
{{--href="https://www.twitter.com/hive_phingmm/" class="twitter">--}}
{{--<i class="fab fa-twitter"></i>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--<div class="clearfix"></div>--}}


{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<script src="{{asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery.blockui.min.js')}}'" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEMCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('global/scripts/login-5.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
<script>
    function show_ds(cname) {
        for (i = 1; i < 11; i++) {
            if (i == cname) {
                console.log(i)
                document.getElementById("show" + cname).style.display = 'block';
            }
            else {
                console.log('n' + i)

                document.getElementById("show" + i).style.display = 'none';
            }
        }

    }
    function show_logandreg(par) {
        window.location.href = par;

    }
</script>
<!-- Google Code for Universal Analytics -->


</body>

</html>