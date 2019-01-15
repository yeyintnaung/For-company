@extends('layout.master')
@section('title','Update Operation Member')
@section('content')

    <form enctype='multipart/form-data' method="post" class="form-horizontal">
        {{csrf_field()}}

        <div class="form-group">
            <div class="col-md-4">
                <label for="name"  class="control-label">Name</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required autofocus>
            </div>

            @if($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div class="form-group" >
            <div class="col-md-4">
                <label for="email" class="control-label"> Email </label>
            </div>

            <div class="col-md-8">
                <input type="text" name="email" class="form-control" value="{{ $data->email }}" required>
            </div>

            @if($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-info pull-right">
            <i class="fa fa-edit" aria-hidden="true"></i>
            Update
        </button>
    </form>

    <hr style="font-size=12px;">
@endsection
