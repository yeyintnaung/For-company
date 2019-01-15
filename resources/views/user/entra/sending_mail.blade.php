@extends('layouts.data_dashboard')
@section('content')
@section('title')
Your mails
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="page-title page_title">
                <h3>Sending Quotation</h3>

            </div>
            <div class="row">
                @if(\Illuminate\Support\Facades\Session::has('email'))
                    <div class="note note-success">
                        <h4 class="block">Successful</h4>

                        <p> Your Quotation Was Successfully Send

                        </p>
                    </div>
                @endif
                    <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Sending Quotation Table</span>
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
                                                    data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
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
                                    <th> To</th>
                                    <th> Title</th>
                                    <th> Send Date</th>
                                    <th> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <tr class="odd gradeX">
                                        <td>
                                        {{$d->id}}

                                        <td>
                                            @if($d->to_type == 'c')
                                                <?php
                                                $com = DB::table('company')->where('user_id', $d->to_user)->first();

                                                ?>

                                                {{$com->name}} ({{$com->email}})
                                                <span class="label label-sm label-warning">Company</span>
                                            @else
                                                <?php
                                                $com = DB::table('investor')->where('user_id', $d->to_user)->first();

                                                ?>

                                                {{$com->name}}
                                                <span class="label label-sm label-info">Investor</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{$d->title}}
                                        </td>
                                        <td class="center"> {{  Carbon\Carbon::parse($d->created_at)->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-xs green dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-expanded="false"> Actions
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="{{url('entra/send_msg_view/'.$d->id)}}">
                                                            <i class="icon-screen-tablet"></i> View</a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;"
                                                           onclick="de('{{url('entra/send_msg_delete/'.$d->id)}}')">
                                                            <i class="icon-trash"></i> Delete</a>
                                                    </li>
                                                    <script>
                                                        function de(li) {
                                                            if (window.confirm('Are you sure want to delete this message') == true) {
                                                                window.location.assign(li)
                                                            }
                                                        }
                                                        ;
                                                    </script>
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

