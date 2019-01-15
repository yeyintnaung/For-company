@extends('layouts.dashboard')
@section('content')
@section('title')
    Construct Project
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
                     style="padding:18px; background-color:#34588482;">
                    <div class="caption">
                        <h3 class="" style="color:white;"><i class="fa fa-send">&nbsp;Send Mail</i> to <i> {{$user_data->name}}</i></h3>
                        <p class="c-font-lowercase" style="color:#c1c1c1;"></p>
                    </div>
                    <form action="{{url('entra/construct_send_mail')}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden" placeholder="Your Name" name="com_id"
                               value="{{$com->id}}" class="form-control input-md">
                        <input type="hidden" placeholder="Your Email" name="user_id"
                               value="{{$post_data->user_id}}" class="form-control input-md">
                        <input type="hidden" name="post_id" value="{{$post_data->id}}"/>
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Title"
                                   class="form-control input-md" required/></div>
                        <div class="form-group">
                                            <textarea rows="8" name="message" style="height: 200px; overflow:auto"placeholder="Write comment here ..."
                                                      class="form-control input-md" required></textarea>
                        </div>
                        <button type="submit" class="btn grey">Send</button>
                    </form>
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
