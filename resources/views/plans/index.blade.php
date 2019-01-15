@extends('layout.master')
@section('title','Plans')
@section('content')
    @if(sizeof($plans)==0)



        <h4 class="alert alert-info">There is no data currently</h4>

    @else

        @if(session('add'))
            <p class="alert alert-success">{{session('add')}}</p>
        @endif
        @if(session('update'))
            <p class="alert alert-success">{{session('update')}}</p>
        @endif



        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Register Fee Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Plan Type</th>
                                    <th class="text-center">Duration Month</th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>

                                    @foreach($plans as $plan)

                                        <tr>
                                            <td class="text-center"><?php echo $count; $count += 1; ?></td>
                                            <td>
                                                @php
                                                    $email=DB::table('users')->where('id', $plan->user_id)->first();
                                                @endphp
                                                {{$email->email}}
                                            </td>
                                            <td class="text-center">
                                                @if($plan->plan_type == 1)
                                                    A
                                                @endif
                                                @if($plan->plan_type == 2)
                                                    B
                                                @endif
                                                @if($plan->plan_type == 3)
                                                    C
                                                @endif

                                            </td>

                                            <td class="text-center">{{$plan->duration_month}}</td>

                                            <td class="text-center">{{$plan->start_date}}</td>

                                            <td class="text-center">{{$plan->expire_date}}</td>

                                            <td class="text-center">
                                                <a href="plan/view/{{$plan->id}}" class='btn btn-success'>
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> View
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

    <br><br>

    <a href="{{url('add_plan')}}" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
        &nbsp New Article </a>

@endsection
