@extends(preg_match('/inves/',url()->current()) ? 'layouts.inves_layouts.dashboard' : 'layouts.dashboard');


@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">

            <h1 class="page-title page_title">

                Products

            </h1>

            @if(sizeof($products) == 0)

                <h3 class="alert alert-info" align="center"> No porduct doesn't have in their showcase. </h3>
            @else

                <div style="background-color: white;
                            border: 2px solid #e4e0e0; padding: 20px;" height="250px">

                    <!-- BEGIN: Actions -->
                    <div class="row">

                        @foreach($products as $product)

                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                <!-- BEGIN Portlet PORTLET-->
                                <div class="portlet box green">

                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>{{$product->name}}
                                        </div>

                                        <div class="tools">
                                            <a href="" class="fullscreen" data-original-title="" title=""> </a>
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                                        <div style="overflow: auto; height: 300px;">

                                            <strong>{{$product->name}}</strong>

                                            <div class="clearfix"></div>

                                            <img src="{{asset('upload/'.$product->photo)}}" width="152"
                                                    style=" vertical-align: text-top;float:left;margin:9px;">

                                            <div class="clearfix"></div>

                                            {!!$product->description!!}

                                        </div>

                                        <strong style="color:#67809f;">Start Date:{{\Carbon\Carbon::parse($product->start_date)->toDateString()}} </strong>



                                    </div>

                                </div>

                            </div>
                            <!-- END Portlet PORTLET-->

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
