@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">

            </div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#" class="list-name">Home</a> <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span class="list-name">Company detail</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            @include('user.entra.alert.alert')
            <h1 class="page-title page_title">
                Your company's detail
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->


                <div class="row">
                    <div class="col-md-12 ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet solid blue-hoki">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>{{$d->name}}
                                </div>
                                <a href="{{ url('/company_detail/'.$d->id.'/rating') }}" class="btn green-seagreen pull-right" style="margin-top: 20px;">
                                    Rating Point :
                                    @if($rate == null)
                                        0
                                    @elseif($rate >= 1000)
                                        {{ $rate/1000 }} k
                                    @else
                                        {{ $rate }}
                                    @endif
                                </a>
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:200px">

                                    <img src="{{asset('users/entro/photo/'.$d->logo)}}" width="152"
                                            style=" vertical-align: text-top;float:left;margin:9px;" alt="Logo Image">

                                    </img><p> {{$d->description}} </p>

                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
                <div class="row">
                    @if($d->ceo_name != '' or $d->ceo_email != '')
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
                                    <a href="" class="fullscreen"> </a> <a href="javascript:;" class="reload"> </a>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <ul style="list-style:none;padding-left:2px;">
                                    <li><i class="fa fa-user" style="float:left;"></i><h5
                                                style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->ceo_name}}</h5>
                                    </li>

                                    <li>
                                        <i class="fa fa-envelope" style="float:left;"></i>
                                        <h5 style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->ceo_email}}</h5>
                                    </li>
                                    <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                                style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->ceo_phone}}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                    @endif
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
                                    <a href="" class="fullscreen"> </a> <a href="javascript:;" class="reload"> </a>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Looking for
                                        investment </h5> :
                                    @if ($d->investment == '0')
                                        <i class="fa fa-close" style="color:darkred;"></i>
                                    @else
                                        <i class="fa fa-check" style="color:#32c5d2;"></i>
                                    @endif
                                </div>
                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Registration
                                        Status </h5> :
                                    @if ($d->registration_status == '0')
                                        <i class="fa fa-close" style="color:darkred;"></i>
                                    @else
                                        <i class="fa fa-check" style="color:#32c5d2;"></i>
                                    @endif

                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">City</h5>
                                    :<span style="color:#5f5963;font-weight:bold;"> &nbsp;
                                        @php
                                            $city=DB::table('cities')->where('id',$d->city_id)->first();
                                        @endphp
                                        {{$city->name}}
                                    </span>

                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Business type</h5>
                                    :<span style="color:#5f5963;font-weight:bold;"> &nbsp;
                                        @php
                                            $city=DB::table('business_hub')->where('id',$d->business_hub)->first();
                                        @endphp
                                        {{$city->description}}
                                    </span>

                                </div>

                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Country</h5>
                                    : <span style="color:#5f5963;font-weight:bold;">
                                        @php
                                            $country=DB::table('countries')->where('id',$d->country_id)->first();
                                        @endphp
                                        {{$country->name}}
                                    </span>
                                </div>

                               @if($d->website != '')
                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Website Link </h5>
                                    @if(preg_match('/http/',$d->website))
                                        <?php $weblink=$d->website;?>
                                        @else
                                        <?php $weblink="http://".$d->website;?>

                                    @endif
                                    : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a href="{{$weblink}}">{{$d->website}}
                                            <span class="fa fa-arrow-right"></span></a> </span>
                                </div>
                                @endif
                                @if($d->facebook != '')

                                <div class="col-md-12 col-lg-6" style="margin-bottom:4px">
                                    <h5 style="display:inline;font-weight:bolder;color: #5f5963;">Facebook Link </h5>
                                    @if(preg_match('/http/',$d->facebook))
                                        <?php $facebook=$d->facebook;?>
                                    @else
                                        <?php $facebook="http://".$d->facebook;?>

                                    @endif
                                    : <span style="color:#5f5963;font-weight:bold;"> &nbsp;<a href="{{$facebook}}">{{$d->facebook}}
                                            <span class="fa fa-arrow-right"></span></a> </span>
                                </div>
                                @endif
                                &nbsp; &nbsp; &nbsp;
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
                <div class="row">
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
                                    <a href="" class="fullscreen"> </a> <a href="javascript:;" class="reload"> </a>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="col-md-12 col-lg-6">

                                    <ul style="list-style:none;padding-left:2px;">
                                        <li>
                                            <i class="fa fa-user" style="float:left;"></i><h5
                                                    style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->name}}</h5>
                                        </li>

                                        <li>
                                            <i class="fa fa-envelope" style="float:left;"></i>
                                            <h5 style="color:#5f5963;font-weight:bold;"> {{$d->email}}</h5>
                                        </li>
                                        <li><i class="fa fa-phone" style="float:left;"></i> <h5
                                                    style="color:#5f5963;font-weight:bold;"> &nbsp; {{$d->phone}}</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-12 col-lg-6">
                                    <h4 class="title" style="font-weight:bolder;color:#5f5963;"> Full address</h4>
                                    <h5 style="color: #888;font-weight:bold;">
                                        {{$d->address}}</h5>
                                </div>

                                &nbsp; &nbsp; &nbsp;
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>

                </div>

            @if(Auth::user()->type == 1 or Auth::user()->type == 2)
                @if(Auth::user()->id == $d->user_id)
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="button" onclick="goss({{$d->id}})" class="btn btn-lg btn-danger pull-right">Edit</button>
                        </div>
                    </div>

                    <!-- END CONTENT BODY -->
                    <script>
                        function goss(id) {
                            window.location.assign('{{url('company_edit_form/'.$d->id)}}');
                        }
                    </script>
                @endif
            @endif
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <div class="page-quick-sidebar">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                            <span class="badge badge-danger">2</span> </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                            <span class="badge badge-success">7</span> </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                            <i class="fa fa-angle-down"></i> </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-bell"></i> Alerts </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-info"></i> Notifications </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-speech"></i> Activities </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                    <i class="icon-settings"></i> Settings </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd"
                                data-wrapper-class="page-quick-sidebar-list">
                            <h3 class="list-heading">Staff</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">8</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Bob Nilson</h4>
                                        <div class="media-heading-sub"> Project Manager</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nick Larson</h4>
                                        <div class="media-heading-sub"> Art Director</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">3</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Hubert</h4>
                                        <div class="media-heading-sub"> CTO</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Wong</h4>
                                        <div class="media-heading-sub"> CEO</div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="list-heading">Customers</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-warning">2</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lara Kunis</h4>
                                        <div class="media-heading-sub"> CEO, Loop Inc</div>
                                        <div class="media-heading-small"> Last seen 03:10 AM</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="label label-sm label-success">new</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ernie Kyllonen</h4>
                                        <div class="media-heading-sub"> Project Manager, <br> SmartBizz PTL
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lisa Stone</h4>
                                        <div class="media-heading-sub"> CTO, Keort Inc</div>
                                        <div class="media-heading-small"> Last seen 13:10 PM</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">7</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Portalatin</h4>
                                        <div class="media-heading-sub"> CFO, H&D LTD</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Irina Savikova</h4>
                                        <div class="media-heading-sub"> CEO, Tizda Motors Inc</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">4</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Maria Gomez</h4>
                                        <div class="media-heading-sub"> Manager, Infomatic Inc</div>
                                        <div class="media-heading-small"> Last seen 03:10 AM</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="page-quick-sidebar-item">
                            <div class="page-quick-sidebar-chat-user">
                                <div class="page-quick-sidebar-nav">
                                    <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                        <i class="icon-arrow-left"></i>Back</a>
                                </div>
                                <div class="page-quick-sidebar-chat-user-messages">
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Bob
                                                Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ? </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Ella
                                                Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it shortly </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Bob
                                                Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Ella
                                                Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the delay. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Bob
                                                Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Ella
                                                Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Bob
                                                Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right away. </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Ella
                                                Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any comment. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg"/>
                                        <div class="message">
                                            <span class="arrow"></span> <a href="javascript:;" class="name">Bob
                                                Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-quick-sidebar-chat-user-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type a message here...">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn green">
                                                <i class="icon-paper-clip"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                        <div class="page-quick-sidebar-alerts-list">
                            <h3 class="list-heading">General</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-warning"> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="list-heading">System</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-default "> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                        <div class="page-quick-sidebar-settings-list">
                            <h3 class="list-heading">General Settings</h3>
                            <ul class="list-items borderless">
                                <li> Enable Notifications
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                            data-on-color="success" data-on-text="ON" data-off-color="default"
                                            data-off-text="OFF"></li>
                                <li> Allow Tracking
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="info"
                                            data-on-text="ON" data-off-color="default" data-off-text="OFF"></li>
                                <li> Log Errors <input type="checkbox" class="make-switch" checked data-size="small"
                                            data-on-color="danger" data-on-text="ON" data-off-color="default"
                                            data-off-text="OFF"></li>
                                <li> Auto Sumbit Issues
                                    <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning"
                                            data-on-text="ON" data-off-color="default" data-off-text="OFF"></li>
                                <li> Enable SMS Alerts
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                            data-on-color="success" data-on-text="ON" data-off-color="default"
                                            data-off-text="OFF"></li>
                            </ul>
                            <h3 class="list-heading">System Settings</h3>
                            <ul class="list-items borderless">
                                <li> Security Level <select class="form-control input-inline input-sm input-small">
                                        <option value="1">Normal</option>
                                        <option value="2" selected>Medium</option>
                                        <option value="e">High</option>
                                    </select>
                                </li>
                                <li> Failed Email Attempts
                                    <input class="form-control input-inline input-sm input-small" value="5"/></li>
                                <li> Secondary SMTP Port
                                    <input class="form-control input-inline input-sm input-small" value="3560"/></li>
                                <li> Notify On System Error
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                            data-on-color="danger" data-on-text="ON" data-off-color="default"
                                            data-off-text="OFF"></li>
                                <li> Notify On SMTP Error
                                    <input type="checkbox" class="make-switch" checked data-size="small"
                                            data-on-color="warning" data-on-text="ON" data-off-color="default"
                                            data-off-text="OFF"></li>
                            </ul>
                            <div class="inner-content">
                                <button class="btn btn-success">
                                    <i class="icon-settings"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
@endsection