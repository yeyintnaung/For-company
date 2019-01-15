@extends('layouts.dashboard')

@section('content')
@section('title')
    Add price
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection

<!-- BEGIN SIDEBAR -->

<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->


<div class="col-xs-12" style="background-color:white;padding-bottom:22px;">
    <div class="col-sm-12">
        <div class="row">
            <h3 style="font-weight:bolder;color:#345884;">For Interior Decoration</h3>
            <br></br>
        </div>
        <form action='{{url('entra/price')}}' enctype="multipart/form-data" role="form"
              method="post">
            {{csrf_field()}}
            {{--get second work name --}}
            @php
                $second_work=DB::connection('mysql_service')->table('second_work_type');
            @endphp
            @foreach($second_work->get() as $sw)
                <div class="row">

                    @php
                        $third_work=DB::connection('mysql_service')->table('third_work_type')->where('second_id',$sw->id);
                    @endphp
                    @if($third_work->count()!= 0)

                        <h4 style="color:#32c5d2;font-weight:bold;">{{$sw->name}}</h4>
                        <div class="form-body">


                            @foreach($third_work->get() as $fw)
                                @php
                                    $fourth=\Illuminate\Support\Facades\DB::connection('mysql_service')->table('fourth_work_type')->where('third_work_id',$fw->id);
                                @endphp
                                {{--for fourth work id--}}
                                @if($fourth->count() != 0)
                                    @foreach ($fourth->get() as $f)
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group {{ $errors->has($f->name) ? ' has-error' : '' }}">
                                                <label>{{$fw->name}} {{$f->name}}</label>
                                                <input type='text' class="form-control" name='fur'{{$f->id}}
                                                placeholder="{{$f->name}}" value="{{old($f->name)}}">
                                                @if ($errors->has($f->name))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($f->name)}}</strong>
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach


                                @else
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group {{ $errors->has($fw->name) ? ' has-error' : '' }}">
                                            <label>{{$fw->name}}</label>
                                            <input type='text' class="form-control" name="{{$fw->name}}"
                                                   placeholder="{{$fw->name}}" value="{{old($fw->name)}}">
                                            @if ($errors->has($fw->name))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fw->name)}}</strong>
                                                     </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif


                </div>
            @endforeach
            <input type="submit" name="fff"/>

        </form>

    </div>
</div>


@endsection
