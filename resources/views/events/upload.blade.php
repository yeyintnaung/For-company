@extends('layout.master')
@section('title','Event')
@section('content')
    <a href="{{url('news')}}" style="text-decoration:none;"><h4><i class="fa fa-newspaper-o" aria-hidden="true"></i>
            Upload News </h4></a>
    <br>
    <form action="{{url('events/upload')}}" enctype='multipart/form-data' method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-md-3">
                <label for="title">Title</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="title" name="title" placeholder="title" required> <br>
            </div>

        </div>
        <div class="row">&nbsp;</div>

        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Description</label>
            </div>
            <div class="col-md-8">

            <textarea id="edit" name="description" style="margin-top: 30px;">


            </textarea>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>


        <div class="form-group">
            <div class="col-md-3">
                <label for="select" class="">Business Hub</label>
            </div>
            <div class="col-md-8">
                <select class="form-control" name="business_hub_id" required>
                    @php
                        $bh=DB::table('business_group')->orderBy('name','asc')->get();
                    @endphp
                    @foreach($bh as $b)
                        <option value="{{$b->id}}">{{$b->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">&nbsp;&nbsp;</div>

        <div class="form-group">
            <div class="col-md-3">
                <label for="select">Start Date</label>
            </div>
            <div class="col-md-8">
                <input type="datetime-local" name="start_date"/>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-md-3">
                <label for="select">End Date</label>
            </div>
            <div class="col-md-8">
                <input type="datetime-local" name="end_date"/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-3">
                <label for="exampleInputFile">Photo</label>
            </div>

            <div class="col-md-8">
                <input type="file" id="exampleInputFile" name="photo" required>
            </div>
        </div>

        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add
        </button>
    </form>
    <hr style="font-size=12px;">
@endsection
