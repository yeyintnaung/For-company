@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">

            <h1 class="page-title page_title"> Add Your Product </h1>

            <div class="imageupload col-md-8 col-md-offset-2">

                <form action="{{url('show_case/add')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="control-label col-md-4"> Product Name </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" required="required">
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
                        <div class="">
                            <label class="control-label col-md-4">Product Photo</label>

                            <div class="col-md-8">
                                {{--<label for="" class="btn btn-default btn-file">--}}
                                    {{--<span>Browse</span>--}}
                                    {{--<input type="file" name="image-file">--}}
                                {{--</label>--}}
                                {{--<input type="file" name="image-file">--}}

                                <div class="wrap">
                                    <div class="drop">
                                        <div class="uploader">
                                            <label class="drop-label">Drag and drop images here</label>
                                            <input type="file" class="image-upload" id="photo" name="photo" accept="image/*" multiple required>
                                        </div>
                                        <div id="image-preview"></div>
                                    </div>
                                </div>
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong style="color:red;">
                                            {{ $errors->first('photo') }}
                                        </strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="form-group file-tab">
                        <label class="control-label col-md-4"> Product Description </label>
                        <div class="col-md-8">
                            <textarea name="description" id="" rows="5" class="form-control" required="required"></textarea>
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
                        <input type="submit" class="btn green-seagreen pull-right">
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection