@extends('layout.master')
@section('title','News Categories Browse')
@section('content')
@if(session('create'))
<p class="alert alert-success">{{session('create')}}</p>
@endif
@if(session('update'))
<p class="alert alert-success">{{session('update')}}</p>
@endif
@if(session('delete'))
<p class="alert alert-success">{{session('delete')}}</p>
@endif
@if(sizeof($newsCategories)==0)
<h4 class="alert alert-info">There is no data currently</h4>
@else
    <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            News Categories Table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"	id="dataTables-example">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $count=1; ?>
                                      @foreach($newsCategories as $newsCategory)

                                      <tr>
                                        <td>  <?php echo $count; $count+=1; ?>  </td>
                                        <td> {{$newsCategory->description}} </td>
                                        <td> <a href="newsCategory/edit/{{$newsCategory->id}}" class='btn btn-success '>
                                          <i class="fa fa-pencil" aria-hidden="true"></i> &nbsp Edit </a> </td>
                                        <td> <a href="newsCategory/delete/{{$newsCategory->id}}" class='btn btn-danger ' onclick="return confirm('Are you sure to delete {{$newsCategory->description}} !')">
                                          <i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp Delete </a> </td>
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

<a href="{{url('newsCategory/upload')}}" class="btn btn-info pull-right"> <i class="fa fa-plus" aria-hidden="true"></i> &nbsp New Category </a>

@endsection
