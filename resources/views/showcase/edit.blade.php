@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">

            <h1 class="page-title page_title"> Add Your Product </h1>

            <div class="col-md-8 col-md-offset-2">

                <form method="post" class="form-horizontal" enctype="multipart/form-data">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="control-label col-md-4"> Product Name </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{$product->name}}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color:red;">
                                        {{ $errors->first('name') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4"> Product Photo (Optional) </label>
                        <div class="col-md-8">
                            <div class="wrap">
                                <div class="drop">
                                    <div class="uploader">
                                        <label class="drop-label">Drag and drop images here</label>
                                        <input type="file" class="image-upload" id="photo" name="photo" accept="image/*" multiple>
                                    </div>
                                    <div id="image-preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('photo'))
                        <span class="help-block">
                                    <strong style="color:red;">
                                        {{ $errors->first('photo') }}
                                    </strong>
                        </span>
                    @endif

                    <div class="form-group">
                        <label class="control-label col-md-4"> Product Description </label>
                        <div class="col-md-8">
                            <textarea name="description" id="" rows="5" class="form-control">{{$product->description}}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong style="color:red;">
                                        {{ $errors->first('description') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn green-seagreen pull-right"> Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>



@endsection