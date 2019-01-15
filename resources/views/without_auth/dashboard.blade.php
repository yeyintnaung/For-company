@extends('layouts.plane')

@section('body')

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=909441502519108';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <div id="loadingoverlay"
         style="background-color: rgba(255, 255, 255, 0.8);display:inline; position: fixed; flex-direction: column; align-items: center; justify-content: center; z-index: 2147483647; background-image: url('{{asset('images/loading.gif')}}'); background-position: center center; background-repeat: no-repeat; top: 0px; left: 0px; width: 100%; height: 100%; background-size: 100px;">


        <div class="loadingoverlay_progress_wrapper"
             style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">
            <div class="loadingoverlay_progress_bar"
                 style="position: absolute; left: 0px; bottom: 25px; height: 20px; background: rgb(155, 187, 89); right: 100%;"></div>
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
                <a href="/entra_dashboard">
                    <img src="{{asset('images/logo/logo.png')}}" width="80px" height="50px" alt="logo" class=""/> </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse"> <span></span> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->

            <!-- BEGIN TOP NAVIGATION MENU -->

            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

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
            <!-- end SIDEBAR -->

    @yield('content')


    <!-- start FOOTER -->
        <div class="page-footer">

            <p style="text-align: center; color: #fff;"> © 2018 - Mastery Co.,Ltd. </p>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->
    <div class="quick-nav-overlay"></div>
@endsection
