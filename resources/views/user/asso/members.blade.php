@extends('layouts.asso_layouts.data_dashboard')
@section('content')
    <div class="page-content-wrapper" >
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" >
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="m-heading-1 " >
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
                                <span class="caption-subject bold uppercase" > Members Table</span >
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
                                    <th > Company Name</th >
                                    <th > Ceo Email</th >
                                    <th > Ceo Phone</th >
                                    <th > Start Date</th >
                                    <th > Actions</th >
                                </tr >
                                </thead >
                                <tbody >
                                <?php
                                $count = 0;
                                ?>
                                @foreach($data as $d)
                                    @php
                                        $comdata=DB::table('company')->where('user_id',$d)->first();
                                        $comcount=DB::table('company')->where('user_id',$d)->count();
                                         $count++;
                                    @endphp
                                    @if($comcount > 0)
                                        <tr class="odd gradeX" >
                                            <td >

                                            {{$count}}

                                            <td >
                                                {{$comdata->name}}

                                            </td >
                                            <td >
                                                {{$comdata->ceo_name}}

                                            </td >
                                            <td >
                                                {{$comdata->ceo_email}}


                                            </td >
                                            <td >
                                                {{$comdata->created_at}}


                                            </td >

                                            <td >
                                                <div class="btn-group" >
                                                    <button class="btn btn-xs green dropdown-toggle" type="button"
                                                            data-toggle="dropdown" aria-expanded="false" > Actions
                                                        <i class="fa fa-angle-down" ></i >
                                                    </button >
                                                    <ul class="dropdown-menu pull-left" role="menu" >
                                                        <li >
                                                            <a href="{{url('asso/member_detail/'.$d)}}" >
                                                                <i class="icon-screen-tablet" ></i > View</a >
                                                        </li >

                                                    </ul >
                                                </div >
                                            </td >
                                        </tr >
                                    @endif
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

