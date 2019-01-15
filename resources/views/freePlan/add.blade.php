@extends('layout.master')
@section('title','Add Free Plan')
@section('content')

    <div class="col-md-8 col-md-offset-2">
        <h3> Add Free Plan </h3>
        <form action="{{url('free_plan/add')}}" enctype='multipart/form-data' method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <div class="col-md-4">
                    <label for="title"> Amount </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount . . ." required autofocus>
                </div>
            </div>

            <div id="editor" class="form-group">
                <div class="col-md-4">
                    <label for="title"> Increase </label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="increase" id="" class="form-control" placeholder="Increase . . ." required>
                </div>
            </div>

            <button type="submit" class="btn btn-info pull-right">
                <i class="fa fa-plus" aria-hidden="true"></i> Add
            </button>
        </form>
    </div>

@endsection
