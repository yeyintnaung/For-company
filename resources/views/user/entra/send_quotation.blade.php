@extends('layouts.dashboard')
@section('content')
    <!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
    Project Detail
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

<div class="col-xs-12" style="background-color:white;padding-bottom:22px;">


    <h3 style="color:#32c5d2;font-weight:bolder;">To Send Your Quotation</h3>

    <div class="row">
        <div class="form-body">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                    <input type="file" name='quotation' id="exampleInputFile1">
                    @if ($errors->has('quotation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('quotation') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="submit" class="btn" name="Send"/>
            </div>
        </div>
    </div>
</div>

@endsection