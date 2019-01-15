@extends('layouts.asso_layouts.for_datatable')

@section('body')

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" >
    <div id="loadingoverlay" style="background-color: rgba(255, 255, 255, 0.8);display:inline; position: fixed; flex-direction: column; align-items: center; justify-content: center; z-index: 2147483647; background-image: url('{{asset('images/loading.gif')}}'); background-position: center center; background-repeat: no-repeat; top: 0px; left: 0px; width: 100%; height: 100%; background-size: 100px;">
        <div class="loadingoverlay_progress_wrapper" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">
            <div class="loadingoverlay_progress_bar" style="position: absolute; left: 0px; bottom: 25px; height: 20px; background: rgb(155, 187, 89); right: 100%;"></div>
        </div>
    </div>
    <script>
        setInterval(function(){document.getElementById('loadingoverlay').style.display='none';},2000);

    </script>
    <div class="page-wrapper" >
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top" >
            <!-- BEGIN HEADER INNER --
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
            <div class="page-logo" >
                <a href="index.html" >
                    <img src="{{'log'}}" alt="logo" class="logo-default" /> </a >
                <div class="menu-toggler sidebar-toggler" >
                    <span ></span >
                </div >
            </div >
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                    data-target=".navbar-collapse" >
                <span ></span >
            </a >
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu" >
                <ul class="nav navbar-nav pull-right" >

                    <li class="dropdown dropdown-user" >

                        <ul class="dropdown-menu dropdown-menu-default" >
                            <li >
                                <a href="{{url('asso/asso_detail')}}" >
                                    <i class="icon-user" ></i > My Profile
                                </a >
                            </li >

                            <li >
                                <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                    <i class="icon-key" ></i > Log Out </a ></a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                        style="display: none;" >
                                    {{ csrf_field() }}
                                </form >
                            </li >
                        </ul >
                    </li >
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler" >
                        <a href="javascript:;" class="dropdown-toggle" >
                            <i class="icon-logout" ></i >
                        </a >
                    </li >
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul >
            </div >
            <!-- END TOP NAVIGATION MENU -->
        </div >
        <!-- END HEADER INNER -->
    </div >
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix" ></div >
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container" >
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper" >
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse" >
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                        data-slide-speed="200" style="padding-top: 20px" >
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

                    <!-- END SIDEBAR TOGGLER BUTTON -->
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                    <li class="nav-item " >
                        <a href="javascript:;" class="nav-link nav-toggle" >
                            <a href="{{url('/asso/dashboard')}}" class="nav-link " >
                                <i class="icon-bar-chart" ></i >
                                <span class="title" >Dashboard </span >
                                <span class="selected" ></span >
                            </a >

                        </a >

                    </li >
                    <li class="nav-item " >

                        <a href="{{url('/asso/asso_detail')}}" class="nav-link " >
                            <i class="icon-user" ></i >
                            <span class="title" >Association Detail </span >
                            <span class="selected" ></span >
                        </a >


                    </li >
                    <li class="nav-item " >

                        <a href="{{url('/asso/members')}}" class="nav-link " >
                            <i class="icon-users" ></i >
                            <span class="title" >Members </span >
                            <span class="selected" ></span >
                        </a >


                    </li >
                    <li class="nav-item " >

                        <a href="{{url('/asso/requests')}}" class="nav-link " >
                            <i class="icon-paper-plane" ></i >
                            <span class="title" >Join Requests </span >
                            <span class="selected" ></span >
                        </a >


                    </li >



                    <li class="nav-item  " >
                        <a href="javascript:;" class="nav-link nav-toggle" >
                            <i class="icon-bulb" ></i >
                            <span class="title" >Activity</span >
                            <span class="arrow" ></span >
                        </a >
                        <ul class="sub-menu" >
                            <li class="nav-item  " >
                                <a href="{{url('asso/activities')}}" class="nav-link " >
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
                                <a href="{{url('asso/create_activity')}}" class="nav-link " >
                                    <span class="title" >Create New Activity</span >

                                </a >
                            </li >

                        </ul >
                    </li >
                    <li class="nav-item  ">
                        <a href="{{url('asso/business_news')}}" class="nav-link nav-toggle"> <i class="icon-layers"></i>
                            <span class="title">News</span> </a>
                    </li>
                    <li class="nav-item  " >
                        <a href="{{url('asso/events')}}" class="nav-link nav-toggle" >
                            <i class="icon-puzzle" ></i >
                            <span class="title" >Events</span >
                        </a >
                    </li >
                    <li class="nav-item  ">
                        <a href="{{url('asso_see_tenders')}}" class="nav-link nav-toggle"> <i class="fa fa-envelope"></i>
                            <span class="title">Tenders</span> </a>
                    </li>

                </ul >
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div >
            <!-- END SIDEBAR -->
        </div >
        <!-- end SIDEBAR -->

    @yield('content')


    <!-- start FOOTER -->
        <div class="page-footer" >
            <div class="page-footer" >
                <div class="page-footer-inner" > 2017 &copy; Mastery Co.Ltd

                </div >
                <div class="scroll-to-top" >
                    <i class="icon-arrow-up" ></i >
                </div >
            </div >
            <div class="scroll-to-top" >
                <i class="icon-arrow-up" ></i >
            </div >
        </div >
        <!-- END FOOTER -->
    </div >
    <!-- BEGIN QUICK NAV -->
    <div class="quick-nav-overlay" ></div >
@endsection
