@extends('layout.master')
@section('title','Business Group Browse')
@section('content')
@if(sizeof($businesshubs)==0)



<h4 class="alert alert-info">There is no data currently</h4>

@else



    <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Business Hub
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" 					id="dataTables-example">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Name</th>

                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>


                                      <?php $count=1; ?>
                                      @foreach($businesshubs as $businesshub)
                                        <?php if($businesshub->business_group_id == $id) { ?>
                                      <tr>
                                        <td><?php echo $count;$count +=1; ?></td>
                                        <td>{{$businesshub->description}}</td>
                                        <td><a href="{{url('businesshub/edit/'.$businesshub->id)}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> &nbspEdit</a> </td>
                                        <td><a href="businesshub/delete/{{$businesshub->id}}" onclick="return confirm('Are you sure to delete {{$businesshub->description}}')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbspDelete</a> </td>
                                      </tr>
                                      <?php } ?>
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

<a href="{{url('businesshub/upload')}}" class="btn btn-info pull-right"> Upload New Business Hub </a>

@endsection
