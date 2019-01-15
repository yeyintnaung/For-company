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
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="">

                        @if(\Illuminate\Support\Facades\Session::has('send'))
                            <div class="note note-success">
                                <h4 class="block">Successful</h4>

                                <p> Successfully Send

                                </p>
                            </div>
                        @endif
                        <div class="row ">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">

                                    <div class="caption">
                                        <i class="fa fa-gift"></i>
                                    </div>
                                    <div class="actions">
                                        <a href="{{url('entra/send_mail_for_project/'.$data->id)}}"
                                                class="btn btn-default btn-sm"> <i class="fa fa-paper-plane"></i> Send
                                            Mail </a>

                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height:200px" data-rail-visible="1"
                                            data-rail-color="yellow"
                                            data-handle-color="#a1b2bd">
                                        <strong>{{$data->name}}</strong>

                                        <br/>

                                        {!! $data->description !!}
                                        <br> <strong style="color:#36c6d3;">
                                            <span class="fa fa-paperclip"
                                                    style="color:#ed6b75;font-weight:bolder"></span> Attachment

                                        </strong>
                                        <a href="{{url('entra/photo/project/'.$data->attachment1)}}" class="btn-link">Download</a>
                                        <a href="{{url('entra/photo/project/'.$data->attachment2)}}" class="btn-link">Download</a>
                                    </div>
                                    <span class="badge badge-danger">
                                    {{$data->competitor_count}}
                                </span> <strong style="color:#36c6d3;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                                    <strong style="color:#67809f;"><span
                                                style="color:#36c6d3">Post Date :</span> {{$data->created_at}}</strong>
                                    &nbsp;&nbsp; &nbsp;&nbsp;
                                    <a href="{{url('other_company_detail/'.$data->user_id)}}" class="btn green">view
                                        company profile <span
                                                class="fa fa-search"></span></a> <a href="" class="btn green"> Mark
                                        <span class="fa fa-check"></span></a>

                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                        </div>
                        <!-- END VALIDATION STATES-->
                    </div>
                </div>
            </div>
            <div class="col-md-12">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> Sending Quotation Table</span>
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
                                                data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
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
                        @php
                            $data_q=DB::table('mail_for_project')->where([['project_id','=',$data->id],['from_user','=',Auth::user()->id]])->orWhere([['project_id','=',$data->id],['to_user','=',Auth::user()->id]])->get();
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
                                    <td>

                                        @if(Auth::user()->id == $dq->from_user)
                                            <?php
                                            $com = DB::table('company')->where('user_id', $dq->from_user)->first();
                                            ?>
                                            {{$com->name}}
                                            <span class="label label-sm label-info">Send</span>
                                        @else
                                            <?php
                                            $com = DB::table('company')->where('user_id', $dq->from_user)->first();
                                            ?>
                                            <span class="label label-sm label-danger">Reply from</span>

                                            {{$com->name}}

                                        @endif

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
                                    <td class="center"> {{  Carbon\Carbon::parse($dq->created_at)->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{url('entra/view_mail_for_project/'.$dq->id)}}" class="btn btn-small btn-success">View</a>
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
            <div class="row">&nbsp;</div>

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
