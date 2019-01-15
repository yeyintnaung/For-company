@extends('layout.master')
@section('title','Add Free Plan')
@section('content')

    <div class="col-md-8 col-md-offset-2">
        <h3> Add Work Plan </h3>
        <form action="{{url('operation/first_work')}}" enctype='multipart/form-data' method="post"
              class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <div class="col-md-4">
                    <label for="title"> Name </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="amount" name="name" placeholder="Name . . ." required
                           autofocus>
                </div>
            </div>
            @if($errors)
                @foreach($errors->all() as $e)
                    {{$e}}
                @endforeach
            @endif


            <button type="submit" class="btn btn-info pull-right">
                <i class="fa fa-plus" aria-hidden="true"></i> Add
            </button>
        </form>
    </div>

@endsection
