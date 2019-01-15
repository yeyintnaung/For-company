@extends('layout.master')
@section('title','News Browse')
@section('content')

    <form enctype='multipart/form-data' action="{{url('get_project')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-md-3">
                <label for="title">Business Type</label>
            </div>
            <div class="col-md-8">
                   <?php
                    $business_type=\Illuminate\Support\Facades\DB::table('business_hub')->get();
                    ?>
                <select class="form-control" name="business_id">
                    @foreach($business_type as $bt)

                        <option value="{{$bt->id}}">{{$bt->description}}</option>

                    @endforeach
                </select>


            </div>

        </div>

        <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;</div>


        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
            <label class="input-title control-label col-md-3">City </label>

            <div class="col-md-8">
                <select class="form-control " id="cities" name="city_id">
                    <?php
                    $states = DB::table('states')->where('country_id', 150)->get();
                    foreach ($states as $s) {
                    $cities = DB::table('cities')->where('state_id', $s->id)->get();
                    ?>
                    @foreach ($cities as $bc)
                        <option value="{{$bc->id}}">{{$bc->name}}</option>

                    @endforeach

                    <?php
                    }
                    ?>
                </select>
            </div>

            @if ($errors->has('city_id'))
                <span class="help-block">
                 <strong>{{ $errors->first('city_id') }}</strong>
                 </span>
            @endif
        </div>

        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
    </form>
    <hr style="font-size:12px;">
@endsection
