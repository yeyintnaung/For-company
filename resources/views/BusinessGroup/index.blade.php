@extends('layout.master')
@section('title','Business Group')
@section('content')
@if(sizeof($businessgroups)==0)

    <h4 class="alert alert-info">There is no data currently</h4>

@else

    @if(session('update'))
        <h4 class="alert alert-success"> {{session('update')}} </h4>
    @endif


    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                     Business Hub
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                              <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Name</th>
                                <th></th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $count=1; ?>
                                @foreach($businessgroups as $businessgroup)
                                  <tr>
                                    <td class="text-center"><?php echo $count;$count +=1; ?></td>

                                    <td>{{$businessgroup->name}}</td>

                                    <td class="text-center">
                                        <a href="businessgroup/edit/{{$businessgroup->id}}" class="btn btn-success">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            Edit
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a href="businessgroup/view/{{$businessgroup->id}}" class="btn btn-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            View
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <a href="businessgroup/delete/{{$businessgroup->id}}" class="btn btn-danger">
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

    <a href="{{url('businessgroup/upload')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        New Business Group
    </a>

@endsection
