@extends('layout.master')
@section('title','City Upload')
@section('content')

<a href="{{url('cities')}}"  style="text-decoration:none;"><h4><i class="fa fa-users" aria-hidden="true" ></i> Edit City </h4></a>


<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}

    <div class="row">
      <div class="form-group">
      <div class="col-md-3">
        <label for="city" class="pull-right">Name</label>
      </div>
      <div class="col-md-4">
          <input type="text" class="form-control" name="name" id="city" value="{{$city->name}}" required autofocus>
          <br>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="form-group">
      <div class="col-md-3">
      <label for="select" class="pull-right">Country</label>
      </div>
      <div class="col-md-4">
      <select class="form-control" name="country_id">
        @foreach($countries as $country)
          <option value="{{$country->id}}" <?php if($country->id == $city->country_id) echo 'selected';  ?> >{{$country->name}}</option>
        @endforeach
      </select>
      </div>
    </div>
  </div>


<div class="row">
<div class="col-md-8">
  <br> <button type="submit" class="btn btn-info pull-right"> <i class="fa fa-pencil" aria-hidden="true"></i>
    &nbsp Update</button>
</div>
</div>
</form>
<hr style="font-size=12px;">
@endsection
