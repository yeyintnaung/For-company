@extends('layout.master')
@section('title','Business Group Upload')
@section('content')

<a href="{{url('businessgroup')}}"  style="text-decoration:none;"><h4><i class="fa fa-sitemap" aria-hidden="true" ></i> Browse Business Group </h4></a>
  <br>
<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="row">


  <div class="form-group">
    <div class="col-md-3">

      <label for="name" class="pull-right">Name</label>
    </div>
    <div class="col-md-4">
        <input type="text" class="form-control" name="name" id="name" value="{{$businessgroup->name}}" required >
    </div>

  </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-8">

      <button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp Update</button>

    </div>
  </div>

</form>
<hr style="font-size=12px;">
@endsection
