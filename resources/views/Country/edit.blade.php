@extends('layout.master')
@section('title','Country')
@section('content')

<a href="{{url('countries')}}"  style="text-decoration:none;"><h4><i class="fa fa-flag" aria-hidden="true" ></i> Upload Countries </h4></a>

<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="form-group">
    <div class="col-md-3">
      <label for="name" class="pull-right">Name</label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control" name="name" id="name" value="{{$country->name}}" required >
    </div>

  </div>

  <button type="submit" class="btn btn-info pull-right">Update</button>
</form>
<hr style="font-size=12px;">
@endsection
