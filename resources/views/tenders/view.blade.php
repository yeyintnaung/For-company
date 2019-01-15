@extends('layout.master')
@section('title','Tender')
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
    <a href="{{url('news')}}" style="text-decoration:none;"><h4><i class="fa fa-newspaper-o" aria-hidden="true"></i>
            Browse Article </h4></a>

    <div class="container">

        <hr>
        <div class="row row-margin-bottom">
            <div class="col-md-1">

            </div>
            <div class="col-md-8 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="{{asset('upload/tenders/'.$tenders->photo)}}">
                        </div>
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                {{$tenders->title}}
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-desc">
                                {!! $tenders->description !!}
                            </div>
                            <div class="lib-row lib-desc">
                                Defined Point {!! $tenders->td_point !!}
                            </div>
                            <div class="lib-row lib-desc">
                            
                               @php
                                $data=\Illuminate\Support\Facades\DB::table('business_group')->where('id',$tenders->business_hub_id)->first();
                                @endphp
                                {{$data->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
