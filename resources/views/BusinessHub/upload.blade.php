@extends('layout.master')
@section('title','Business Hub Upload')
@section('content')

<a href="{{url('businesshub')}}"  style="text-decoration:none;"><h4><i class="fa fa-sitemap" aria-hidden="true" ></i> Browse Business Hub </h4></a>
<br>
@if(session('create'))

<p class="alert alert-info">{{session('create')}}</p>

@endif
<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="row">
    <div class="form-group">
      <div class="col-md-3">
        <label for="description" class="pull-right">Description</label>
      </div>
      <div class="col-md-8">
          <input type="text" class="form-control" name="description" id="description" placeholder="description" required autofocus>
          <br>
      </div>
    </div>
  </div>

    <div class="form-group">
      <div class="col-md-3">
      <label for="select" class="pull-right">Business Group</label>
      </div>
      <div class="col-md-8">
      <select class="form-control" name="business_group_id">
        @foreach($businessgroups as $businessgroup)
        <option value="{{$businessgroup->id}}">{{$businessgroup->name}}</option>
        @endforeach
      </select>
      </div>
    </div>




  <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp
Add</button>
</form>
<hr style="font-size=12px;">
@endsection
