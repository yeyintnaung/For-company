@extends('layouts.inves_layouts.dashboard')

@section('content')


    <!-- BEGIN SIDEBAR -->

    <!-- END SIDEBAR -->
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
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Business Plan</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title">Business Proposals
                <small></small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row" ng-app='myApp' ng-controller='DemoController'>
                <div infinite-scroll='reddit.nextPage()' infinite-scroll-disabled='reddit.busy'>
                    <div ng-repeat="item in reddit.items">
                        <div class="col-md-6 ">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">

                                        <img src="{{asset('users/entro/photo/')}}/@{{item.logo}}"
                                             style="width: 59px;border-radius: 56% !important;height: 47px;border: 1px solid #f7eefd;"/>
                                        <i class=""></i>@{{ item.name | cut:true:10:'....' }}
                                    </div>
                                    <div class="actions">
                                        <div style="float:left;margin:5px;">
                                            <i class="fa fa-thumbs-up"
                                               ng-init="count=0" style="font-size:27px;"></i>
                                            <span class="badge badge-danger" id="like1"
                                                  style="position:absolute;top:-2px;right:163px;"> @{{item.like_count }} </span>

                                        </div>
                                        <a href="{{url('inves/business_plan_detail')}}/@{{ item.bid }}"
                                           class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> See More </a>
                                        <a href="javascript:;" class="btn">
                                           </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height:200px" data-rail-visible="1"
                                         data-rail-color="yellow" data-handle-color="#a1b2bd">
                                        <strong>@{{ item.title | cut:true:'56':'....' }}</strong>
                                        <strong style="float:right;" ng-bind-html="renderHtml(item.bcr)"></strong>
                                        <br/> <br/> <p ng-bind-html="renderHtml(item.bd)"></p>
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                        </div>
                    </div>
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
    <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
    </div>
    <!-- BEGIN QUICK NAV -->


@endsection
@section('angul')

    <script src="{{asset('js/angular.js')}}"></script>

    <script type='text/javascript' src='{{asset('js/ng-infinite-scroll.js')}}'></script>
    <script>
        var myApp = angular.module('myApp', ['infinite-scroll']);


        myApp.controller('DemoController', function ($scope, Reddit, $http,$sce) {
            $scope.reddit = new Reddit();
            $scope.renderHtml = function(html_code)
            {
                return $sce.trustAsHtml(html_code);
            };


        });

        // Reddit constructor function to encapsulate HTTP and pagination logic
        myApp.factory('Reddit', function ($http) {
            var Reddit = function () {
                this.items = [];
                this.busy = false;
                this.page = 1;
            };

            Reddit.prototype.nextPage = function () {
                if (this.busy) return;
                this.busy = true;
                var url = 'http://localhost/tmr/public/inves/plans?page=' + this.page;
                $http.get(url).then(function (data) {
                    var items = data.data;
                    console.log(items);
                    for (var i = 0; i < items.length; i++) {
                        this.items.push(items[i]);
                    }
                    if (items.length < 5) {
                        this.page = 1;
                    } else {
                        this.page++;

                    }
                    this.busy = false;


                }.bind(this));
            };
            return Reddit;


        });
        myApp.filter('cut', function () {
            return function (value, wordwise, max, tail) {
                if (!value) return '';

                max = parseInt(max, 10);
                if (!max) return value;
                if (value.length <= max) return value;

                value = value.substr(0, max);
                if (wordwise) {
                    var lastspace = value.lastIndexOf(' ');
                    if (lastspace !== -1) {
                        //Also remove . and , so its gives a cleaner result.
                        if (value.charAt(lastspace - 1) === '.' || value.charAt(lastspace - 1) === ',') {
                            lastspace = lastspace - 1;
                        }
                        value = value.substr(0, lastspace);
                    }
                }

                return value + (tail || '......');
            };
        });



    </script>


@endsection
