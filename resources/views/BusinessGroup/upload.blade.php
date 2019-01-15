@extends('layout.master')
@section('title','Business Group Upload')
@section('content')

<a href="{{url('businessgroup')}}"  style="text-decoration:none;"><h4><i class="fa fa-sitemap" aria-hidden="true" ></i> Browse Business Group </h4></a>
<br>
@if(session('create'))

<p class="alert alert-info">{{session('create')}}</p>

@endif

@if(session('newcreateplease'))

<p class="alert alert-info">{{session('newcreateplease')}}</p>

@endif


<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="row">
    <div class="form-group">
      <div class="col-md-3">
        <label for="name" class="pull-right">Name</label>
      </div>
      <div class="col-md-4">
          <input type="text" class="form-control" name="name" id="name" placeholder="name" required autofocus>
          <br>
      </div>

    </div>
  </div>

<div class="row">
  <div class="col-md-8">
    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp
  Add</button>
  </div>

</div>

</form>
<hr style="font-size=12px;">
@endsection
