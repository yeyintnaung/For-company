@extends('layout.master')
@section('title','Country')
@section('content')
@if(sizeof($datas)==0)

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
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $count=1; ?>
                              @foreach($datas as $data)
                              <tr>
                                <td class="text-center"><?php echo $count;$count +=1; ?></td>

                                <td>{{$data->name}}</td>

                                <td class="text-center">
                                    <a href="countries/edit/{{$data->id}}" class="btn btn-success">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a href="countries/delete/{{$data->id}}" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
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


<a href="{{url('countries/upload')}}" class="btn btn-info pull-right">
    <i class="fa fa-plus" aria-hidden="true"></i>
    New Country
</a>

@endsection
