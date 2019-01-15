@extends('layout.master')
@section('title','Update Free Plan')
@section('content')

    <h3> Edit Free Plan </h3>
    <div class="col-md-8 col-md-offset-2">
        <form enctype='multipart/form-data' action="{{url('edit_cplan/'.$data->id)}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <div class="col-md-4">
                    <label for="amount"  class="control-label"> Amount </label>
                </div>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ $data->amount }}" required autofocus>
                </div>

                @if($errors->has('amount'))
                    <span class="help-block">
                        {{ $errors->first('amount') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="amount"  class="control-label"> Point </label>
                </div>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="amount" name="point" value="{{ $data->point }}" required autofocus>
                </div>

                @if($errors->has('point'))
                    <span class="help-block">
                        {{ $errors->first('point') }}
                    </span>
                @endif
            </div>

                 <input type="hidden" name="id" value="{{$data->id}}"/>
            <button type="submit" class="btn btn-info pull-right">
                <i class="fa fa-edit" aria-hidden="true"></i>
                Update
            </button>
        </form>

        <hr style="font-size:12px;">

    </div>
@endsection
