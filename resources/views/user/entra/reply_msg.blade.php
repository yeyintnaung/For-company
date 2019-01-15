@extends('layouts.dashboard')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark ">Send Quotation</i>
                            </div>


                        </div>


                        <div class="row">


                            <div class="c-contact"
                                 style="padding:18px; border:2px solid #67809F;background-color:#67809F;">
                                <div class="caption">
                                    <h3 class="" style="color:white;">Send Quotation to {{$com->name}}</h3>
                                    <p class="c-font-lowercase" style="color:#c1c1c1;">Our helpline is always open
                                        to receive any inquiry or feedback. Please feel free to drop us an email
                                        from the form below and we will get back to you as soon as we can.</p>
                                </div>
                                <form action="{{url('entra/reply_message')}}" method="post"
                                      enctype="multipart/form-data"
                                      class="form-horizontal">
                                    {{csrf_field()}}


                                    <input type="hidden" placeholder="Your Name" name="from_user"
                                           value="{{Auth::user()->id}}" class="form-control input-md">
                                    <input type="hidden" placeholder="Your Email" name="to_user"
                                           value="{{$com->user_id}}" class="form-control input-md">
                                    <div class="form-group">
                                        <?php
                                        $inv = \Illuminate\Support\Facades\DB::table('investor')->where('user_id', Auth::user()->id)->first();
                                        ?>
                                        <input type="text" name="title" placeholder="Title"
                                               class="form-control input-md" required/></div>
                                    @if(preg_match('/other_project_detail/',url()->previous()))
                                        <input type="hidden" name="type" value="p"/>

                                    @else
                                        <input type="hidden" name="type" value=" "/>
                                    @endif

                                    <div class="form-group">
                                            <textarea rows="8" name="subject" placeholder="Write comment here ..."
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
