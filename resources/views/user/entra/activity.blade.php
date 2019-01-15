@extends('layouts.dashboard')

@section('content')
@section('title')
Activities
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

    <!-- BEGIN SIDEBAR -->

    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div >
        <!-- BEGIN CONTENT BODY -->
        <div class="col-xs-12" style="background-color:white;padding-bottom:22px;" >
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->


            <h1 class="page-title page_title">
                Activities 
            </h1>

            <div class="row" >
                @foreach($data as $d)

                    <div class="col-md-6 " >
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box blue-hoki" >
                            <div class="portlet-title" >

                                <div class="caption" >
                                    <i class="fa fa-gift" ></i >
                                </div >
                                @if(Auth::user()->id == $d->user_id)
                                    <div class="actions" >
                                    <a href="{{url('entra/edit_activity_form/'.$d->id)}}"
                                            class="btn btn-default btn-sm" >
                                        <i class="fa fa-pencil" ></i > Edit </a >
                                    <a href="javascript:;" onclick="de('{{url('entra/delete_activity/'.$d->id)}}')"
                                            class="btn btn-default btn-sm" >
                                        <i class="fa fa-trash" ></i > Delete </a >
                                </div >
                                    <script >
                                    function de(li) {
                                        if (window.confirm('Are You Sure Want to delete?')) {
                                            window.location.assign(li);
                                        }
                                    }
                                    ;
                                </script >
                                @endif

                            </div >
                            <div class="portlet-body" >
                                <div class="scroller" style="height:200px" data-rail-visible="1"
                                        data-rail-color="yellow"
                                        data-handle-color="#a1b2bd" >
                                    <strong >{{$d->title}}</strong >
                                    <?php
                                    $tocheck = \Illuminate\Support\Facades\DB::table('company')->where('user_id', $d->user_id)->count();
                                    if ($tocheck > 0) {
                                        $photolink = 'users/entro/photo/';
                                    } else {
                                        $photolink = 'users/inves/photo/';
                                    }

                                    ?>

                                    <br />
                                    <img src="{{url($photolink.$d->image)}}" width="192" height="100"
                                            style=" vertical-align: text-top;float:left;margin:9px;" />
                                    {!! $d->description !!}
                                </div >
                                <strong style="color:#67809f;" >{{$d->created_at}}</strong >

                            </div >
                        </div >
                        <!-- END Portlet PORTLET-->
                    </div >
                @endforeach

            </div >

        </div >
        <!-- END CONTENT BODY -->
    </div >
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler" >
        <i class="icon-login" ></i >
    </a >
    <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->


@endsection
