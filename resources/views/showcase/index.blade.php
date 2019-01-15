@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">

            <h1 class="page-title page_title">

                Add Your Product
                <a href="show_case/add"> <button type="submit" class="btn green-seagreen pull-right"> <i class="fa fa-plus"></i> Add </button> </a>

            </h1>


            @if(sizeof($products) == 0)

                    <h3 class="alert alert-info" align="center"> No porduct doesn't have in your showcase. </h3>
            @else

                @if(session('add'))

                    <div class="alert alert-success">
                        {{session('add')}}
                    </div>
                @endif

                @if(session('delete'))

                    <div class="alert alert-danger">
                        {{session('delete')}}
                    </div>
                @endif

                @if(session('update'))

                    <div class="alert alert-info">
                        {{session('update')}}
                    </div>
                @endif

                <div style="background-color: white;
                            border: 2px solid #e4e0e0; padding: 20px;">

                    <!-- BEGIN: Actions -->
                    <div class="row">

                        @foreach($products as $product)

                            @if($product->user_id == Auth::user()->id)

                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                    <!-- BEGIN Portlet PORTLET-->
                                    <div class="portlet box green">

                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>{{$product->name}} </div>

                                                <div class="tools">
                                                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                                </div>

                                                <div class="actions">
                                                    <a href="show_case/edit/{{$product->id}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <a href="show_case/delete/{{$product->id}}" class="btn btn-default btn-sm">
                                                        <i class="fa fa-trash-o"></i> Delete
                                                    </a>
                                                </div>
                                        </div>

                                        <div class="portlet-body">
                                            <div style="overflow:auto;height:300px;">

                                                <strong>{{$product->name}}</strong>

                                                <div class="clearfix"></div>

                                                <img src="{{asset('upload/'.$product->photo)}}" width="155" height="150" style=" vertical-align: text-top;float:left;margin:9px;">

                                                <div class="clearfix"> </div>

                                                {!!$product->description!!}

                                            </div>

                                            <strong style="color:#67809f;">Start Date:{{\Carbon\Carbon::parse($product->start_date)->toDateString()}} </strong>

                                        </div>

                                    </div>

                                </div>
                                    <!-- END Portlet PORTLET-->
                            @endif

                        @endforeach


                    </div>

                    <div class="row">
                        <div class="col-md-12 pull-right">

                                {{$products->links()}}


                        </div>
                    </div>
                </div>
                    <!-- END: Actions -->
                </div>


            @endif

        </div>
    </div>

@endsection
