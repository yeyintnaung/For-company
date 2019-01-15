@extends('layout.master')
@section('title','Design')
@section('content')

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Main Category Table
                    </div>
                    <div class="panel-body">

                        <form action="{{ url('design/add_design') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3"> Name </label>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">

                                    @if($errors->has('name'))
                                        <span>
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                                <input type="submit" value="ADD" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

@endsection
