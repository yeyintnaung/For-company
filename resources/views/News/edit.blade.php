@extends('layout.master')
@section('title','News Browse')
@section('content')
<a href="{{url('news')}}"  style="text-decoration:none;"><h4><i class="fa fa-newspaper-o" aria-hidden="true" ></i> Edit News </h4></a>
<form enctype='multipart/form-data' method="post">
  {{csrf_field()}}
  <div class="form-group">
    <div class="col-md-3">
    <label for="title">Title</label></div>
    <div class="col-md-8">
    <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}" required>
    <br>
    </div>
  </div>

  <div class="row">&nbsp;</div>

  <div id="editor" class="form-group">
    <div class="col-md-3">
      <label for="title">Description</label>
    </div>
    <div class="col-md-8">

            <textarea id="edit" name="des" style="margin-top: 30px;">

{{$news->des}}
            </textarea>
    </div>
  </div>
  <div class="row">&nbsp;</div>
  <div class="row">&nbsp;</div>

  <div class="form-group">
    <div class="col-md-3">
    <label for="select">News Category</label>
    </div>
    <div class="col-md-8">
    <select class="form-control" name="newscategory">
      @foreach($newsCategories as $newsCategory)
      <option value="{{$newsCategory->id}}" <?php if($newsCategory->id==$news->NewsCategory_id) echo "selected='selected'"; ?> > {{$newsCategory->description}}</option>
      @endforeach
    </select><br>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-3">
    <label for="exampleInputFile">File input</label> </div>
    <div class="col-md-8">
    <input type="file" id="exampleInputFile" name="file">
    </div>
  </div>

  <button type="submit" class="btn btn-info pull-right"><i class="fa fa-pencil" aria-hidden="true"></i>
    &nbsp Update</button>
</form>
<hr style="font-size=12px;">
@endsection
