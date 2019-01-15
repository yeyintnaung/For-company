@extends('layout.master')
@section('title','Register Fees')
@section('content')
    @if(sizeof($fees)==0)

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
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=1; ?>
                                @foreach($fees as $fee)
                                    <tr>
                                        <td class="text-center"><?php echo $count;?></td>
                                        <td>
                                            @php
                                                $email=DB::table('users')->where('id', $fee->user_id)->first();
                                            @endphp
                                            {{$email->email}}
                                        </td>

                                        <td class="text-center">{{$fee->start_date}}</td>

                                        <td class="text-center">{{$fee->expire_date}}</td>

                                        <td class="text-center">
                                            <a href="register_fee/view/{{$fee->id}}" class='btn btn-success '>
                                                <i class="fa fa-pencil" aria-hidden="true"></i> View
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="register_fee/edit/{{$fee->user_id}}" class='btn btn-info '>
                                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                            </a>
                                        </td>

                                    </tr>
                                    <?php $count++; ?>
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

    <a href="{{url('add_register_fee')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>  New Article
    </a>

@endsection
