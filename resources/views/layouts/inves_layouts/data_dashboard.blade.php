@extends('layouts.inves_layouts.for_datatable')

@section('body')


    @if(preg_match('/business_proposals/',url()->current() ))
        <?php
        $inves_p = 'active';
        ?>
    @else
        <?php
        $inves_p = '';
        ?>

    @endif
    @if(preg_match('/inves_require_detail/',url()->current() ))
        <?php
        $inves_detail = 'active';
        ?>
    @else
        <?php
        $inves_detail = '';
        ?>
    @endif

    @if(preg_match('/inves_req_edit/',url()->current() ))
        <?php
        $inves_detail_e = 'active';
        ?>
    @else
        <?php
        $inves_detail_e = '';
        ?>
    @endif
    @if(preg_match('/mail/',url()->current()))
        <?php
        $mail = 'active';
        ?>
    @else
        <?php
        $mail = '';
        ?>
    @endif

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div id="loadingoverlay" style="background-color: rgba(255, 255, 255, 0.8);display:inline; position: fixed; flex-direction: column; align-items: center; justify-content: center; z-index: 2147483647; background-image: url('{{asset('images/loading.gif')}}'); background-position: center center; background-repeat: no-repeat; top: 0px; left: 0px; width: 100%; height: 100%; background-size: 100px;">

        <div class="loadingoverlay_progress_wrapper" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">
            <div class="loadingoverlay_progress_bar" style="position: absolute; left: 0px; bottom: 25px; height: 20px; background: rgb(155, 187, 89); right: 100%;"></div>
        </div>
    </div>
    <script>
        setInterval(function () {
            document.getElementById('loadingoverlay').style.display = 'none';
        }, 2000);

    </script>
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER --
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
            <div class="page-logo" style="margin-top:0px !important;">
                <img src="{{asset('images/logo/logo.png')}}" width="80px" height="50px" alt="logo" class=""/>

            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                    data-target=".navbar-collapse"> <span></span> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                            <img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg"/>
                            <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                            <i class="fa fa-angle-down"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{url('inves_profile/profile_detail/'.Auth::user()->id)}}">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>

                            <li>
                                <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i> Log Out </a></a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                        style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                        data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-paper-plane"></i>
                            <span class="title">Pannels</span> <span class="arrow"></span> </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{url('inves_require_detail')}}" class="nav-link "> <span class="title">Investor Pannel</span>

                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="{{url('entra_dashboard')}}" class="nav-link "> <span class="title">Company Pannel</span>

                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item {{$inves_detail_e}} {{$inves_detail}}">
                        <a href="{{url('inves_require_detail')}}" class="nav-link "> <i class="icon-bar-chart"></i>
                            <span class="title">Dashboard</span> </a>
                    </li>
                    <li class="nav-item {{$mail}}" >
                        <a href="{{url('inves/see_all_mails')}}" class="nav-link " >
                            <i class="fa fa-envelope" ></i >
                            <span class="title" >Mail Inbox</span >
                        </a >
                    </li >
                    <li class="nav-item {{$inves_p}}">
                        <a href="{{url('inves/business_proposals')}}" class="nav-link "> <i class="icon-bar-chart"></i>
                            <span class="title">Business Proposal</span> <span class="selected"></span> </a>

                    </li>
                <!--

                    <li class="nav-item  " >
                        <a href="javascript:;" class="nav-link nav-toggle" >
                            <i class="icon-paper-plane" ></i >
                            <span class="title" >Quotation</span >
                            <span class="arrow" ></span >
                        </a >
                        <ul class="sub-menu" >
                            <li class="nav-item  " >
                                <a href="{{url('inves/send_msg')}}" class="nav-link " >
                                    <span class="title" >Sending Messages</span >
                                    <span class="badge badge-danger" >
                                        <?php
                $count_send = \Illuminate\Support\Facades\DB::table('mail')->where([['from_user', '=', Auth::user()->id], ['from_type', '=', 'i'], ['soft_del', '=', 'no']])->count();
                ?>
                {{$count_send}}
                        </span >
                    </a >
                </li >
                <li class="nav-item  " >
                    <a href="{{url('inves/received_msgs')}}" class="nav-link " >
                                    <span class="title" >Received Messages</span >
                                    <span class="badge badge-danger" >
                                        <?php
                $count_receive = \Illuminate\Support\Facades\DB::table('mail')->where([['to_user', '=', Auth::user()->id], ['to_type', '=', 'i'], ['soft_del', '=', 'no']])->count();
                ?>
                {{$count_receive}}
                        </span >
                    </a >
                </li >

            </ul >
        </li >
        <li class="nav-item  " >
            <a href="javascript:;" class="nav-link nav-toggle" >
                <i class="icon-bulb" ></i >
                <span class="title" >Activity</span >
                <span class="arrow" ></span >
            </a >
            <ul class="sub-menu" >
                <li class="nav-item  " >
                    <a href="{{url('inves/inves_activities')}}" class="nav-link " >
                                    <span class="title" >Your Activities</span >
                                    <span class="badge badge-danger" >
                                        <?php
                $count_activity = \Illuminate\Support\Facades\DB::table('activities')->where([['user_id', '=', Auth::user()->id]])->count();
                ?>
                {{$count_activity}}
                        </span >
                    </a >
                </li >
                <li class="nav-item  " >
                    <a href="{{url('inves/create_activity')}}" class="nav-link " >
                                    <span class="title" >Create New Activity</span >

                                </a >
                            </li >

                        </ul >
                    </li >


                    <li class="nav-item  " >
                        <a href="{{url('inves/search')}}" class="nav-link nav-toggle" >
                            <i class="fa fa-search" ></i >
                            <span class="title" >Search</span >
                        </a >
                    </li >
                    -->

                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- end SIDEBAR -->

    @yield('content')


    <!-- start FOOTER -->
        <div class="page-footer">
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; Mastery Co.Ltd

                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
    <div class="quick-nav-overlay"></div>
@endsection
