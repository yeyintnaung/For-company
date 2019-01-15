@extends('layout.master')
@section('title','Edit Category Name')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Edit Construct Name
                </div>
                <div class="panel-body">

                    <form action="{{ url('design/edit/'.$construct->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label"> Name </label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $construct->name }}">
                            </div>
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
