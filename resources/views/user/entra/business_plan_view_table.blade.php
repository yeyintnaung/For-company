@extends('layouts.data_dashboard')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="">
                <h3>Received Messages</h3>

            </div>
            <div class="row">
                @include('user.inves.alert.alert')
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase">Your Business Plan Table</span>
                            </div>
                            <div class="actions">
                                <a href="{{url('entra/business_plan')}}" class='btn btn-small btn-success'>Add New Business Plan</a>

                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">
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
                            </div> -->
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th>
                                        id
                                    </th>
                                    <th> Title</th>
                                    <th> Product/Services Industry</th>
                                    <th> Country</th>
                                    <th> Created At</th>
                                    <th> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                @foreach($data as $d)
                                    <?php $count++;?>
                                    <tr class="odd gradeX">
                                        <td>
                                        {{$count}}
                                        <td>
                                            {{$d->title}}
                                        </td>
                                        <td>
                                            <?php
                                            $btype = \Illuminate\Support\Facades\DB::table('business_hub')->where('id', $d->business_hub_id)->first();
                                            ?>
                                            {{$btype->description}}
                                        </td>
                                        <td>
                                            <?php
                                            $c = \Illuminate\Support\Facades\DB::table('countries')->where('id', $d->country_id)->first();

                                            ?>
                                            {{$c->name}}
                                        </td>
                                        <td class="center"> {{$d->created_at}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    Actions <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('entra/business_plan_detail/'.$d->id)}}">
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

