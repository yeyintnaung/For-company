@extends('layout.master')
@section('title','Events')
@section('content')
@if(sizeof($events)==0)

    <h4 class="alert alert-info">There is no data currently</h4>

@else

    @if(session('update'))
    <h4 class="alert alert-success"> {{session('update')}} </h4>
    @endif
    @if(session('upload'))
        <h4 class="alert alert-success"> {{session('upload')}} </h4>
    @endif


    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                     Events Table
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                              <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Start Date</th>
                                <th class="text-center">End Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $count=1; ?>
                              @foreach($events as $ev)
                              <tr>
                                <td class="text-center"><?php echo $count;$count +=1;?></td>
                                <td>{{$ev->title}}</td>

                                <td>{!! $ev->description  !!}</td>

                                <td>{{\Carbon\Carbon::parse($ev->start_date)->format('Y-m-d')}}</td>

                                <td>{{\Carbon\Carbon::parse($ev->end_date)->format('Y-m-d')}}</td>

                                <td class="text-center">
                                    <a href="events/edit/{{$ev->id}}" class="btn btn-success">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        Edit
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a href="events/view/{{$ev->id}}" class="btn btn-primary">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        View
                                    </a>
                                </td>

                                <td class="text-center">
                                    <a href="#" onclick="de('{{url('events/delete/'.$ev->id)}}')" class="btn btn-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        Delete
                                    </a>
                                </td>

                                  <script>
                                      function de(li){
                                          if(window.confirm('Are you sure want to delete this article?')){
                                              window.location.assign(li);
                                          }
                                      }
                                  </script>
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

<a href="{{url('events/upload')}}" class="btn btn-info pull-right">
    <i class="fa fa-plus" aria-hidden="true"></i>
    Add New Event
</a>

@endsection
