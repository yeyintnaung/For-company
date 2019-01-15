@extends('layout.master')
@section('title','Update Free Plan')
@section('content')

    <h3> Edit Free Plan </h3>
    <div class="col-md-8 col-md-offset-2">
        <form enctype='multipart/form-data' action="{{url('companies/add_plan')}}" method="post"
              class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <div class="col-md-4">
                    <label for="amount" class="control-label"> Company Name </label>
                </div>

                <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$data->name}}" style="color:red;"/>
                </div>
                @if($noti != 0)
                <div class="col-md-4">
                    <label for="amount" class="control-label"> Remaining free plan </label>
                </div>

                <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$remain_free_plan_point->increase_point}}" style="color:red;"/>
                </div>
                @endif


                <div class="col-md-4">
                    <label for="sel1">Select list:</label>
                </div>
                <div class="col-md-8">
                    <?php
                    $pdata = \Illuminate\Support\Facades\DB::table('construct_plan')->get();
                    ?>
                    <select class="form-control" name="point" id="sel1">
                        @foreach($pdata as $pd)
                            @if($pd->point > 10000)

                                <option value="{{$pd->id}}">Unlimited</option>
                            @else
                                <option value="{{$pd->id}}">{{$pd->point}}</option>

                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="amount" class="control-label">Addation Points </label>
                </div>

                <div class="col-md-8">
                    <input type="text" class="form-control" name="addation_points" value="0" style="color:red;"/>
                </div>

            </div>


            <input type="hidden" name="id" value="{{$data->id}}"/>
            <button type="submit" class="btn btn-info pull-right">
                <i class="fa fa-edit" aria-hidden="true"></i>
                Add
            </button>
        </form>

        <hr style="font-size:12px;">

    </div>
@endsection
