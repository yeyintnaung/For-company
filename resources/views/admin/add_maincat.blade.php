@extends('layout.master')
@section('title','Add Category')
@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Main Category
                </div>
                <div class="panel-body">

                    <form action='add_maincat' method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-md-3"> Category Name </label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Categroy Name">

                                @if($errors->has('name'))
                                    <span class="alert alert-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="submit" value="Save" class="btn green">
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
