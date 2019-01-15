@extends('layouts.dashboard')

@section('content')
    <?php
    echo header("Cache-Control:no-store,no-cache,must-revalidate,max-age=0");header("Cache-Control:post-check=0,pre-check=0", false);header("Pragma:no-cache");header('Content-Type:text/html');
    ?>
    <!-- BEGIN SIDEBAR -->

    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#" class="list-name">Construction Projects</a> <i class="fa fa-circle"></i>
                    </li>
                </ul>
            </div>
            @if(\Illuminate\Support\Facades\Session::has('not_permit'))
                <div class="note note-success">
                    <h4 class="block">Your points are insufficient</h4>
                    <p>
                    </p>
                </div>
            @endif
            <h1 class="page-title page_title">
                Projects
            </h1>
            <div class="row">
                @if(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30) > \Carbon\Carbon::now())
                    @if(DB::table('user_get_free_plan')->where('user_id',Auth::user()->id)->count() != 0)

                        <div class="col-sm-4">
                            <div class="dashboard-stat2" style="padding-bottom:12px;padding: 0px 22px 8px;">
                                <div class="display">
                                    <div class="number">
                                        <div>
                                            <h4 class="font-red-haze">
                                                <span pdata-counter="counterup" pdata-value="Your free-trial period">Your free-trial period</span>

                                                <small>Remaining Days
                                                    :{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30))}}</small>
                                            </h4>

                                            <small>
                                                <?php
                                                $remain_point = DB::table('user_get_free_plan')->where('user_id', Auth::user()->id)->first();
                                                ?>
                                                <span style="color:#36c6d3;">Remaining Points</span>
                                                :{{$remain_point->remaining_point}} Points

                                            </small>
                                            <br>

                                            <small>

                                                <span style="color:#36c6d3;">Start Date</span>
                                                :{{Auth::user()->created_at}}

                                            </small>
                                            &nbsp;&nbsp;&nbsp;
                                            <small>

                                                <span style="color:#36c6d3;">End Date</span>
                                                :{{\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30)}}

                                            </small>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                @if(DB::table('user_get_free_plan')->where('user_id',Auth::user()->id)->count() != 0 and \Carbon\Carbon::parse(DB::table('user_get_free_plan')->where('user_id',Auth::user()->id)->first()->end_date)->toDateTimeString() > \Carbon\Carbon::now()->toDateTimeString())

                    <div class="col-sm-4">
                        <div class="dashboard-stat2"
                             style="padding-bottom:12px;padding: 0px 22px 8px;background-color: #0b6875;">
                            <div class="display">
                                <div class="number">
                                    <div>
                                        <h4 class="font-red-haze">
                                            <span pdata-counter="counterup" pdata-value="Your free-trial period">Your Bonus period</span>

                                            <small>Remaining Days
                                                :{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30))}}</small>
                                        </h4>

                                        <small>
                                            <?php
                                            $remain_point = DB::table('user_get_free_plan')->where('user_id', Auth::user()->id)->first();
                                            ?>
                                            <span style="color:#36c6d3;">Bonus Points</span>
                                            :
                                            <?php
                                            $bp = $remain_point->increase_point;
                                            ?>
                                            {{$bp}}

                                        </small>
                                        <br>

                                        <small>

                                            <span style="color:#36c6d3;">Start Date</span>
                                            :{{Auth::user()->created_at}}

                                        </small>
                                        &nbsp;&nbsp;&nbsp;
                                        <small>

                                            <span style="color:#36c6d3;">End Date</span>
                                            :{{\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30)}}

                                        </small>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                @endif
                @if(\Illuminate\Support\Facades\Session::has('expire') == 'yes')
                    <div class="col-sm-4">
                        <div class="dashboard-stat2" style="padding-bottom:12px;padding: 0px 22px 8px;">
                            <div class="display">
                                <div class="number">
                                    <div>
                                        <h4 class="font-red-haze">
                                            <span pdata-counter="counterup" pdata-value="Your free-trial period">Free Plan Expired</span>
                                        </h4>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- paid plan -->
            <div class="row">

                <?php
                $com_id = DB::table('company')->where('user_id', Auth::user()->id)->first();
                $count_com = DB::table('company_with_plan')->where('com_id', $com_id->id);
                ?>

                @if($count_com->count() > 0 )
                    <?php
                    $plan = \Illuminate\Support\Facades\DB::table('construct_plan')->where('id', $count_com->first()->plan_id)->first();
                    ?>
                    <div class="col-sm-4">
                        <div class="dashboard-stat2"
                             style="padding-bottom:12px;padding: 0px 22px 8px;background-color: #0b6875;">
                            <div class="display">
                                <div class="number">
                                    <div>
                                        <h4 class="font-red-haze">
                                            <span pdata-counter="counterup" pdata-value="Your free-trial period">Your Plans</span>
                                        @if($plan->type == 'C')
                                            <small>Remaining Days
                                                :{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($plan->expire_date))}}</small>
                                        @endif
                                        </h4>

                                        <small>

                                            <span style="color:#36c6d3;">Points</span>
                                            :
                                            {{$plan->point}}

                                        </small>
                                        <br>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                @endif
                @if(\Illuminate\Support\Facades\Session::has('expire') == 'yes')
                    <div class="col-sm-4">
                        <div class="dashboard-stat2" style="padding-bottom:12px;padding: 0px 22px 8px;">
                            <div class="display">
                                <div class="number">
                                    <div>
                                        <h4 class="font-red-haze">
                                            <span pdata-counter="counterup" pdata-value="Your free-trial period">Free Plan Expired</span>
                                        </h4>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="row">
                @foreach($data as $d)
                    <div class="col-md-6 ">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box blue-hoki">
                            <div class="portlet-title">

                                <div class="caption">
                                    <i class="fa fa-gift"></i>
                                </div>
                                <?php
                                $see_project = DB::table('see_projects_with_plan')->where([['project_id', '=', $d->id], ['user_id', '=', Auth::user()->id]])->count();
                                ?>
                                @if($see_project != 0)
                                    <div class="actions">

                                        <span class="label label-success"
                                              style="border-radius:10px !important;"> Seen </span>
                                    </div>
                                @endif
                                @if($d->close == 1)
                                    <div class="actions">
                                        <a class="btn btn-danger btn-sm" disabled> <i class="fa fa-cross"></i> Expired
                                        </a>
                                    </div>
                                @else
                                    <?php
                                    $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();

                                    if($limit_q >= $d->quotation)
                                    {
                                    $user_saw_this = DB::table('user_saw_this_plan')->where([['project_id', '=', $d->id], ['user_id', Auth::user()->id]])->count();

                                    if($user_saw_this > 0)
                                    {
                                    ?>
                                    <div class="actions">
                                        <a href="{{url('entra/construct_project_detail/'.$d->id)}}"
                                           class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View More
                                        </a>
                                    </div>
                                    <?php
                                    }else{
                                    ?>
                                    <div class="actions">
                                        <a class="btn btn-danger btn-sm" disabled> <i class="fa fa-cross"></i> Expired
                                        </a>
                                    </div>
                                    <?php

                                    }


                                    }
                                    else
                                    {
                                    ?>
                                    <div class="actions">
                                        <a href="{{url('entra/construct_project_detail/'.$d->id)}}"
                                           class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View More
                                        </a>
                                    </div>

                                    <?php

                                    }
                                    ?>

                                @endif
                            </div>
                            <div class="portlet-body">
                                <div class="scroller" style="height:200px" data-rail-visible="1"
                                     data-rail-color="yellow"
                                     data-handle-color="#a1b2bd">
                                    <br>
                                    <strong> Points:{{$d->project_define_point}}
                                    </strong>
                                    <br/>
                                    {!! str_limit($d->description,140) !!}
                                </div>
                                <span class="badge badge-danger">
                                   <?php
                                    $comp = DB::table('user_saw_this_plan')->where([['project_id', '=', $d->id]])->count();

                                    ?>
                                    {{$comp}}
                                </span> <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12 pull-right">
                    {{$data->links()}}
                </div>
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


@endsection
