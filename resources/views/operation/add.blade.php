@extends('layout.master')
@section('title','Add Member')
@section('content')

    <form enctype='multipart/form-data' method="post" class="form-horizontal">
        {{csrf_field()}}

        <div class="form-group">
            <div class="col-md-4">
                <label for="name"  class="control-label">Name</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autofocus>
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
                <input type="text" name="email" class="form-control" placeholder="Email" required>
            </div>

            @if($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <label for="password" class="control-label"> Password </label>
            </div>

            <div class="col-md-8">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            @if($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>


        <div class="form-group">
            <div class="col-md-4">
                <label for="password_confirmation" class="control-label"> Confirm Password </label>
            </div>

            <div class="col-md-8">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>
        </div>

        <button type="submit" class="btn btn-info pull-right">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Add
        </button>
    </form>

    <hr style="font-size=12px;">
@endsection
