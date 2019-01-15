@extends('layout.master')
@section('title','Category')
@section('content')
    @if(sizeof($cats) == 0)

        <h4 class="alert alert-info">There is no data currently</h4>

    @else

        @if(session('add'))
            <p class="alert alert-success">{{session('add')}}</p>
        @endif
        @if(session('update'))
            <p class="alert alert-success">{{session('update')}}</p>
        @endif
        @if(session('delete'))
            <p class="alert alert-danger"> {{ session('delete') }} </p>
        @endif
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Main Category Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center"> No</th>
                                    <th class="text-center"> Name </th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=1; ?>
                                @foreach($cats as $cat)
                                    <tr>
                                        <td class="text-center"><?php echo $count;?></td>
                                        <td> {{ $cat->name }} </td>
                                        <td class="text-center">{{$cat->created_at}}</td>
                                        <td class="text-center">{{$cat->updated_at}}</td>
                                        <td class="text-center">
                                            <a href="{{ url('maincategory/edit/'.$cat->id) }}" class='btn btn-success '>
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{url('maincategory/delete/'.$cat->id) }}" onclick="return confirm('Are you sure want to delete {{ $cat->name }}')" class='btn btn-danger'>
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                Delete
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

    <br><br>

    <a href="{{url('add_maincat')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        New Main Category
    </a>

@endsection
