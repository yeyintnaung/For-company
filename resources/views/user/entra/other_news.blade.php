@extends('layouts.dashboard')
@section('content')
    <!-- END HEAD -->
@section('title')
    Business's News
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

<body>
<!-- BEGIN : LOGIN PAGE 5-1 -->

@if(\Illuminate\Support\Facades\Session::has('no_auth'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    You need to register or login to see projects details
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif
<div class="col-xs-12" style="background-color:#ddedf2;padding-bottom:22px;">

    <div class="btn-group btn-group-sm btn-group-solid">
        <a href="{{url('business_news')}}" type="button" class="btn btn-lg red">Business News</a>
        <a href="{{url('othernews')}}" type="button" class="btn btn-lg blue">Other News</a>
    </div>
    <div class="col-xs-12" style="text-align: center;font-size:22px;font-weight:bolder;margin-top:12px;">Other News
    </div>
    <div class="col-xs-12"  style='overflow:auto;height:823px;'>
        @foreach($news as $n)
            <div class="col-md-6 ">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>{{str_limit($n->title, 30)}} </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#" class="fullscreen"> </a>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div style="overflow:auto;height:300px;">
                            <strong>{{$n->title}}</strong>
                            <br/>                           <img src="{{asset('upload/'.$n->image)}}" width="152" style=" vertical-align: text-top;float:left;margin:9px;" /> {!!$n->des!!}</div>
                        <strong style="color:#67809f;">{{$n->created_at}}</strong>

                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        @endforeach
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-sm-4">&nbsp;&nbsp;&nbsp;
            </div>
            <div class=" col-sm-6">
                {{$news->links()}}
            </div>
            <div class="col-sm-2">&nbsp;&nbsp;&nbsp;
            </div>
        </div>

    </div>


</div>
@endsection