@extends('layout.master')
@section('title','Event')
@section('content')
    <head>
        <style media="screen">

            .lib-panel {
                margin-bottom: 20Px;
            }

            .lib-panel img {
                width: 100%;
                background-color: transparent;
            }

            .lib-panel .row,
            .lib-panel .col-md-6 {
                padding: 0;
                background-color: #FFFFFF;
            }

            .lib-panel .lib-row {
                padding: 0 20px 0 20px;
            }

            .lib-panel .lib-row.lib-header {
                background-color: #FFFFFF;
                font-size: 20px;
                padding: 10px 20px 0 20px;
            }

            .lib-panel .lib-row.lib-header .lib-header-seperator {
                height: 2px;
                width: 26px;
                background-color: #d9d9d9;
                margin: 7px 0 7px 0;
            }

            .lib-panel .lib-row.lib-desc {
                position: relative;
                height: 100%;
                display: block;
                font-size: 13px;
            }

            .lib-panel .lib-row.lib-desc a {
                position: absolute;
                width: 100%;
                bottom: 10px;
                left: 20px;
            }

            .row-margin-bottom {
                margin-bottom: 20px;
            }

            .box-shadow {
                -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, .10);
                box-shadow: 0 0 10px 0 rgba(0, 0, 0, .10);
            }

            .no-padding {
                padding: 0;
            }

        </style>
    </head>

    <div class="">

        @if(session('update'))
            <span class="form-control alert-success">
                <strong>{{ session('update') }}</strong>
            </span>
        @endif

        @if ($errors->has('description'))
            <span class="form-control alert-danger">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif

        @if ($errors->has('address'))
            <span class="form-control alert-danger">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif

        <hr>

        <div class="row row-margin-bottom">
            <div class="col-md-1">
            </div>
            <div class="col-md-8 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-10 offset-col-1">
                            <div class="lib-row lib-header">
                                <?php
                                    $service_data = \Illuminate\Support\Facades\DB::connection('mysql_service')
                                        ->table('for_repair')->where('id', $data->post_id)->first();
                                ?>
                                <strong>Name : </strong>
                                {{$service_data->name}}

                                <div class="lib-header-seperator"></div>
                                <strong>Phone : </strong>
                                {{$service_data->phone}}

                                <div class="lib-header-seperator"></div>
                                <strong>Type : </strong>
                                    <?php
                                    switch ($service_data->fr_type){

                                        case 'fr1':
                                            $dd='ေရလုိင္း';
                                            break;
                                        case 'fr2':
                                            $dd='မီးလိုင္း';
                                            break;

                                        case 'fr3':
                                            $dd='လၽွပ္စစ္သြယ္တန္းျခင္း';
                                            break;

                                        case 'fr4':
                                            $dd='Air-con တပ္ဆင္ျခင္း';
                                            break;

                                        case 'fr5':
                                            $dd='အလူမီနီယံလုပ္ငန္း';
                                            break;

                                        case 'fr6':
                                            $dd='ေဆးသုတ္မည္';
                                            break;

                                        case 'fr7':
                                            $dd='ၾကမ္းခင္း၊ ပါေကးခင္းမည္';
                                            break;

                                        case 'fr8':
                                            $dd='CCTV ႏွင့္ လံုျခံဳေရးပစၥည္းမ်ား တပ္ဆင္မည္';
                                            break;

                                        case 'fr9':
                                            $dd='အေဆာက္အဦး ေဆာက္လုပ္မည္';
                                    }
                                    switch ($service_data->fr_type){

                                        case 'fn1':
                                            $dd='အိမ္ခန္းအတြင္း အလွဆင္မည္';
                                            break;
                                        case 'fn2':
                                            $dd='ဆိုင္ခန္းအတြင္း အလွဆင္မည္';
                                            break;

                                        case 'fn3':
                                            $dd='လၽွပ္စစ္သြယ္တန္းျခင္း';
                                            break;

                                        case 'fn4':
                                            $dd='အေဆာက္အဦးအတြင္း အလွဆင္မည္';
                                            break;

                                        case 'fn5':
                                            $dd='Shopping Mall အတြင္း အလွဆင္မည္';
                                            break;
                                    }
                                    switch ($service_data->fr_type)
                                    {
                                        case 'rb1':
                                        $dd='အေဆာက္အဦးအား ျပန္လည္တည္ေဆာက္မည္';
                                        break;
                                    }
                                    ?>

                                    {{$dd}}

                                    <div class="lib-header-seperator"></div>
                                    <strong>Description : </strong>
                                    {{$service_data->description}}

                                    <div class="lib-header-seperator"></div>
                                    <strong>Quotation : </strong>
                                    {{$service_data->quotation}}


                                    <div class="lib-header-seperator"></div>
                                    <strong>Project Define Type : </strong>
                                    {{$service_data->project_define_point}}

                                    <div class="lib-header-seperator"></div>
                                    <strong>Address : </strong>
                                    {{$service_data->address}}

                                    <div class="lib-header-seperator"></div>
                                    <strong>City : </strong>
                                    <?php
                                        $city=\Illuminate\Support\Facades\DB::table('cities')->where('id',$service_data->city)->first();
                                        ?>
                                    {{$city->myan_name}}
                                    <div class="lib-header-seperator"></div>

                                    <strong>State : </strong>
                                    <?php
                                    $state=\Illuminate\Support\Facades\DB::table('states')->where('id',$service_data->state)->first();
                                    ?>
                                    {{$state->mm_name}}
                                    <div class="lib-header-seperator"></div>

                                    <strong>Created Date : </strong>
                                    {{$service_data->created_at}}
                                    <div class="lib-header-seperator"></div>
                                    <?php

                                    $check_conf=\Illuminate\Support\Facades\DB::table('relation_user_post_and_op')->where('post_id',$service_data->id)->first();

                                    ?>
                                    @if($check_conf->process == 'pending')
                                    <a href="#" class="btn btn-success" onclick="goto({{$service_data->id}});">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Confirm
                                    </a>
                                    @endif

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_modal">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div id="edit_modal" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-md">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"> Edit Services </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('service/detail/'.$data->post_id.'/edit') }}" method="post">
                                                        <input type="hidden" value="{{ $service_data->description }}">
                                                        <input type="hidden" value="{{ $service_data->address }}">

                                                        <div class="form-group">
                                                            <label for="description"> Description </label>
                                                            <textarea class="form-control" name="description"
                                                                      id="description" rows="5">{{ $service_data->description }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address"> Address </label>
                                                            <textarea name="address" id="address" rows="3"
                                                                      class="form-control">{{ $service_data->address }}</textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="define_point"> Project Define Point </label>
                                                            <input type="text" name="define_point" class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-success pull-right">Save Changes</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <script>
                                    function goto(id){
                                        if(window.confirm('Are u sure want to confirm?')==true)
                                        {
                                            window.location.assign('confirm/'+id);
                                        }

                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
