@extends('layout.master')
@section('title','News Browse')
@section('content')

@if(session('create'))

<p class="alert alert-info">{{session('create')}}</p>

@endif
<br>
<legend>Add News Description</legend>
<br><br>
<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="row">

    <div class="form-group">
      <div class="col-md-3">
        <label for="description" class="pull-right">Description</label>
      </div>
      <div class="col-md-4">
          <input type="text" class="form-control" name="description" id="description" placeholder="description" required autofocus>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-8">
      <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i>
    Add</button>
    </div>

  </div>


</form>

<hr style="font-size=12px;"/>

@endsection
