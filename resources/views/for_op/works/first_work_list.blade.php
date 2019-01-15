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
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($data as $d)
                                    <tr>
                                        <td class="text-center"><?php echo $count; $count += 1; ?></td>
                                        <td>{{$d->name}}</td>
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

    <a href="{{url('operation/first_work_form')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        New Member
    </a>

@endsection
