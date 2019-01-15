@extends('layouts.dashboard')

@section('content')
@section('title')
    Add price
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

<!-- BEGIN HEADER -->
<!-- BEGIN HEADER -->
<?php
if (!empty(session('data')))
{
    ?>
<?php
    $for_show = session('data')->second_type;

} else {
    $for_show = 1;

}
?>

<!-- BEGIN CONTAINER -->
<div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
    <!-- BEGIN SIDEBAR -->
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="col-sm-12">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="min-height: 1432px;">
            @if(\Illuminate\Support\Facades\Session::has('added'))
                <div class="note note-success">
                    <h4 class="block">Successful</h4>

                    <p> Successfully Added

                    </p>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('edited'))
                <div class="note note-success">
                    <h4 class="block">Successful</h4>
                    <p>

                        Successfully Edited

                    </p>
                </div>
            @endif

            @include('user.entra.price.catforpaint')


            <h2 style="font-size:19px;font-weight:bolder;color:#32c5d2;">Others</h2>

            <div class="clearfix">
                <button type="button" class="btn blue-hoki" onclick="setv(1)"> ျပတင္းတံခါး၊ တခါးရြက္၊</button>
                <button type="button" class="btn blue-madison" onclick="setv(2)">လက္ရန္း ၊ က်ီးေဘာင္ ၊ ေျခေက်ာ္
                </button>
                <button type="button" class="btn blue-hoki" onclick="setv(3)">သံပန္း ၊ သံတံခါး</button>
            </div>
            <script>

                function setv(value){
                    document.getElementsByClassName('setv').value=value;
                    la=[1,2,3];
                    for(i=1;i < la.length+1;i++) {
                        if ('show' + i == document.getElementById('show' + value).id) {
                            document.getElementById('show' + i).style.display = 'block';
                            console.log(i);
                        }else{
                            document.getElementById('show' + i).style.display = 'none';
                            console.log(i + '' + value);


                        }

                    }


                }
                //                function main_setv(value){
                //                    document.getElementById('main_setv').value=value;
                //
                //                }
            </script>
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
        {{--<div class="page-bar">--}}
        {{--<ul class="page-breadcrumb">--}}
        {{--<li>--}}
        {{--<a href="index.html">Home</a>--}}
        {{--<i class="fa fa-circle"></i>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="#">Tables</a>--}}
        {{--<i class="fa fa-circle"></i>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<span>Datatables</span>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--<div class="page-toolbar">--}}
        {{--<div class="btn-group pull-right">--}}
        {{--<button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions--}}
        {{--<i class="fa fa-angle-down"></i>--}}
        {{--</button>--}}
        {{--<ul class="dropdown-menu pull-right" role="menu">--}}
        {{--<li>--}}
        {{--<a href="#">--}}
        {{--<i class="icon-bell"></i> Action</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="#">--}}
        {{--<i class="icon-shield"></i> Another action</a>--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--<a href="#">--}}
        {{--<i class="icon-user"></i> Something else here</a>--}}
        {{--</li>--}}
        {{--<li class="divider"> </li>--}}
        {{--<li>--}}
        {{--<a href="#">--}}
        {{--<i class="icon-bag"></i> Separated link</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
        {{--<h1 class="page-title"> Ajax Datatables--}}
        {{--<small>basic datatable samples</small>--}}
        {{--</h1>--}}
        <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                {{--<div class="note note-danger">--}}
                {{--<p> NOTE: The below datatable is not connected to a real database so the filter and sorting is just simulated for demo purposes only. </p>--}}
                {{--</div>--}}
                <!-- Begin: Demo Datatable 1 -->
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12">&nbsp;</div>
                    {{--for 1 1--}}
                    {{--//normal seciton--}}
                    <div id='show1' style="display:block;" >

                        <h4 style="font-weight:bolder;color:#32c5d2;"> ျပတင္းတံခါး၊ တခါးရြက္၊:</h4>
                        <br>
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                        $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','normal'],['main_type','=','3'],['second_type','=','1']]);
                        @endphp
                        {{--edit--}}
                        @if($check->count() != 0)
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">

                                <div class="col-md-2 col-lg-3"
                                     style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                    Normal class
                                    <input type="hidden" name="pctype" value="normal"/>
                                    <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                    <input type="hidden" name="second_type" class="setv" value="1"/>

                                </div>
                                <div class="col-md-3 col-lg-3" style="padding:7%;">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            @if($check->first()->sq =='one_sq')
                                                1sqft ေစ်းႏူန္း
                                            @else
                                                1 က်င္းေစ်းႏူန္း

                                            @endif
                                        </label>


                                    </div>

                                    <div class="form-group form-md-radios">
                                        <label>ကုန္က်ေငြ</label>:
                                        {{$check->first()->cost_for_paint_pk }}
                                        @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                            @if ($errors->has('cost_for_paint_pk'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                            @endif
                                        @endif


                                    </div>

                                </div>


                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">
                                                    <h3>
                                                        ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">
                                                                {{$check->first()->clearing }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                        </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">

                                                    <h3>
                                                        ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                {{$check->first()->cost_ex_clear }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->cost_ex_Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>

                                                        </thead>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}" type="submit"
                                   class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                   style="float:right;">Edit</a>


                            </div>
                        @else
                            {{--save--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        Normal class
                                        <input type="hidden" name="pctype" value="normal"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="1"/>
                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>
                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>

                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                                @endif
                                            @endif
                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">
                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('clearing'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('clearing') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('Selar'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Selar') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Putty') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('Color')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Color') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('Testion')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Testion') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_clear')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Selar')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Putty')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Color')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Testion')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                        {{--//end normal section--}}

                        {{--//middle section--}}
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                        $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','middle'],['main_type','=','3'],['second_type','=','1']]);
                        @endphp
                        @if($check->count() != 0 )
                            {{--edit--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">

                                <div class="col-md-2 col-lg-3"
                                     style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                    Middle class
                                    <input type="hidden" name="pctype" value="middle"/>
                                    <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                    <input type="hidden" name="second_type" class='setv' value="1"/>

                                </div>
                                <div class="col-md-3 col-lg-3" style="padding:7%;">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            @if($check->first()->sq =='one_sq')
                                                1sqft ေစ်းႏူန္း
                                            @else
                                                1 က်င္းေစ်းႏူန္း

                                            @endif
                                        </label>


                                    </div>

                                    <div class="form-group form-md-radios">
                                        <label>ကုန္က်ေငြ</label>:
                                        {{$check->first()->cost_for_paint_pk }}


                                    </div>

                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">
                                                    <h3>
                                                        ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">
                                                                {{$check->first()->clearing }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                        </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">

                                                    <h3>
                                                        ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                {{$check->first()->cost_ex_clear }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->cost_ex_Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>

                                                        </thead>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}" type="submit"
                                   class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                   style="float:right;"> Edit </a>


                            </div>
                        @else
                            {{--save--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        Middle class
                                        <input type="hidden" name="pctype" value="middle"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="1"/>

                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>
                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                                @endif
                                            @endif
                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="">
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_clear'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Selar'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Putty'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Color'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Testion'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                        {{--//end middle--}}

                        {{--High class--}}
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                        $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','high'],['main_type','=','3'],['second_type','=','1']]);

                        @endphp
                        @if($check->count() != 0 )
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/edit_for_paint/'.$check->first()->id)}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        High class
                                        <input type="hidden" name="pctype" value="high"/>
                                        <input type="hidden" name="main_type"  class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="1"/>

                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                @if($check->first()->sq =='one_sq')
                                                    1sqft ေစ်းႏူန္း
                                                @else
                                                    1 က်င္းေစ်းႏူန္း

                                                @endif
                                            </label>


                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>:
                                            {{$check->first()->cost_for_paint_pk }}


                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">
                                                                    {{$check->first()->clearing }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Selar }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    {{$check->first()->Putty }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Color }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Testion }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    {{$check->first()->cost_ex_clear }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Selar }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    {{$check->first()->cost_ex_Putty }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Color }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Testion }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}"
                                       class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                       style="float:right;"> Edit </a>


                                </form>
                            </div>
                        @else
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        High class
                                        <input type="hidden" name="pctype" value="high"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="1"/>
                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>
                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">
                                                    {{ $errors->first('cost_for_paint_pk') }}
                                                </strong>
                                            </span>
                                                @endif
                                            @endif

                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('clearing'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('clearing') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Selar'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Selar') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>


                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Putty') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Color'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Color') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Testion'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Testion') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_clear'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Selar'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Putty'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Color'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Testion'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                        {{--//end High--}}
                    </div>
                    {{--end for 1 1--}}

                    <div id='show2' style="display:none;" >
                        {{--for 1 2--}}
                        {{--//normal seciton--}}
                        <h4 style="font-weight:bolder;color:#32c5d2;">လက္ရန္း ၊ က်ီးေဘာင္ ၊ ေျခေက်ာ္</h4>
                        <br>
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                        $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','normal'],['main_type','=','3'],['second_type','=','2']]);
                        @endphp
                        {{--edit--}}
                        @if($check->count() != 0)
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">

                                <div class="col-md-2 col-lg-3"
                                     style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                    Normal class
                                    <input type="hidden" name="pctype" value="normal"/>
                                    <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                    <input type="hidden" name="second_type" class="setv" value="2"/>

                                </div>
                                <div class="col-md-3 col-lg-3" style="padding:7%;">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            @if($check->first()->sq =='one_sq')
                                                1sqft ေစ်းႏူန္း
                                            @else
                                                1 က်င္းေစ်းႏူန္း

                                            @endif
                                        </label>


                                    </div>

                                    <div class="form-group form-md-radios">
                                        <label>ကုန္က်ေငြ</label>:
                                        {{$check->first()->cost_for_paint_pk }}
                                        @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                            @if ($errors->has('cost_for_paint_pk'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                            @endif
                                        @endif


                                    </div>

                                </div>


                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">
                                                    <h3>
                                                        ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">
                                                                {{$check->first()->clearing }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                        </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">

                                                    <h3>
                                                        ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                {{$check->first()->cost_ex_clear }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->cost_ex_Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>

                                                        </thead>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}" type="submit"
                                   class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                   style="float:right;">Edit</a>


                            </div>
                        @else
                            {{--save--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        Normal class
                                        <input type="hidden" name="pctype" value="normal"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="2"/>
                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>
                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>

                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                                @endif
                                            @endif
                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">
                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('clearing'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('clearing') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('Selar'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Selar') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Putty') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('Color')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Color') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('Testion')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Testion') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_clear')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Selar')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Putty')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Color')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Testion')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                        {{--//end normal section--}}

                        {{--//middle section--}}
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                        $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','middle'],['main_type','=','3'],['second_type','=','2']]);
                        @endphp
                        @if($check->count() != 0 )
                            {{--edit--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">

                                <div class="col-md-2 col-lg-3"
                                     style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                    Middle class
                                    <input type="hidden" name="pctype" value="middle"/>
                                    <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                    <input type="hidden" name="second_type" class='setv' value="2"/>

                                </div>
                                <div class="col-md-3 col-lg-3" style="padding:7%;">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            @if($check->first()->sq =='one_sq')
                                                1sqft ေစ်းႏူန္း
                                            @else
                                                1 က်င္းေစ်းႏူန္း

                                            @endif
                                        </label>


                                    </div>

                                    <div class="form-group form-md-radios">
                                        <label>ကုန္က်ေငြ</label>:
                                        {{$check->first()->cost_for_paint_pk }}


                                    </div>

                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">
                                                    <h3>
                                                        ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">
                                                                {{$check->first()->clearing }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                        </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">

                                                    <h3>
                                                        ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                {{$check->first()->cost_ex_clear }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->cost_ex_Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>

                                                        </thead>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}" type="submit"
                                   class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                   style="float:right;"> Edit </a>


                            </div>
                        @else
                            {{--save--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        Middle class
                                        <input type="hidden" name="pctype" value="middle"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="2"/>

                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>
                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                                @endif
                                            @endif
                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="">
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_clear'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Selar'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Putty'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Color'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Testion'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                        {{--//end middle--}}

                        {{--High class--}}
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                        $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','high'],['main_type','=','3'],['second_type','=','2']]);

                        @endphp
                        @if($check->count() != 0 )
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/edit_for_paint/'.$check->first()->id)}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        High class
                                        <input type="hidden" name="pctype" value="high"/>
                                        <input type="hidden" name="main_type"  class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="2"/>

                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                @if($check->first()->sq =='one_sq')
                                                    1sqft ေစ်းႏူန္း
                                                @else
                                                    1 က်င္းေစ်းႏူန္း

                                                @endif
                                            </label>


                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>:
                                            {{$check->first()->cost_for_paint_pk }}


                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">
                                                                    {{$check->first()->clearing }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Selar }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    {{$check->first()->Putty }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Color }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Testion }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    {{$check->first()->cost_ex_clear }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Selar }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    {{$check->first()->cost_ex_Putty }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Color }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Testion }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}"
                                       class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                       style="float:right;"> Edit </a>


                                </form>
                            </div>
                        @else
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        High class
                                        <input type="hidden" name="pctype" value="high"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="2"/>
                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>
                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">
                                                    {{ $errors->first('cost_for_paint_pk') }}
                                                </strong>
                                            </span>
                                                @endif
                                            @endif

                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('clearing'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('clearing') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Selar'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Selar') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>


                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Putty') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Color'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Color') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Testion'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Testion') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_clear'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Selar'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Putty'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Color'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Testion'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                    </div>
                    {{--//end High--}}
                    {{--end for 1 2--}}
                    <div id='show3' style="display:none;">
                        {{--for 1 2--}}
                        {{--//normal seciton--}}
                        <h4 style="font-weight:bolder;color:#32c5d2;">သံပန္း ၊ သံတံခါး</h4>
                        <br>
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                            $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','normal'],['main_type','=','3'],['second_type','=','3']]);
                        @endphp
                        {{--edit--}}
                        @if($check->count() != 0)
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">

                                <div class="col-md-2 col-lg-3"
                                     style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                    Normal class
                                    <input type="hidden" name="pctype" value="normal"/>
                                    <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                    <input type="hidden" name="second_type" class="setv" value="3"/>

                                </div>
                                <div class="col-md-3 col-lg-3" style="padding:7%;">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            @if($check->first()->sq =='one_sq')
                                                1sqft ေစ်းႏူန္း
                                            @else
                                                1 က်င္းေစ်းႏူန္း

                                            @endif
                                        </label>


                                    </div>

                                    <div class="form-group form-md-radios">
                                        <label>ကုန္က်ေငြ</label>:
                                        {{$check->first()->cost_for_paint_pk }}
                                        @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                            @if ($errors->has('cost_for_paint_pk'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                            @endif
                                        @endif


                                    </div>

                                </div>


                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">
                                                    <h3>
                                                        ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">
                                                                {{$check->first()->clearing }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                        </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">

                                                    <h3>
                                                        ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                {{$check->first()->cost_ex_clear }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->cost_ex_Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>

                                                        </thead>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}" type="submit"
                                   class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                   style="float:right;">Edit</a>


                            </div>
                        @else
                            {{--save--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        Normal class
                                        <input type="hidden" name="pctype" value="normal"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="3"/>
                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>
                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>

                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                                @endif
                                            @endif
                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">
                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('clearing'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('clearing') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('Selar'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Selar') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Putty') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('Color')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Color') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('Testion')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('Testion') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_clear')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Selar')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Putty')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Color')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('cost_ex_Testion')== 'normal')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                                        <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                        </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                        {{--//end normal section--}}

                        {{--//middle section--}}
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                            $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','middle'],['main_type','=','3'],['second_type','=','3']]);
                        @endphp
                        @if($check->count() != 0 )
                            {{--edit--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">

                                <div class="col-md-2 col-lg-3"
                                     style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                    Middle class
                                    <input type="hidden" name="pctype" value="middle"/>
                                    <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                    <input type="hidden" name="second_type" class='setv' value="3"/>

                                </div>
                                <div class="col-md-3 col-lg-3" style="padding:7%;">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            @if($check->first()->sq =='one_sq')
                                                1sqft ေစ်းႏူန္း
                                            @else
                                                1 က်င္းေစ်းႏူန္း

                                            @endif
                                        </label>


                                    </div>

                                    <div class="form-group form-md-radios">
                                        <label>ကုန္က်ေငြ</label>:
                                        {{$check->first()->cost_for_paint_pk }}


                                    </div>

                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">
                                                    <h3>
                                                        ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">
                                                                {{$check->first()->clearing }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                        </tr>

                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                    <div class="portlet-title">


                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-container" style="">

                                            <div id="datatable_ajax_wrapper"
                                                 class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                <div class="table-responsive">

                                                    <h3>
                                                        ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                    </h3>
                                                    <table class="table table-bordered no-footer">

                                                        <thead>
                                                        <tr role="row" class="heading"
                                                            style="background-color: #345884;text-align: center !important;color: white;">

                                                            <th width="10%" style="font-size: 22px;"
                                                                class="sorting_disabled" rowspan="1" colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>
                                                            <th width="10%" class="sorting_disabled" rowspan="1"
                                                                colspan="1">

                                                            </th>

                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td width="10%" rowspan="1"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                ခ်ီးခ်ြတ္ျခင္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                {{$check->first()->cost_ex_clear }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Selar
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Selar }}

                                                            </td>

                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Putty
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">

                                                                {{$check->first()->cost_ex_Putty }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Color
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Color }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>
                                                        <tr role="row" class="filter">

                                                            <td rowspan="1" width="10%"
                                                                style="font-size: 16px;text-align:center;" colspan="1">
                                                                Testion
                                                            </td>
                                                            <td width="10%" rowspan="1" colspan="1">

                                                                1 က်င္းေစ်းႏူန္း
                                                            </td>
                                                            <td rowspan="1" width="10%" colspan="1">
                                                                {{$check->first()->cost_ex_Testion }}

                                                            </td>
                                                            {{--<td rowspan="1" colspan="1">--}}
                                                            {{--<div class="margin-bottom-5">--}}
                                                            {{--<input type="text"--}}
                                                            {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                            {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                            {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                            {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                        </tr>

                                                        </thead>

                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}" type="submit"
                                   class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                   style="float:right;"> Edit </a>


                            </div>
                        @else
                            {{--save--}}
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        Middle class
                                        <input type="hidden" name="pctype" value="middle"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="3"/>

                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>
                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">{{ $errors->first('cost_for_paint_pk') }}</strong>
                                            </span>
                                                @endif
                                            @endif
                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="">
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_clear'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Selar'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Putty'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Color'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'middle')
                                                                        @if ($errors->has('cost_ex_Testion'))
                                                                            <span class="help-block">
                                                                       <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                          </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                        {{--//end middle--}}

                        {{--High class--}}
                        @php
                            $get_com_id=DB::table('company')->where('user_id',Auth::user()->id)->first();
                            $check=DB::connection('mysql_service')->table('Company_with_paint')->where([['com_id','=',$get_com_id->id],['pctype','=','high'],['main_type','=','3'],['second_type','=','3']]);

                        @endphp
                        @if($check->count() != 0 )
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/edit_for_paint/'.$check->first()->id)}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        High class
                                        <input type="hidden" name="pctype" value="high"/>
                                        <input type="hidden" name="main_type"  class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="3"/>

                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                @if($check->first()->sq =='one_sq')
                                                    1sqft ေစ်းႏူန္း
                                                @else
                                                    1 က်င္းေစ်းႏူန္း

                                                @endif
                                            </label>


                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>:
                                            {{$check->first()->cost_for_paint_pk }}


                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">
                                                                    {{$check->first()->clearing }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Selar }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    {{$check->first()->Putty }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Color }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->Testion }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    {{$check->first()->cost_ex_clear }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Selar }}

                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    {{$check->first()->cost_ex_Putty }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Color }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    {{$check->first()->cost_ex_Testion }}

                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{url('entra/edit_form_for_paint/'.$check->first()->id)}}"
                                       class="col-lg-4 btn btn-ms btn-info" value="Edit"
                                       style="float:right;"> Edit </a>


                                </form>
                            </div>
                        @else
                            <div class="col-xs-12" style="border:2px solid #e4e8fb">
                                <form action="{{url('entra/add_for_paint')}}" method="post">

                                    <div class="col-md-2 col-lg-3"
                                         style="text-align:center;padding:7%;font-size:22px;color:#36c6d3;font-weight:bolder;">
                                        High class
                                        <input type="hidden" name="pctype" value="high"/>
                                        <input type="hidden" name="main_type" class="main_setv" value="3"/>
                                        <input type="hidden" name="second_type" class="setv" value="3"/>
                                    </div>
                                    <div class="col-md-3 col-lg-3" style="padding:7%;">
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios25" value="one_sq"
                                                       checked=""> 1 က်င္းေစ်းႏူန္း
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="sq" id="optionsRadios26" value="ten_sq"
                                                       checked=""> 1sqft ေစ်းႏူန္း
                                                <span></span>
                                            </label>

                                        </div>

                                        <div class="form-group form-md-radios">
                                            <label>ကုန္က်ေငြ</label>
                                            <input type="text" class="form-control form-filter input-sm"
                                                   name="cost_for_paint_pk" placeholder="ကုန္က်ေငြ" required/>
                                            @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                @if ($errors->has('cost_for_paint_pk'))
                                                    <span class="help-block">
                                                <strong style="font-size:11px;color:red;">
                                                    {{ $errors->first('cost_for_paint_pk') }}
                                                </strong>
                                            </span>
                                                @endif
                                            @endif

                                        </div>

                                    </div>


                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-6 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">
                                                        <h3>
                                                            ပါ၀င္ေသာလုပ္ေဆာင္ခ်က္မ်ား
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <select class="form-control" name="clearing">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('clearing'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('clearing') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Selar">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Selar'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Selar') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>


                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <select class="form-control" name="Putty">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Putty'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Putty') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Color">
                                                                        <option value="1" selected>1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Color'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Color') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <select class="form-control" name="Testion">
                                                                        <option value="yes" selected>Yes</option>
                                                                        <option value="no">No</option>
                                                                    </select>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('Testion'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('Testion') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}
                                                            </tr>

                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light portlet-fit portlet-datatable bordered col-md-12 col-lg-3">
                                        <div class="portlet-title">


                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-container" style="">

                                                <div id="datatable_ajax_wrapper"
                                                     class="dataTables_wrapper dataTables_extended_wrapper no-footer">
                                                    <div class="table-responsive">

                                                        <h3>
                                                            ထပ္ေဆာင္းလုပ္ေဆာင္လွ်င္ ကုန္က်ေငြ
                                                        </h3>
                                                        <table class="table table-bordered no-footer">

                                                            <thead>
                                                            <tr role="row" class="heading"
                                                                style="background-color: #345884;text-align: center !important;color: white;">

                                                                <th width="10%" style="font-size: 22px;"
                                                                    class="sorting_disabled" rowspan="1" colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>
                                                                <th width="10%" class="sorting_disabled" rowspan="1"
                                                                    colspan="1">

                                                                </th>

                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td width="10%" rowspan="1"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    ခ်ီးခ်ြတ္ျခင္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_clear" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_clear'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_clear') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Selar
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Selar" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Selar'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Selar') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>

                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Putty
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">

                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Putty" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Putty'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Putty') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Color
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Color" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Color'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Color') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>
                                                            <tr role="row" class="filter">

                                                                <td rowspan="1" width="10%"
                                                                    style="font-size: 16px;text-align:center;" colspan="1">
                                                                    Testion
                                                                </td>
                                                                <td width="10%" rowspan="1" colspan="1">

                                                                    1 က်င္းေစ်းႏူန္း
                                                                </td>
                                                                <td rowspan="1" width="10%" colspan="1">
                                                                    <input type="number"
                                                                           class="form-control form-filter input-sm"
                                                                           name="cost_ex_Testion" placeholder="" required/>
                                                                    @if(\Illuminate\Support\Facades\Input::old('pctype')== 'high')
                                                                        @if ($errors->has('cost_ex_Testion'))
                                                                            <span class="help-block">
                                                              <strong style="font-size:11px;color:red;">{{ $errors->first('cost_ex_Testion') }}</strong>
                                                                </span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                {{--<td rowspan="1" colspan="1">--}}
                                                                {{--<div class="margin-bottom-5">--}}
                                                                {{--<input type="text"--}}
                                                                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                                                                {{--name="order_quantity_from" placeholder="From"></div>--}}
                                                                {{--<input type="text" class="form-control form-filter input-sm"--}}
                                                                {{--name="order_quantity_to" placeholder="To"></td>--}}


                                                            </tr>

                                                            </thead>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="col-lg-4 btn btn-ms btn-success" value="Save"
                                           style="float:right;"/>


                                </form>
                            </div>
                        @endif
                    </div>

                {{--<form>--}}
                {{--<div class="col-md-3">--}}
                {{--dddd--}}
                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                {{--<div class="form-group form-md-radios">--}}
                {{--<label>Checkboxes</label>--}}
                {{--<div class="md-radio-inline">--}}
                {{--<div class="md-radio">--}}
                {{--<input type="radio" id="radio14" name="radio2" class="md-radiobtn">--}}
                {{--<label for="radio14">--}}
                {{--<span class="inc"></span>--}}
                {{--<span class="check"></span>--}}
                {{--<span class="box"></span> Option 1 </label>--}}
                {{--</div>--}}
                {{--<div class="md-radio has-error">--}}
                {{--<input type="radio" id="radio15" name="radio2" class="md-radiobtn" checked="">--}}
                {{--<label for="radio15">--}}
                {{--<span class="inc"></span>--}}
                {{--<span class="check"></span>--}}
                {{--<span class="box"></span> Option 2 </label>--}}
                {{--</div>--}}
                {{--<div class="md-radio has-warning">--}}
                {{--<input type="radio" id="radio16" name="radio2" class="md-radiobtn">--}}
                {{--<label for="radio16">--}}
                {{--<span class="inc"></span>--}}
                {{--<span class="check"></span>--}}
                {{--<span class="box"></span> Option 3 </label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

                {{--<div class="portlet light portlet-fit portlet-datatable bordered col-md-6">--}}
                {{--<div class="portlet-title">--}}
                {{--</div>--}}
                {{--<div class="portlet-body">--}}
                {{--<div class="table-container" style="">--}}

                {{--<div id="datatable_ajax_wrapper"--}}
                {{--class="dataTables_wrapper dataTables_extended_wrapper no-footer">--}}
                {{--<div class="table-responsive">--}}


                {{--<table class="table table-bordered no-footer">--}}

                {{--<thead>--}}
                {{--<tr role="row" class="heading">--}}

                {{--<th width="10%" class="sorting_disabled" rowspan="1" colspan="1">--}}
                {{--ခ်ီးခ်ြတ္ျခင္း--}}

                {{--</th>--}}
                {{--<th width="10%" class="sorting_disabled" rowspan="1" colspan="1">--}}
                {{--selar--}}

                {{--</th>--}}
                {{--<th width="10%" class="sorting_disabled" rowspan="1" colspan="1">--}}
                {{--putty--}}

                {{--</th>--}}
                {{--<th width="10%" class="sorting_disabled" rowspan="1" colspan="1">--}}
                {{--Color--}}

                {{--</th>--}}
                {{--<th width="10%" class="sorting_disabled" rowspan="1" colspan="1">--}}
                {{--Testion--}}

                {{--</th>--}}
                {{--</tr>--}}
                {{--<tr role="row" class="filter">--}}

                {{--<td rowspan="1" colspan="1">--}}
                {{--<input type="text" class="form-control form-filter input-sm"--}}
                {{--name="order_ship_to"></td>--}}
                {{--<td rowspan="1" colspan="1">--}}
                {{--<div class="margin-bottom-5">--}}
                {{--<input type="text" class="form-control form-filter input-sm"--}}
                {{--name="order_price_from" placeholder="From"></div>--}}
                {{--<input type="text" class="form-control form-filter input-sm"--}}
                {{--name="order_price_to" placeholder="To"></td>--}}
                {{--<td rowspan="1" colspan="1">--}}
                {{--<div class="margin-bottom-5">--}}
                {{--<input type="text"--}}
                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                {{--name="order_quantity_from" placeholder="From"></div>--}}
                {{--<input type="text" class="form-control form-filter input-sm"--}}
                {{--name="order_quantity_to" placeholder="To"></td>--}}
                {{--<td rowspan="1" colspan="1">--}}
                {{--<div class="margin-bottom-5">--}}
                {{--<input type="text"--}}
                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                {{--name="order_quantity_from" placeholder="From"></div>--}}
                {{--<input type="text" class="form-control form-filter input-sm"--}}
                {{--name="order_quantity_to" placeholder="To"></td>--}}
                {{--<td rowspan="1" colspan="1">--}}
                {{--<div class="margin-bottom-5">--}}
                {{--<input type="text"--}}
                {{--class="form-control form-filter input-sm margin-bottom-5 clearfix"--}}
                {{--name="order_quantity_from" placeholder="From"></div>--}}
                {{--<input type="text" class="form-control form-filter input-sm"--}}
                {{--name="order_quantity_to" placeholder="To"></td>--}}


                {{--</tr>--}}
                {{--</thead>--}}

                {{--</table>--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}
                <!-- End: Demo Datatable 1 -->
                    <!-- Begin: Demo Datatable 2 -->
                    <!-- End: Demo Datatable 2 -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>
    <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
        <div class="page-quick-sidebar">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                        <span class="badge badge-danger">2</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                        <span class="badge badge-success">7</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-bell"></i> Alerts </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-info"></i> Notifications </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-speech"></i> Activities </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                <i class="icon-settings"></i> Settings </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                    <div class="page-quick-sidebar-list"
                         style="position: relative; overflow: hidden; width: auto; height: 878px;">
                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd"
                             data-wrapper-class="page-quick-sidebar-list" data-height="878" data-initialized="1"
                             style="overflow: hidden; width: auto; height: 878px;">
                            <h3 class="list-heading">Staff</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">8</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Bob Nilson</h4>
                                        <div class="media-heading-sub"> Project Manager</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Nick Larson</h4>
                                        <div class="media-heading-sub"> Art Director</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">3</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Hubert</h4>
                                        <div class="media-heading-sub"> CTO</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ella Wong</h4>
                                        <div class="media-heading-sub"> CEO</div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="list-heading">Customers</h3>
                            <ul class="media-list list-items">
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-warning">2</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lara Kunis</h4>
                                        <div class="media-heading-sub"> CEO, Loop Inc</div>
                                        <div class="media-heading-small"> Last seen 03:10 AM</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="label label-sm label-success">new</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Ernie Kyllonen</h4>
                                        <div class="media-heading-sub"> Project Manager,
                                            <br> SmartBizz PTL
                                        </div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Lisa Stone</h4>
                                        <div class="media-heading-sub"> CTO, Keort Inc</div>
                                        <div class="media-heading-small"> Last seen 13:10 PM</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-success">7</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Deon Portalatin</h4>
                                        <div class="media-heading-sub"> CFO, H&amp;D LTD</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Irina Savikova</h4>
                                        <div class="media-heading-sub"> CEO, Tizda Motors Inc</div>
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-status">
                                        <span class="badge badge-danger">4</span>
                                    </div>
                                    <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                                    <div class="media-body">
                                        <h4 class="media-heading">Maria Gomez</h4>
                                        <div class="media-heading-sub"> Manager, Infomatic Inc</div>
                                        <div class="media-heading-small"> Last seen 03:10 AM</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="slimScrollBar"
                             style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 878px;"></div>
                        <div class="slimScrollRail"
                             style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(221, 221, 221); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                    <div class="page-quick-sidebar-item">
                        <div class="page-quick-sidebar-chat-user">
                            <div class="page-quick-sidebar-nav">
                                <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                    <i class="icon-arrow-left"></i>Back</a>
                            </div>
                            <div class="slimScrollDiv"
                                 style="position: relative; overflow: hidden; width: auto; height: 773px;">
                                <div class="page-quick-sidebar-chat-user-messages" data-height="773"
                                     data-initialized="1" style="overflow: hidden; width: auto; height: 773px;">
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> When could you send me the report ? </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Its almost done. I will be sending it shortly </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:15</span>
                                            <span class="body"> Alright. Thanks! :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:16</span>
                                            <span class="body"> You are most welcome. Sorry for the delay. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> No probs. Just take your time :) </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Alright. I just emailed it to you. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Great! Thanks. Will check it right away. </span>
                                        </div>
                                    </div>
                                    <div class="post in">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Ella Wong</a>
                                            <span class="datetime">20:40</span>
                                            <span class="body"> Please let me know if you have any comment. </span>
                                        </div>
                                    </div>
                                    <div class="post out">
                                        <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg">
                                        <div class="message">
                                            <span class="arrow"></span>
                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                            <span class="datetime">20:17</span>
                                            <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="slimScrollBar"
                                     style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 773px;"></div>
                                <div class="slimScrollRail"
                                     style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                            </div>
                            <div class="page-quick-sidebar-chat-user-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type a message here...">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn green">
                                            <i class="icon-paper-clip"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                    <div class="slimScrollDiv"
                         style="position: relative; overflow: hidden; width: auto; height: 873px;">
                        <div class="page-quick-sidebar-alerts-list" data-height="873" data-initialized="1"
                             style="overflow: hidden; width: auto; height: 873px;">
                            <h3 class="list-heading">General</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-danger">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-warning"> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="list-heading">System</h3>
                            <ul class="feeds list-items">
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                                <i class="fa fa-share"></i>
                                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> Just now</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Finance Report for year 2013 has been released.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-default">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> New order received with
                                                    <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 30 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-success">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> You have 5 pending membership that requires a quick
                                                    review.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 24 mins</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-warning">
                                                    <i class="fa fa-bell-o"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"> Web server hardware needs to be upgraded.
                                                    <span class="label label-sm label-default "> Overdue </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date"> 2 hours</div>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-briefcase"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> IPO Report for year 2013 has been released.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 20 mins</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="slimScrollBar"
                             style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                        <div class="slimScrollRail"
                             style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
                <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                    <div class="slimScrollDiv"
                         style="position: relative; overflow: hidden; width: auto; height: 873px;">
                        <div class="page-quick-sidebar-settings-list" data-height="873" data-initialized="1"
                             style="overflow: hidden; width: auto; height: 873px;">
                            <h3 class="list-heading">General Settings</h3>
                            <ul class="list-items borderless">
                                <li> Enable Notifications
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small">
                                        <div class="bootstrap-switch-container"><span
                                                    class="bootstrap-switch-handle-on bootstrap-switch-success">ON</span><span
                                                    class="bootstrap-switch-label">&nbsp;</span><span
                                                    class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                    type="checkbox" class="make-switch" checked="" data-size="small"
                                                    data-on-color="success" data-on-text="ON" data-off-color="default"
                                                    data-off-text="OFF"></div>
                                    </div>
                                </li>
                                <li> Allow Tracking
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-small">
                                        <div class="bootstrap-switch-container"><span
                                                    class="bootstrap-switch-handle-on bootstrap-switch-info">ON</span><span
                                                    class="bootstrap-switch-label">&nbsp;</span><span
                                                    class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                    type="checkbox" class="make-switch" data-size="small"
                                                    data-on-color="info" data-on-text="ON" data-off-color="default"
                                                    data-off-text="OFF"></div>
                                    </div>
                                </li>
                                <li> Log Errors
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small">
                                        <div class="bootstrap-switch-container"><span
                                                    class="bootstrap-switch-handle-on bootstrap-switch-danger">ON</span><span
                                                    class="bootstrap-switch-label">&nbsp;</span><span
                                                    class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                    type="checkbox" class="make-switch" checked="" data-size="small"
                                                    data-on-color="danger" data-on-text="ON" data-off-color="default"
                                                    data-off-text="OFF"></div>
                                    </div>
                                </li>
                                <li> Auto Sumbit Issues
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-off bootstrap-switch-small">
                                        <div class="bootstrap-switch-container"><span
                                                    class="bootstrap-switch-handle-on bootstrap-switch-warning">ON</span><span
                                                    class="bootstrap-switch-label">&nbsp;</span><span
                                                    class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                    type="checkbox" class="make-switch" data-size="small"
                                                    data-on-color="warning" data-on-text="ON" data-off-color="default"
                                                    data-off-text="OFF"></div>
                                    </div>
                                </li>
                                <li> Enable SMS Alerts
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small">
                                        <div class="bootstrap-switch-container"><span
                                                    class="bootstrap-switch-handle-on bootstrap-switch-success">ON</span><span
                                                    class="bootstrap-switch-label">&nbsp;</span><span
                                                    class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                    type="checkbox" class="make-switch" checked="" data-size="small"
                                                    data-on-color="success" data-on-text="ON" data-off-color="default"
                                                    data-off-text="OFF"></div>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="list-heading">System Settings</h3>
                            <ul class="list-items borderless">
                                <li> Security Level
                                    <select class="form-control input-inline input-sm input-small">
                                        <option value="1">Normal</option>
                                        <option value="2" selected="">Medium</option>
                                        <option value="e">High</option>
                                    </select>
                                </li>
                                <li> Failed Email Attempts
                                    <input class="form-control input-inline input-sm input-small" value="5"></li>
                                <li> Secondary SMTP Port
                                    <input class="form-control input-inline input-sm input-small" value="3560"></li>
                                <li> Notify On System Error
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small">
                                        <div class="bootstrap-switch-container"><span
                                                    class="bootstrap-switch-handle-on bootstrap-switch-danger">ON</span><span
                                                    class="bootstrap-switch-label">&nbsp;</span><span
                                                    class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                    type="checkbox" class="make-switch" checked="" data-size="small"
                                                    data-on-color="danger" data-on-text="ON" data-off-color="default"
                                                    data-off-text="OFF"></div>
                                    </div>
                                </li>
                                <li> Notify On SMTP Error
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-on bootstrap-switch-small">
                                        <div class="bootstrap-switch-container"><span
                                                    class="bootstrap-switch-handle-on bootstrap-switch-warning">ON</span><span
                                                    class="bootstrap-switch-label">&nbsp;</span><span
                                                    class="bootstrap-switch-handle-off bootstrap-switch-default">OFF</span><input
                                                    type="checkbox" class="make-switch" checked="" data-size="small"
                                                    data-on-color="warning" data-on-text="ON" data-off-color="default"
                                                    data-off-text="OFF"></div>
                                    </div>
                                </li>
                            </ul>
                            <div class="inner-content">
                                <button class="btn btn-success">
                                    <i class="icon-settings"></i> Save Changes
                                </button>
                            </div>
                        </div>
                        <div class="slimScrollBar"
                             style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                        <div class="slimScrollRail"
                             style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<script>
    window.onload(setv({{$for_show}}));

</script>
<!-- BEGIN FOOTER -->

<!-- END FOOTER -->

@endsection