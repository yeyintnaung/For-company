@php
\Illuminate\Support\Facades\Session::pull('pd');
@endphp
@extends('layouts.data_dashboard')

@section('content')


    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <h1 class="page-title page_title">
                Project Detail <span class="pannel-title">Upload By
                    @php
                        $com=DB::table('company')->where('user_id',$data->user_id)->first()
                    @endphp
                    {{$com->name}}

                </span>
            </h1>
            @include('user.entra.alert.alert')
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="">

                        @include('user.entra.alert.balert')
                        <div class="row ">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">

                                    <div class="caption">
                                        <i class="fa fa-gift"></i>
                                    </div>
                                    <div class="actions">

                                        <a href="{{url('entra/edit_project/'.$data->id)}}"
                                                class="btn btn-default btn-sm"> <i class="fa fa-paper-plane"></i> Edit
                                        </a> <a href="#"
                                                class="btn btn-danger btn-sm" onclick="to_delete('{{url('entra/delete_project/'.$data->id)}}')">
                                            <i class="fa fa-trash"></i> Delete </a>

                                    </div>
                                    <script>
                                        function to_delete(id) {
                                            var c = window.confirm('Are your sure want to delete?');
                                            if (c) {
                                                window.location.assign(id);
                                            }
                                        }
                                    </script>

                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height:200px" data-rail-visible="1"
                                            data-rail-color="yellow"
                                            data-handle-color="#a1b2bd">
                                        <strong>{{$data->name}}</strong>

                                        <br/>

                                        {!! $data->description !!}
                                        <br>
                                        @if($data->attachment1 != '')
                                            <strong style="color:#36c6d3;">
                                            <span class="fa fa-paperclip"
                                                    style="color:#ed6b75;font-weight:bolder">

                                            </span> Attachment

                                            </strong>
                                            <a href="{{url('users/entra/photo/project/'.$data->attachment1)}}" class="btn btn-link">Download</a>
                                        @endif
                                    </div>
                                    <span class="badge badge-danger">
                                    {{$data->competitor_count}}
                                </span> <strong style="color:#36c6d3;">Interested</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                    <strong style="color:#67809f;"><span
                                                style="color:#36c6d3">Post Date :</span> {{$data->created_at}}</strong>
                                    &nbsp;&nbsp; <strong style="color:#67809f;">
                                        <span style="color:#36c6d3">Status :</span>
                                        @if($data->created_at > \Carbon\Carbon::now())
                                            expired

                                        @endif
                                        @if($data->publish==1)
                                            Published
                                        @else


                                        @endif

                                    </strong> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;

                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                        </div>

                        <div class="col-md-12">

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
                                                            <a href="javascript:;"> <i class="fa fa-print"></i> Print
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> <i class="fa fa-file-pdf-o"></i>
                                                                Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> <i class="fa fa-file-excel-o"></i>
                                                                Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $data_q=DB::table('mail_for_project')->where([['project_id','=',$data->id],['to_user','=',Auth::user()->id]])->orWhere([['project_id','=',$data->id],['from_user','=',Auth::user()->id]])->get();
                                    @endphp
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                            id="sample_1">
                                        <thead>
                                        <tr>
                                            <th>
                                                id
                                            </th>
                                            <th> From</th>
                                            <th> To</th>
                                            <th> Title</th>
                                            <th> Send Date</th>
                                            <th> Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data_q as $dq)
                                            <tr class="odd gradeX">
                                                <td>
                                                    {{$dq->id}}
                                                </td>
                                                <td>
                                                    <?php
                                                    $com = DB::table('company')->where('user_id', $dq->from_user)->first();
                                                    ?>
                                                    {{$com->name}}
                                                </td>
                                                <td>
                                                    <?php
                                                    $com = DB::table('company')->where('user_id', $dq->to_user)->first();
                                                    ?>
                                                    {{$com->name}}
                                                </td>
                                                <td>
                                                    {{$dq->title}}
                                                </td>

                                                <td class="center">
                                                    {{  Carbon\Carbon::parse($dq->created_at)->format('Y-m-d') }}
                                                </td>

                                                <td>

                                                        <div class="btn-group">
                                                            @if($dq->to_user == Auth::user()->id)

                                                            <a href='{{url('entra/reply_mail_for_project/'.$dq->id)}}' class="btn btn-xs green">

                                                                Reply

                                                                <i class="fa fa-reply"></i>
                                                            </a>
                                                            @endif

                                                            <a href='{{url('entra/view_mail_for_project/'.$dq->id)}}' class="btn btn-xs purple">

                                                                View

                                                                <i class="fa fa-reply"></i>
                                                            </a>

                                                        </div>

                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            <!--   </div> -->

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
