@extends('layout.master')
@section('title','Cities')
@section('content')
@if(sizeof($cities)==0)

    <h4 class="alert alert-info">There is no data currently</h4>

@else

    @if(session('create'))

    <p class="alert alert-info">{{session('create')}}</p>

    @endif

    @if(session('update'))

    <p class="alert alert-info">{{session('update')}}</p>

    @endif

    @if(session('delete'))

    <p class="alert alert-warning">{{session('delete')}}</p>

    @endif



    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                     Cities Table
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                              <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">City Name</th>
                                <th class="text-center">Country Name </th>
                                <th></th>
                                <th></th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php $count=1; ?>
                              @foreach($cities as $city)
                              <tr>
                                <td class="text-center"><?php echo $count;$count +=1; ?></td>

                                <td>{{$city->name}}</td>

                                <td>
                                    <?php
                                      $country_id = $city->country_id;
                                      $name = DB::table('countries')->where('id', $country_id)->pluck('name')->toArray();
                                      $pick = implode('' , $name);
                                      echo $pick;
                                    ?>
                                </td>

                                <td class="text-center">
                                    <a href="{{url('cities/edit/'.$city->id)}}" class="btn btn-success">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a href="{{url('cities/delete/'.$city->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{$city->name}}(<?php
                                        $country_id = $city->country_id;
                                        $name = DB::table('countries')->where('id', $country_id)->pluck('name')->toArray();
                                        $pick = implode('', $name);
                                        echo $pick;
                                        ?>) ? ')" >
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

    <a href="{{url('cities/upload')}}" class="btn btn-info pull-right">
        <i class="fa fa-plus" aria-hidden="true"></i>  New City
    </a>

@endsection
