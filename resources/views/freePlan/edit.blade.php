@extends('layout.master')
@section('title','Update Free Plan')
@section('content')

    <h3> Edit Free Plan </h3>
    <div class="col-md-8 col-md-offset-2">
        <form enctype='multipart/form-data' method="post" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <div class="col-md-4">
                    <label for="amount"  class="control-label"> Amount </label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $data->amount }}" required autofocus>
                </div>

                @if($errors->has('amount'))
                    <span class="help-block">
                        {{ $errors->first('amount') }}
                    </span>
                @endif
            </div>

            <div class="form-group" >
                <div class="col-md-4">
                    <label for="increase" class="control-label"> Increase </label>
                </div>

                <div class="col-md-8">
                    <input type="text" name="increase" class="form-control" value="{{ $data->increase }}" required>
                </div>

                @if($errors->has('increase'))
                    <span class="help-block">
                        {{ $errors->first('increase') }}
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-info pull-right">
                <i class="fa fa-edit" aria-hidden="true"></i>
                Update
            </button>
        </form>

        <hr style="font-size=12px;">

    </div>
@endsection
