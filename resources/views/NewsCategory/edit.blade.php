@extends('layout.master')
@section('title','News Category Edition')
@section('content')

<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" id="description" value="{{$newsCategory->description}}" required>
  </div>

  <button type="submit" class="btn btn-info pull-right"><i class="fa fa-pencil" aria-hidden="true"></i>
    &nbsp Edit</button>
</form>
<hr style="font-size=12px;">
@endsection
