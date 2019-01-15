@extends('layout.master')
@section('title','Business  Browse')
@section('content')

@if(sizeof($businesshubs)==0)

    <h4 class="alert alert-info">There is no data currently</h4>

@else

    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Business  Table
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                              <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Business Group</th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $count=1; ?>
                              @foreach($businesshubs as $businesshub)
                              <tr>

                              <td class="text-center"><?php echo $count; $count += 1; ?></td>

                              <td>{{$businesshub->description}}</td>

                              <td>
                                  <?php
                                      $id = $businesshub->business_group_id;
                                      $name = DB::table('business_group')->where('id','=',$id)->pluck('name');
                                      $pickname = $name['0'];
                                      echo $pickname;
                                  ?>
                              </td>

                              <td class="text-center">
                                  <a href="{{url('businesshub/edit/'.$businesshub->id)}}" class="btn btn-success">
                                      <i class="fa fa-pencil" aria-hidden="true"></i>
                                      Edit
                                  </a>
                              </td>

                              <td class="text-center">
                                <a href="{{url('businesshub/delete/'.$businesshub->id)}}" onclick="return confirm('Are you sure to delete {{$businesshub->description}}')" class="btn btn-danger">
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

<a href="businesshub/upload" class="btn btn-info pull-right">
    <i class="fa fa-plus" aria-hidden="true"></i>
    New Business
</a>

@endsection
