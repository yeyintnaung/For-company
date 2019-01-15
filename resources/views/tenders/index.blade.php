@extends('layout.master')
@section('title','Tender')
@section('content')
    @if(sizeof($tenders)==0)



        <h4 class="alert alert-info">There is no data currently</h4>

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
                        Tenders Table
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Date</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($tenders as $tender)
                                    <tr>
                                        <td class="text-center"><?php echo $count; $count += 1; ?></td>

                                        <td>{{$tender->title}}</td>

                                        <td>{{\Carbon\Carbon::parse($tender->created_at)->format('Y-m-d')}}</td>

                                        <td class="text-center">
                                            <a href="tenders/view/{{$tender->id}}" class='btn btn-success '>
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                View
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a href="tenders/edit/{{$tender->id}}" class='btn btn-info '>
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a href="tenders/delete/{{$tender->id}}" class='btn btn-danger ' onclick="return confirm('Are you sure to delete !')">
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

    <a href="{{url('tenders/upload')}}" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp
        New Article </a>

@endsection
