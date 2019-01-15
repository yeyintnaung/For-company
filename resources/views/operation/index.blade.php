@extends('layout.master')
@section('title','Members')
@section('content')

    @if(sizeof($data)==0)

        <h4 class="alert alert-info">There is no member currently!</h4>

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
                        Admin and Operation Members Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center"> Email </th>
                                    <th class="text-center"> Role </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($data as $d)
                                    <tr>
                                        <td class="text-center"><?php echo $count; $count += 1; ?></td>

                                        <td>{{$d->name}}</td>

                                        <td> {{ $d->email }}</td>

                                        <td> {{ $d->role }} </td>

                                        <td class="text-center">
                                            <a href="operation/view/{{$d->id}}" class="btn btn-success">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                View
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="operation/edit/{{$d->id}}" class='btn btn-info '>
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                Edit
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="operation/delete/{{$d->id}}" class='btn btn-danger ' onclick="return confirm('Are you sure to delete !')">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                Delete
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

    <a href="{{url('operation/add')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        New Member
    </a>

@endsection
