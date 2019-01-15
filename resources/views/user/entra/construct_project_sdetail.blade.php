@extends('layouts.data_dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="note note-success">
                    <h4 class="block">Successful</h4>

                    <p>  {{\Illuminate\Support\Facades\Session::get('success')}}

                    </p>
                </div>
            @endif
            <h1 class="page-title page_title">
                Project Detail <span class="pannel-title">Upload By
                    @php
                        $user=DB::connection('mysql_service')->table('users')->where('id',$data->user_id)->first();
                    @endphp
                    {{ $user->name }}
                    @if($data->confirm != 'done')
                        <span class="label label-warning"> Open </span>
                    @else
                        <span class="label label-danger"> Close </span>
                    @endif

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


                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height:200px" data-rail-visible="1"
                                         data-rail-color="yellow"
                                         data-handle-color="#a1b2bd">
                                        <strong>{{$data->name}}</strong> <br/>
                                        {!! $data->description !!}
                                        <br>
                                    </div>
                                    <div>
                                        {{$data->address}}

                                        <?php
                                        $city = \Illuminate\Support\Facades\DB::table('cities')->where('id', $data->city)->first();
                                        $state = \Illuminate\Support\Facades\DB::table('states')->where('id', $data->state)->first();
                                        ?>

                                        <span>{{$city->name}}</span> <span>{{$state->name}}</span>
                                    </div>
                                    <div>

                                        <strong style="color:#67809f;">
                                            <span style="color:#36c6d3">  Phone No:</span> {!! $data->phone !!}

                                        </strong>
                                    </div>
                                    <strong style="color:#67809f;">
                                        <span style="color:#36c6d3">Post Date :</span> {{$data->created_at}}
                                    </strong>
                                             <?php
                                    $get_draw1=DB::connection('mysql_service')->table('attachment')->where([['project_id','=',$data->id],['position','=',1]]);
                                    ?>
                                    @if($get_draw1->count() != 0 )
                                        <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw1->first()->file_name}}" class="btn blue" download="{{$get_draw1->first()->file_name}}"> Draw 1
                                            <span class="fa fa-download"></span></a>
                                    @else

                                    @endif
                                    <?php
                                    $get_draw2=DB::connection('mysql_service')->table('attachment')->where([['project_id','=',$data->id],['position','=',2]]);
                                    ?>
                                    @if($get_draw2->count() != 0 )
                                        <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw2->first()->file_name}}" class="btn blue" download="{{$get_draw2->first()->file_name}}"> Draw 2
                                            <span class="fa fa-download"></span></a>
                                    @else

                                    @endif
                                    <?php
                                    $get_draw3=DB::connection('mysql_service')->table('attachment')->where([['project_id','=',$data->id],['position','=',3]]);
                                    ?>
                                    @if($get_draw3->count() != 0 )
                                        <a href="{{'http://www.hivephing.com/constructback/public/user_attachments/'.$get_draw3->first()->file_name}}" class="btn blue" download="{{$get_draw3->first()->file_name}}"> Draw 3
                                            <span class="fa fa-download"></span></a>
                                    @else

                                    @endif
                                    <br>
                                    <br>
                                    <br>
                                    <br>&nbsp;&nbsp; &nbsp;&nbsp;
                                    <a href="{{url('entra/construct_send_mail/'.$data->id)}}" class="btn green"> Send
                                        Mail <span class="fa fa-paper-plane"></span></a>

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
                                <th> Name</th>
                                <th> Description</th>
                                <th> Status</th>
                                <th> Send Date</th>
                                <th> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($message_data as $dq)
                                <tr class="odd gradeX">
                                    <td>
                                    {{$dq->id}}

                                    <td>
                                        {{$data->name}}
                                    </td>
                                    <td>
                                        {{str_limit($dq->message,100)}}
                                    </td>

                                    <td>
                                        @if($data->confirm !='done')
                                            Open
                                        @else
                                            Close
                                        @endif
                                    </td>
                                    <td class="center"> {{  Carbon\Carbon::parse($dq->created_at)->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{url('entra/construct_mail_view/'.$dq->id)}}"
                                           class="btn btn-small btn-success">View</a>
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
