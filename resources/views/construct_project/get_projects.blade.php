@extends('layout.master')
@section('title','News Browse')
@section('content')
    Link  http://www.hivephing.com/entra/construct_projects

    <div class="row">
        <div class="col-lg-3" style="font-weight:bold;">Name</div>
        <div class="col-lg-3" style="font-weight:bold;">Description</div>
        <div class="col-lg-3" style="font-weight:bold;">City</div>
        <div class="col-lg-3" style="font-weight:bold;">Date</div>


    </div>
    <br>
    <br>
    <br>
@foreach($data as $d)


    <div class="row">
        <div class="col-lg-3">{{$d->name}}</div>
        <div class="col-lg-3">{{$d->description}}</div>

        <div class="col-lg-3">
        <?php
                $city=\Illuminate\Support\Facades\DB::table('cities')->where('id',$d->city)->first();
        ?>
            {{$city->name}}
        </div>
        <div class="col-lg-3">{{$d->created_at}}</div>
    </div>
    <br>
    <br>
@endforeach

@endsection
