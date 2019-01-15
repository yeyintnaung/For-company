@extends('layout.master')
@section('title','Event')
@section('content')
    <a href="{{url('tenders')}}" style="text-decoration:none;"><h4><i class="fa fa-newspaper-o" aria-hidden="true"></i>
            Edit News </h4></a>
    <form enctype='multipart/form-data' method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-md-3">
                <label for="title">Title</label></div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="title" name="title" value="{{$tenders->title}}" required>
                <br>
            </div>
        </div>

        <div class="row">&nbsp;</div>

        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Description</label>
            </div>
            <div class="col-md-8">

            <textarea id="edit" name="description" style="margin-top: 30px;">

             {{$tenders->description}}
            </textarea>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="form-group" >
            <div class="col-md-3">
                <label for="select" class="">Business Hub</label>

            </div>
            <div class="col-md-8" style="margin-bottom:22px;">
                <select class="form-control" name="business_hub_id" required>
                    @php
                        $sbh=DB::table('business_group')->where('id',$tenders->business_hub_id)->first();
                    @endphp
                    <option value="{{$sbh->id}}" selected/>{{$sbh->name}}</option>

                    @php
                        $bh=DB::table('business_group')->orderBy('name','asc')->get();
                    @endphp
                    @foreach($bh as $b)
                        <option value="{{$b->id}}">{{$b->name}}</option>
                    @endforeach
                    <option value="100000">All</option>
                </select>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="form-group">
            <div class="col-md-3">
                <label for="exampleInputFile">Photo input</label></div>
            <div class="col-md-8">
                <input type="file" id="exampleInputFile" name="photo">
            </div>
        </div>
        <div class="row">&nbsp;</div>

        <div class="form-group">
            <div class="col-md-3">
                <label for="title">Defined Point</label></div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="title" name="td_point" value="{{$tenders->td_point}}" required>
                <br>
            </div>
        </div>

        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp
            Update
        </button>
    </form>
    <hr style="font-size=12px;">
@endsection
