@extends('layout.master')
@section('title','Free Plan')
@section('content')
    @if(sizeof($data)==0)

        <h4 class="alert alert-info">There is no data currently</h4>

    @else

        @if(session('update'))
            <h4 class="alert alert-success"> {{session('update')}} </h4>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <h4 class="alert alert-success">Successfully edited </h4>
        @endif

        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Free Plan Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center"> Amount </th>
                                        <th class="text-center"> Type </th>
                                        <th class="text-center"> Point </th>
                                        <th class="text-center"> Duration </th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count=1; ?>
                                    @foreach($data as $d)
                                        <tr>
                                            <td class="text-center"><?php echo $count;$count +=1;?></td>

                                            <td class="text-center"> {{ $d->amount }} </td>

                                            <td class="text-center"> {{ $d->type }} </td>
                                            <td class="text-center"> {{ $d->point }} </td>
                                            <td class="text-center"> {{ $d->duration }} </td>

                                            <td class="text-center">
                                                <a href="edit_cplan/{{$d->id}}" class="btn btn-success">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    Edit
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


            {{--<a href="{{url('free_plan/add')}}" class="btn btn-info pull-right">--}}
            {{--<i class="fa fa-plus" aria-hidden="true"></i>--}}
            {{--Add Free Plan--}}
            {{--</a>--}}
        </div>
    @endif

@endsection
