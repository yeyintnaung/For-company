@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="#" class="list-name"> Plans</a> <i class="fa fa-circle"></i>
                    </li>

                </ul>
            </div>

            <h1 class="page-title page_title">
                Plans
            </h1>
            <div class="portlet light portlet-fit ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-microphone font-dark hide"></i>
                        <span class="caption-subject bold font-dark uppercase"> Plans</span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="caption-helper">If you want to know more about plans please contact us :Ph no... 09456114442</span>
                    </div>

                </div>
                @if(Session::has('had_plan'))
                    <div class="note note-danger">
                        <h4 class="block">{{\Illuminate\Support\Facades\Session::get('had_plan')}}</h4>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="note note-info">
                        <h4 class="block">{{\Illuminate\Support\Facades\Session::get('success')}}</h4>
                    </div>
                @endif
                <div class="portlet-body">
                    <div class="row">
                        @if(Auth::user()->type == 1)
                            @if($p=='A' and Auth::user()->type == 1)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-blue-hoki">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book"></i> A
                                            </div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-search"></i> View Project limit : 20
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-paper-plane"></i> Create Project limit : 10
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit : 3
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6" ng-app="myApp" ng-controller="myCtrl">
                                    <span style="font-weight:bolder;font-size:23px;color:#666670;">Are you sure want to buy this plan?</span>
                                    <br>
                                    <form method="post" action="{{url('entra/buy_plan')}}" style="float:left;">

                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-md-12">Select Duration Package
                                                <span class="required"> * </span> </label>
                                            <div class="col-md-12">
                                                <select class="form-control" convertToNumber name="duration" ng-model="du" ng-dropdown required ng-change="calculate()" ng-options="option.value as option.type for option in options"> </select>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$p}}" name="p"/>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>
                                        <div class="row"><span style="font-weight:bolder;color:#018591;">Amount</span> @{{ amount }}  kyats</div>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>
                                        <button type="submit" class="btn btn-lg btn-success ">Submit
                                        </button>
                                        <a href="{{url('entra/show_plans')}}" class="btn btn-lg btn-danger ">Cancel </a>
                                    </form>
                                    <script src="{{asset('js/angular.js')}}"></script>
                                    <script>

                                        var app = angular.module('myApp', []);


                                        app.controller('myCtrl', function ($scope) {
                                            $scope.options = [
                                                {value: 1, type: '1 Month'},
                                                {value: 3, type: '3 Months (8% off)'},
                                                {value: 6, type: '6 Months (10% off)'},
                                                {value: 12, type: '12 Months (12% off)'}
                                            ];

                                            $scope.du = $scope.options[0].value;
                                            $scope.amount = 80000;
                                            $scope.calculate = function () {
                                                if ($scope.du == 1) {
                                                    $scope.amount = 50000;

                                                }
                                                if ($scope.du == 3) {
                                                    $scope.amount = 138000;

                                                }
                                                if ($scope.du == 6) {
                                                    $scope.amount = 270000;
                                                }
                                                if ($scope.du == 12) {
                                                    $scope.amount = 528000;
                                                }
                                            };

                                        });
                                    </script>


                                </div>

                            @endif
                            @if($p=='B' and Auth::user()->type==1)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-green">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book"></i> B
                                            </div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-search"></i> View Project limit : 20
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-paper-plane"></i> Create Project limit : 40
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit : 5
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6" ng-app="myApp" ng-controller="myCtrl">
                                    <span style="font-weight:bolder;font-size:23px;color:#666670;">Are you sure want to buy this plan?</span>
                                    <br>
                                    <form method="post" action="{{url('entra/buy_plan')}}" style="float:left;">

                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-md-12">Select Duration Package
                                                <span class="required"> * </span> </label>

                                            <div class="col-md-12">

                                                <select class="form-control" convertToNumber name="duration" ng-model="du" ng-dropdown required ng-change="calculate()" ng-options="option.value as option.type for option in options"> </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="p" value="B"/>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>
                                        <div class="row"><span style="font-weight:bolder;color:#018591;">Amount</span> @{{ amount }}  kyats</div>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>


                                        <button type="submit" class="btn btn-lg btn-success ">Submit
                                        </button>
                                        <a href="{{url('entra/show_plans')}}" class="btn btn-lg btn-danger ">Cancel </a>
                                        <script src="{{asset('js/angular.js')}}"></script>
                                        <script>

                                            var app = angular.module('myApp', []);


                                            app.controller('myCtrl', function ($scope) {
                                                $scope.options = [
                                                    {value: 1, type: '1 Month'},
                                                    {value: 3, type: '3 Months (8% off)'},
                                                    {value: 6, type: '6 Months (10% off)'},
                                                    {value: 12, type: '12 Months (12% off)'}
                                                ];

                                                $scope.du = $scope.options[0].value;
                                                $scope.amount = 80000;
                                                $scope.calculate = function () {
                                                    if ($scope.du == 1) {
                                                        $scope.amount = 80000;

                                                    }
                                                    if ($scope.du == 3) {
                                                        $scope.amount = 220800;

                                                    }
                                                    if ($scope.du == 6) {
                                                        $scope.amount = 432000;
                                                    }
                                                    if ($scope.du == 12) {
                                                        $scope.amount = 844800;
                                                    }
                                                };

                                            });
                                        </script>

                                    </form>
                                </div>
                            @endif
                            @if($p=='C' and Auth::user()->type == 1)

                                <div class="col-sm-6 col-lg-4">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-yellow-gold">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book"></i> C
                                            </div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-search"></i> View Project limit : unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-paper-plane"></i> Create Project limit : unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit :
                                                unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6" ng-app="myApp" ng-controller="myCtrl">
                                    <span style="font-weight:bolder;font-size:23px;color:#666670;">Are you sure want to buy this plan?</span>
                                    <br>
                                    <form method="post" action="{{url('entra/buy_plan')}}" style="float:left;">

                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label class="control-label col-md-12">Select Duration Package
                                                <span class="required"> * </span>
                                            </label>

                                            <div class="col-md-12">

                                                <select class="form-control" convertToNumber name="duration" ng-model="du" ng-dropdown required ng-change="calculate()" ng-options="option.value as option.type for option in options"> </select>
                                            </div>
                                        </div>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>

                                        <div class="row"><span style="font-weight:bolder;color:#018591;">Amount</span> @{{ amount }}  kyats</div>

                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>
                                        <input type="hidden" name="p" value="C"/>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>

                                        <button type="submit" class="btn btn-lg btn-success ">Submit
                                        </button>
                                        <a href="{{url('entra/show_plans')}}" class="btn btn-lg btn-danger ">Cancel </a>
                                        <script src="{{asset('js/angular.js')}}"></script>

                                        <script>

                                            var app = angular.module('myApp', []);


                                            app.controller('myCtrl', function ($scope) {
                                                $scope.options = [
                                                    {value: 1, type: '1 Month'},
                                                    {value: 3, type: '3 Months (8% off)'},
                                                    {value: 6, type: '6 Months (10% off)'},
                                                    {value: 12, type: '12 Months (12% off)'}
                                                ];

                                                $scope.du = $scope.options[0].value;
                                                $scope.amount = 100000;
                                                $scope.calculate = function () {
                                                    if ($scope.du == 1) {
                                                        $scope.amount = 100000;

                                                    }
                                                    if ($scope.du == 3) {
                                                        $scope.amount = 270000;

                                                    }
                                                    if ($scope.du == 6) {
                                                        $scope.amount = 528000;
                                                    }
                                                    if ($scope.du == 12) {
                                                        $scope.amount = 102000;
                                                    }
                                                };

                                            });
                                        </script>
                                    </form>
                                </div>
                            @endif
                        @endif
                        @if(Auth::user()->type == 2)
                            @if($p=='A' and Auth::user()->type==2)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-green">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book"></i> A
                                            </div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-search"></i> View Project limit : 20
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-paper-plane"></i> Create Project limit : 40
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit : 5
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6" ng-app="myApp"  ng-controller="myCtrl">
                                    <span style="font-weight:bolder;font-size:23px;color:#666670;">Are you sure want to buy this plan?</span>
                                    <br>
                                    <form method="post" action="{{url('entra/buy_plan')}}" style="float:left;">

                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label col-md-12">Select Duration Package
                                                <span class="required"> * </span> </label>

                                            <div class="col-md-12">

                                                <select class="form-control" name="duration" ng-model="du" ng-dropdown required ng-change="calculate()" ng-options="option.value as option.type for option in options"> </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="p" value="A"/>
                                        <br>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>

                                        <div class="row"><span style="font-weight:bolder;color:#018591;">Amount</span> @{{ amount }}  kyats</div>

                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>

                                        <button type="submit" class="btn btn-lg btn-success ">Submit
                                        </button>
                                        <a href="{{url('entra/show_plans')}}" class="btn btn-lg btn-danger ">Cancel </a>

                                    </form>
                                </div>
                                <script src="{{asset('js/angular.js')}}"></script>
                                <script>

                                    var app = angular.module('myApp', []);


                                    app.controller('myCtrl', function ($scope) {
                                        $scope.options = [
                                            {value: 1, type: '1 Month'},
                                            {value: 3, type: '3 Months (8% off)'},
                                            {value: 6, type: '6 Months (10% off)'},
                                            {value: 12, type: '12 Months (12% off)'}
                                        ];

                                        $scope.du = $scope.options[0].value;
                                        $scope.amount = 80000;
                                        $scope.calculate = function () {
                                            if ($scope.du == 1) {
                                                $scope.amount = 80000;

                                            }
                                            if ($scope.du == 3) {
                                                $scope.amount = 220800;

                                            }
                                            if ($scope.du == 6) {
                                                $scope.amount = 432000;
                                            }
                                            if ($scope.du == 12) {
                                                $scope.amount = 844800;
                                            }
                                        };

                                    });
                                </script>
                            @endif
                            @if($p=='B' and Auth::user()->type == 2)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-yellow-gold">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book"></i> {{$p}}
                                            </div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-search"></i> View Project limit : unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>
                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-paper-plane"></i> Create Project limit : unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <div class="col-xs-12" style="padding-left:30%;">
                                                <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit :
                                                unlimited
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6" ng-app="myApp"  ng-controller="myCtrl">
                                    <span style="font-weight:bolder;font-size:23px;color:#666670;">Are you sure want to buy this plan?</span>
                                    <br>
                                    <form method="post" action="{{url('entra/buy_plan')}}" style="float:left;">

                                        {{csrf_field()}}
                                        <div class="col-md-12">

                                            <select class="form-control" name="duration" ng-model="du" ng-dropdown required ng-change="calculate()" ng-options="option.value as option.type for option in options"> </select>
                                        </div>

                                        <input type="hidden" name="p" value="B"/>
                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>
                                        <div class="row"><span style="font-weight:bolder;color:#018591;">Amount</span> @{{ amount }}  kyats</div>

                                        <div class="row">&nbsp;&nbsp;&nbsp;</div>

                                        <button type="submit" class="btn btn-lg btn-success ">Submit
                                        </button>
                                        <a href="{{url('entra/show_plans')}}" class="btn btn-lg btn-danger ">Cancel </a>
                                        <script src="{{asset('js/angular.js')}}"></script>

                                        <script>

                                            var app = angular.module('myApp', []);


                                            app.controller('myCtrl', function ($scope) {
                                                $scope.options = [
                                                    {value: 1, type: '1 Month'},
                                                    {value: 3, type: '3 Months (8% off)'},
                                                    {value: 6, type: '6 Months (10% off)'},
                                                    {value: 12, type: '12 Months (12% off)'}
                                                ];
                                                $scope.du = $scope.options[0].value;
                                                $scope.amount = 100000;
                                                $scope.calculate = function () {
                                                    if ($scope.du == 1) {
                                                        $scope.amount = 100000;

                                                    }
                                                    if ($scope.du == 3) {
                                                        $scope.amount = 270000;

                                                    }
                                                    if ($scope.du == 6) {
                                                        $scope.amount = 528000;
                                                    }
                                                    if ($scope.du == 12) {
                                                        $scope.amount = 102000;
                                                    }
                                                };

                                            });
                                            module.directive('convertToNumber', function() {
                                                return {
                                                    require: 'ngModel',
                                                    link: function(scope, element, attrs, ngModel) {
                                                        ngModel.$parsers.push(function(val) {
                                                            return val != null ? parseInt(val, 10) : null;
                                                        });
                                                        ngModel.$formatters.push(function(val) {
                                                            return val != null ? '' + val : null;
                                                        });
                                                    }
                                                };
                                            });
                                        </script>

                                    </form>
                                </div>
                            @endif
                        @endif

                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>


                </div>
            </div>
        </div>
    </div>
    </div>



@endsection