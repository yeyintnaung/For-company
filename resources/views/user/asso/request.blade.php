@extends('layouts.asso_layouts.data_dashboard')
@section('content')
    <div class="page-content-wrapper" >
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" >
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="" >
                <h3 >Received Messages</h3 >

            </div >
            <div class="row" >
                @include('user.inves.alert.alert')
                <div class="col-md-12" >
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered" >
                        <div class="portlet-title" >
                            <div class="caption font-dark" >
                                <i class="icon-settings font-dark" ></i >
                                <span class="caption-subject bold uppercase" > Received Messages Table</span >
                            </div >
                            <div class="actions" >

                            </div >
                        </div >
                        <div class="portlet-body" >
                            <div class="table-toolbar" >
                                <div class="row" >
                                    <div class="col-md-6" >

                                    </div >
                                    <div class="col-md-6" >
                                        <div class="btn-group pull-right" >
                                            <button class="btn green  btn-outline dropdown-toggle"
                                                    data-toggle="dropdown" >Tools
                                                <i class="fa fa-angle-down" ></i >
                                            </button >
                                            <ul class="dropdown-menu pull-right" >
                                                <li >
                                                    <a href="javascript:;" >
                                                        <i class="fa fa-print" ></i > Print </a >
                                                </li >
                                                <li >
                                                    <a href="javascript:;" >
                                                        <i class="fa fa-file-pdf-o" ></i > Save as PDF </a >
                                                </li >
                                                <li >
                                                    <a href="javascript:;" >
                                                        <i class="fa fa-file-excel-o" ></i > Export to Excel </a >
                                                </li >
                                            </ul >
                                        </div >
                                    </div >
                                </div >
                            </div >
                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                    id="sample_1" >
                                <thead >
                                <tr >
                                    <th >
                                        id
                                    </th >
                                    <th > From  </th >
                                    <th > Detail </th >
                                    <th > Send Date</th >
                                    <th > Actions </th >
                                </tr >
                                </thead >
                                <tbody >
                                @foreach($rm as $d)
                                    <tr class="odd gradeX" >
                                        <td >
                                        {{$d->id}}

                                        <td >
                                            <?php
                                            $com = DB::table('company')->where('id', $d->com_id)->first();
                                            ?>
                                            {{$com->name}} ({{$com->email}})
                                        </td >0
                                        <td >
                                               {{str_limit($d->request_message,20)}}
                                        </td >
                                        <td class="center" > {{$d->created_at}}</td >
                                        <td >
                                            <div class="btn-group" >
                                                <button class="btn btn-xs green dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-expanded="false" > Actions
                                                    <i class="fa fa-angle-down" ></i >
                                                </button >
                                                <ul class="dropdown-menu pull-left" role="menu" >
                                                    <li >
                                                        <a href="{{url('asso/request_view/'.$d->id)}}" >
                                                            <i class="icon-screen-tablet" ></i > View</a >
                                                    </li >

                                                    <li >
                                                        <a href="javascript:;"
                                                                onclick="de('{{url('asso/request_delete/'.$d->id)}}')" >
                                                            <i class="icon-trash" ></i > Delete</a >
                                                    </li >
                                                    <script >
                                                        function de(li) {
                                                            if (window.confirm('Are you sure want to delete this message') == true) {
                                                                window.location.assign(li)
                                                            }
                                                        }
                                                        ;
                                                    </script >
                                                </ul >
                                            </div >
                                        </td >
                                    </tr >

                                @endforeach

                                </tbody >
                            </table >
                        </div >
                    </div >
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div >
            </div >

        </div >
        <!-- END CONTENT BODY -->
    </div >
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->

    <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
@endsection

