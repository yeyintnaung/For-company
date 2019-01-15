@extends('layouts.dashboard')
@section('content')
@section('title')
    Upload Project
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

<div class="col-xs-12" style="background-color:#ddedf2;padding-bottom:22px;">
    <!-- BEGIN CONTENT BODY -->
    <div style=" margin: auto; width: 90%; padding: 20px;">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <?php
                $com=\Illuminate\Support\Facades\DB::table('company')->where('user_id',Auth::user()->id)->first();
                ?>
                <div class="c-contact"
                     style="padding:30px; background-color:#36c6d375;">
                    <div class="caption">
                        <h3 class="" style="color:black;"><i class="icon-pencil">&nbsp;Create project calling for third parties</i></h3>
                       <br>
                    </div>
                    <form action="{{url('entra/upload_project')}}" method="post"
                          enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}

                        <div class="form-group">
                            <input type="text" name="title" placeholder=" Project Title"
                                   class="form-control input-md" required/></div>
                        <div class="form-group">
                                            <textarea class="wysihtml5 form-control form-control input-md" rows="8" name="description" style="height: 200px; overflow:auto"placeholder=" Write project's description here ..."
                                                      required></textarea>
                        </div>
                        <div class="form-group">
                           <label>Business Hub</label>
                           <select name="business_hub_id" required>
                                    <?php
                                    $bh = \Illuminate\Support\Facades\DB::table('business_hub')->orderBy('id','asc')->get();
                                    ?>
                                    @foreach ($bh as $b)
                                        <option value="{{$b->id}}" style="word-wrap:break-word">{{$b->description}}</option>
                                    @endforeach
                           </select></div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder=" Phone Number"
                                   class="form-control input-md" required/></div>
                        <div class="form-group">
                            <input type="text" name="address" placeholder=" Address"
                                   class="form-control input-md" required/></div>
                        <div class="form-group">
                            <label>Expire Date</label>
                            <input type="date" name="expire_date">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn grey">Post</button><div>
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
