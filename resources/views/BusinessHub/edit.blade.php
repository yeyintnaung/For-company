@extends('layout.master')
@section('title','Business Hub Edition')
@section('content')

<a href="{{url('businesshub')}}"  style="text-decoration:none;"><h4><i class="fa fa-sitemap" aria-hidden="true" ></i> Browse Business Hub </h4></a>


<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="form-group">
    <div class="col-md-3">
      <label for="description" class="pull-right">Description</label>
    </div>
    <div class="col-md-8">
        <input type="text" class="form-control" name="description" id="description" value="{{$businesshub->description}}" required >
        <br>
    </div>
  </div>
    <div class="form-group">
      <div class="col-md-3">
      <label for="select" class="pull-right">Business Group</label>
      </div>
      <div class="col-md-8">
      <select class="form-control" name="business_group_id">
        @foreach($businessgroups as $businessgroup)
        <option value="{{$businessgroup->id}}"
          <?php if($businessgroup->id == $businesshub->business_group_id) echo "selected"; ?>
          >{{$businessgroup->name}}</option>
        @endforeach
      </select>
      </div>
    </div>




  <button type="submit" class="btn btn-info pull-right"><i class="fa fa-pencil" aria-hidden="true"></i>
    &nbsp Update</button>
</form>
<hr style="font-size=12px;">
@endsection
