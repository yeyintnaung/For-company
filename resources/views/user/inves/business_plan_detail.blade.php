@extends('layouts.inves_layouts.dashboard')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">

            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark">Plan Detail</i>
                            </div>
                            <div class="actions" style="margin-top:2px;">
                                <div class="" style="float:right" ng-app="get" ng-controller="getController"
                                        ng-init="int('{{Auth::user()->id}}','{{$data->visitor_id}}','{{$data->like_count}}','bb','0')">
                                    <div style="float:left;margin-right:13px;color:#838588;"
                                            ng-click="getlike('{{$data->id}}',colr)">

                          <span class="badge badge-danger"
                                  style="position:absolute;margin-bottom:2px;"> @{{ thumbup }} </span><br>
                                        <i class="fa fa-thumbs-up" ng-class="colr" style="font-size:32px;color:#c6c6d2;"></i>

                                    </div>

                                </div>

                            </div>
                        </div>
                        @include('user.entra.alert.balert')
                        @if(\Illuminate\Support\Facades\Session::has('email'))
                            <div class="note note-success">
                                <h4 class="block">Successful</h4>

                                <p>Your email was successfully {{\Illuminate\Support\Facades\Session::get('email')}}

                                </p>
                            </div>
                        @endif

                        <div class="row">
                            <div class="portlet-body col-md-6">
                                <div class="portlet box blue-hoki">

                                    <div class="portlet-title">
                                        <div class="caption">

                                            <img src="{{asset('users/entro/photo/'.$com->logo)}}"
                                                    style="width: 59px;border-radius: 56% !important;height: 47px;border: 1px solid #f7eefd;"/>
                                            <i class=""></i>
                                        </div>

                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" style="height:400px" data-rail-visible="1"
                                                data-rail-color="yellow" data-handle-color="#a1b2bd">
                                            <strong style="float:right;"><a href="{{url('inves/send_mail_for_bplan/'.$data->id)}}" style="margin-left:12px;" class="btn btn-small green">
                                                    Send
                                                    Mail&nbsp;&nbsp;&nbsp;<i class="fa fa-paper-plane"></i></a></strong>
                                            <br/> <br/>
                                            <ul>
                                                <li>
                                                    <strong
                                                            style="font-weight:bolder">Title :</strong> {{$data->title}}
                                                    <br> <br></li>
                                                <li><strong
                                                            style="font-weight:bolder">Company
                                                        name:</strong>{{$com->name}}
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('inves/see_company/'.$com->id)}}" style="margin-left:12px;" class="btn btn-small green">View
                                                        Company Profile<i class="fa fa-search"></i></a><br><br></li>
                                                <li>
                                                    <strong
                                                            style="font-weight:bolder">From Country:</strong>
                                                    @php
                                                        $cn=\Illuminate\Support\Facades\DB::table('countries')->where('id',$data->country_id)->first();
                                                    @endphp
                                                    {{$cn->name}}
                                                    <br><br>
                                                </li>
                                                <li><strong
                                                            style="font-weight:bolder">Stage Of Product:</strong> @php
                                                        switch ($data->stage_of_product) {
                                                        case 'start_up':
                                                        $sop='Sart Up';
                                                        break;
                                                        case 'ready_for_launch':
                                                        $sop='Ready For Launch';
                                                        break;
                                                        case 'market':
                                                        $sop='Market';
                                                        break;
                                                        case 'profitable':
                                                        $sop='Profitable';
                                                        break;
                                                        case 'other':
                                                        $sop='other';
                                                        }
                                                    @endphp
                                                    {{$sop}}
                                                    <br><br>
                                                </li>
                                                <li>
                                                    <strong
                                                            style="font-weight:bolder">Product Detail:</strong>
                                                    {!!$data->description  !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body col-md-6">
                                <div class="portlet box blue-hoki">

                                    <div class="portlet-title">
                                        <div class="caption">

                                            Market Analysis
                                        </div>

                                        <div class="actions" style="margin-top:2px;">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" style="height:400px" data-rail-visible="1"
                                                data-rail-color="yellow" data-handle-color="#a1b2bd">
                                            <strong style="float:right;"></strong> <br/> <br/>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">Target Customer </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->target_customer}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">The Market Value of your
                                                        Product/Service </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->market_value}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder"> competitors' positioning and
                                                        describe their strengths and weaknesses.

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->competitor_des}}
                                                    <br> <br>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="portlet-body col-md-6">
                                <div class="portlet box blue-hoki">

                                    <div class="portlet-title">
                                        <div class="caption">

                                            Your Management Team

                                        </div>

                                        <div class="actions" style="margin-top:2px;">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" style="height:400px" data-rail-visible="1"
                                                data-rail-color="yellow" data-handle-color="#a1b2bd">
                                            <strong style="float:right;"></strong> <br/> <br/>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">My position in your company?

                                                        :</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->user_position}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">Founder of Our company?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->founders}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder"> The background information of
                                                        founder?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->background_founders}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">Number of employees are currently
                                                        working for your company

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->count_employees}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder"> The background of our employees?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->background_employees}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder"> Management Located?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8"><strong style="font-weight:bolder;">:</strong>
                                                    @php
                                                        $selected_country=DB::table('countries')->where('id',$data->country_id)->first();
                                                    @endphp
                                                    {{$selected_country->name}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body col-md-6">
                                <div class="portlet box blue-hoki">

                                    <div class="portlet-title">
                                        <div class="caption">

                                            Financial Information

                                        </div>

                                        <div class="actions" style="margin-top:2px;">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" style="height:400px" data-rail-visible="1"
                                                data-rail-color="yellow" data-handle-color="#a1b2bd">
                                            <strong style="float:right;"></strong> <br/> <br/>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">Amount of Investment we are
                                                        looking for?

                                                        :</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->looking_investment}}
                                                    $ <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">Share we want to offer?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->sharer}}$
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder"> company's monthly revenues?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->monthly_revenues}}
                                                    $ <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder">company's monthly
                                                        expenses? </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->monthly_expenses}}
                                                    $ <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder"> The background of our employees?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <strong style="font-weight:bolder;">:</strong> {{$data->background_employees}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong
                                                            style="font-weight:bolder"> Management Located?

                                                    </strong>
                                                </div>
                                                <div class="col-md-8"><strong style="font-weight:bolder;">:</strong>
                                                    @php
                                                        $selected_country=DB::table('countries')->where('id',$data->country_id)->first();
                                                    @endphp
                                                    {{$selected_country->name}}
                                                    <br> <br>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @if(!empty($data->video_url))
                            <div class="row">
                                <div class="portlet-body col-md-6">
                                    <div class="portlet box blue-hoki">

                                        <div class="portlet-title">
                                            <div class="caption">

                                                Video

                                            </div>

                                            <div class="actions" style="margin-top:2px;">

                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="scroller" style="height:400px" data-rail-visible="1"
                                                    data-rail-color="yellow" data-handle-color="#a1b2bd">
                                                <strong style="float:right;"></strong> <br/> <br/>

                                                <div class="col-md-4">
                                                    <video width="400" controls>
                                                        <source src="{{asset('users/entro/video/'.$data->video_url)}}"
                                                                type="video/mp4">
                                                    </video>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    <!-- END VALIDATION STATES-->
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
        </div>
        <!-- BEGIN QUICK NAV -->
        @endsection
        @section('angul')

            <script src="{{asset('js/angular.js')}}"></script>

            <script>
                function go(link) {
                    window.location.assign(link);
                }
                ;
            </script>
            <script>

                var get = angular.module('get', []);
                get.controller('getController', function ($scope, $http) {
                    $scope.int = function (id, vid, thumbup, colr, thumbdown) {
                        $scope.id = id;
                        $scope.vid = vid;
                        console.log($scope.vid);
                        $scope.thumbup = thumbup;
                        $scope.thumbdown = thumbdown;


                        var ja = JSON.parse("[" + $scope.vid + "]");
                        console.log(ja);
                        $scope.tf = ja.some(function (o) {
                            return $scope.id == o;
                            console.log(tf);

                        });
                        console.log($scope.tf);
                        if ($scope.tf === true) {
                            $scope.colr = 'blue';
                            console.log($scope.colr);
                        } else {
                            $scope.colr = 'rr';
                            console.log($scope.colr, $scope.tf);
                        }


                    };

                    $scope.getlike = function (ids) {

                        if ($scope.colr == 'blue') {
                            $http.get('http://localhost/Company/public/delike/' + ids).then(function (data) {
                                $scope.thumbup = data.data.Success;
                                $scope.colr = '';
                            });
                        } else {
                            $http.get('http://localhost/Company/public/getlike/' + ids).then(function (data) {
                                $scope.thumbup = data.data.Success;
                                $scope.colr = 'blue';
                            });
                        }

                    }

                });

            </script>
@endsection
