@extends('layouts.data_dashboard')
@section('content')
    <div class="">
        @section('title')
            Your Mails
         @endsection
        @section('bg'){{asset('images/about_banner.jpg')}}@endsection

        <!-- BEGIN CONTENT BODY -->

        <div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
        @if(preg_match('/all/',url()->current()))
            <?php
            $all = 'active_mail';
            ?>
        @else
            <?php
            $all = '';
            ?>
        @endif
        @if(preg_match('/send/',url()->current()))
            <?php
            $se = 'active_mail';
            ?>
        @else
            <?php
            $se = '';
            ?>
        @endif
        @if(preg_match('/re/',url()->current()))
            <?php
            $re = 'active_mail';
            ?>
        @else
            <?php
            $re = '';
            ?>
        @endif
        <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="col-xs-12">&nbsp;</div>
            <div class="col-xs-12">&nbsp;</div>
            <div class="col-xs-12" style="text-align: center;font-size:22px;font-weight:bolder;margin-top:12px;">All Mails

            </div>
            <div class="col-xs-12">&nbsp;</div>
            <div class="col-xs-12">&nbsp;</div>
            <div class="col-sm-6">
                <!-- Standard gray button with gradient -->
                <a href={{url('entra/mails')}} type="button" class="btn btn-warning {{$all}}">All</a>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <a href="{{url('entra/send_mails')}}" type="button" class="btn btn-primary {{$se}}">Send</a>
                <!-- Indicates a successful or positive action -->
                <a href="{{url('entra/received_mails')}}" type="button" class="btn btn-success {{$re}}">Received</a>
                <!-- Contextual button for informational alert messages -->

                <!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
            </div>
            @if(preg_match('/entra\/mails/',url()->current()))
                <div class="col-sm-6">
                    <form method="get" action="{{url('entra/mails')}}">
                        <div class="col-sm-8">
                            <input type="month" name='date' class="form-control" placeholder="Enter text">
                        </div>
                        <input type="submit" value="Search" class="btn btn-success"/>
                    </form>
                </div>
            @endif
            @if(preg_match('/entra\/send_mails/',url()->current()))
                <div class="col-sm-6">
                    <form method="get" action="{{url('entra/send_mails')}}">
                        <div class="col-sm-8">
                            <input type="month" name='date' class="form-control" placeholder="Enter text">
                        </div>
                        <input type="submit" value="Search" class="btn btn-success"/>
                    </form>
                </div>
            @endif
            @if(preg_match('/entra\/received_mails/',url()->current()))
                <div class="col-sm-6">
                    <form method="get" action="{{url('entra/received_mails')}}">
                        <div class="col-sm-8">
                            <input type="month" name='date' class="form-control" placeholder="Enter text">
                        </div>
                        <input type="submit" value="Search" class="btn btn-success"/>
                    </form>
                </div>
            @endif
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">
                @include('user.inves.alert.alert')
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase">All Mails Table</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle"
                                                    data-toggle="dropdown">
                                                Tools <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> <i class="fa fa-file-pdf-o"></i> Save as PDF
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> <i class="fa fa-file-excel-o"></i> Export to
                                                        Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                    id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        id
                                    </th>
                                    <th> To/From</th>
                                    <th> Title</th>
                                    <th> For Business Proposal</th>
                                    <th> Status</th>
                                    <th> Date</th>
                                    <th> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <tr class="odd gradeX">
                                        <td>
                                        {{$d->id}}

                                        <td>

                                            @if($d->to_user == Auth::user()->id)
                                                <?php
                                                $com = DB::table('investor')->where('user_id', $d->from_user)->first();
                                                ?>
                                                {{$com->name}}
                                                <span class="label label-sm label-warning">From Investor</span>
                                            @else
                                                <?php
                                                $com = DB::table('investor')->where('user_id', $d->to_user)->first();
                                                ?>
                                                {{$com->name}}
                                                <span class="label label-sm label-info">To Investor</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$d->title}}
                                        </td>
                                        <?php
                                        $bplan = DB::table('business_plan')->where('id', $d->business_plan_id)->first();
                                        ?>
                                        <td>{{str_limit($bplan->title,15)}}</td>
                                        <td>
                                            @if($d->status == 1)
                                                <span class="label label-sm label-success"> Unread </span>
                                            @else
                                                <span class="label label-sm label-danger"> Read </span>
                                            @endif


                                        </td>
                                        <td class="center"> {{$d->created_at}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    Actions <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('entra/view_mail/'.$d->id)}}">
                                                            <i class="icon-screen-tablet"></i> View</a>
                                                    </li>


                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->

    <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
@endsection

