@extends('layouts.dashboard')
@section('content')
@section('title')
    Sent Mail
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
<div class="col-xs-12" style="background-color:#ddedf2;padding-bottom:22px;">
    <!-- BEGIN CONTENT BODY -->
    <div style=" margin: auto; width: 90%; padding: 10px;">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <?php
            $com=\Illuminate\Support\Facades\DB::table('company')->where('user_id',Auth::user()->id)->first();
            ?>
            <div class="c-contact"
                 style="padding:10px; background-color:#34588482;">
                <div class="caption">
                    <font size="5" style="color:white;">   <i class="fa fa-check-circle">&nbsp;&nbsp;Sent Mail</i> to <i> {{$user_data->name}}</i> &nbsp;&nbsp;</font><font size="3" color="white">   ( {{\Carbon\Carbon::parse($data->created_at)->toDateString()}})</font>
                    <br><br>
                </div>
                <div class="note note-info">
                    <i class="fa fa-gift"></i>&nbsp;{{$post_data->name}}
                </div>
                <div style="padding: 10px; background: white; height: 200px; overflow:auto">{{$data->message}}
                </div>


            </div>


        </div>
    </div>

    <!-- END VALIDATION STATES-->
</div>
</div>
</div>
</div>
<!-- END CONTENT BODY -->




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
