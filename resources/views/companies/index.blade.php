@extends('layout.master')
@section('title','Country')
@section('content')
    @if(sizeof($data)==0)

        <h4 class="alert alert-info">There is no data currently</h4>

    @else

        @if(session('update'))

            <p class="alert alert-info">{{session('update')}}</p>

        @endif


        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Countries Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                     <th class="text-center">Email</th>

                                    <th class="text-center">Phone</th>
                                    <th class="text-center">CIty</th>
                                    <th class="text-center">State</th>
                                    <th class="text-center">Plan</th>
                                    <th class="text-center">Free Points</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($data as $dd)
                                    <tr>
                                        <td class="text-center"><?php echo $count;$count += 1; ?></td>

                                        <td>{{$dd->name}}</td>
                                         <td>
                                         <?php
                                         $ee= \Illuminate\Support\Facades\DB::table('users')->where('id',$dd->user_id);
                                          
                                         ?>
                                         @if($ee->count() > 0)
                                         {{$ee->first()->email}}
                                         @endif
                                         </td>
                                        <td>{{$dd->phone}}</td>
                                        <td>{{$dd->city_id}}</td>
                                        <td>
                                            <?php
                                            $check_block = \Illuminate\Support\Facades\DB::table('user_block')->where([['user_id', '=', $dd->user_id], ['circum', '=', 'block']])->count();
                                            ?>
                                            @if($check_block > 0)
                                                {{'Block'}}
                                                @else
                                         <?php
                                            $check_unblock = \Illuminate\Support\Facades\DB::table('user_block')->where([['user_id', '=', $dd->user_id], ['circum', '=', 'unblock']])->count();
                                            
                                            ?>
                                            @if($check_unblock > 0)
                                            {{'ru'}}
                                            @else
                                                {{'Unblock'}}

                                            @endif
                                            @endif

                                        </td>
                                        <td>
                                            <?php
                                            $points = \Illuminate\Support\Facades\DB::table('company_with_plan')->where('com_id', $dd->id);
                                            ?>
                                            @if($points->count() > 0)
                                                {{$points->first()->remaining_point}}
                                            @endif
                                        </td>
                                        <td>
                                            <?php
                                            $fpoints = \Illuminate\Support\Facades\DB::table('user_get_free_plan')->where('user_id', $dd->user_id);
                                            ?>
                                            @if($fpoints->count() > 0)
                                                {{$fpoints->first()->remaining_point}}
                                                Date:
                                                {{$fpoints->first()->end_date}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="companies/detail/{{$dd->id}}" class="btn btn-info">
                                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>


    @endif


    <a href="{{url('countries/upload')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        New Country
    </a>

@endsection
