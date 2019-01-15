@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <h1 class="page-title page_title"> Your business plan detail
            </h1>

            <div class="row">
                <div class="col-md-12" style="border:2px solid #ececec">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class=" bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                            </div>

                        </div>
                        @include('user.entra.alert.balert')

                        <div class="portlet-body">
                            <div class="col-md-12">
                                <div class="form-horizontal">
                                    <div class="form-body">
                                        @if($data->video_url != '')
                                            <div class="form-group ">
                                                <label class="control-label col-md-3"> video
                                                    <span class="required"> * </span> </label>
                                                <div class="col-md-4">
                                                    <video width="400" controls>
                                                        <source src="{{asset('users/entro/video/'.$data->video_url)}}"
                                                                type="video/mp4">
                                                    </video>

                                                </div>

                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Title

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->title}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Product/Services Industry 1

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    @php
                                                        $business_type1=\Illuminate\Support\Facades\DB::table('business_hub')->where('id',$data->business_hub_id)->first();
                                                    @endphp
                                                    {{$business_type1->description}}
                                                </div>

                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Product/Services Industry 2

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    @php
                                                        $business_type2=\Illuminate\Support\Facades\DB::table('business_group')->where('id',$data->business_group_id)->first();
                                                    @endphp
                                                    {{$business_type2->name}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Product/Services Industry 1

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    @php
                                                        $business_type1=\Illuminate\Support\Facades\DB::table('business_hub')->where('id',$data->business_hub_id)->first();
                                                    @endphp
                                                    {{$business_type1->description}}
                                                </div>

                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Stage of your Product/Services

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->stage_of_product}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">product/services's detail

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->description}}
                                                </div>

                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Your Target Customer

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->target_customer}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Market Value

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->market_value}}
                                                </div>

                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Competitor Description

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->competitor_des}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Your position in Company

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->user_position}}
                                                </div>

                                            </div>
                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Founder of Company

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->founders}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Background of your founder

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->background_founders}}
                                                </div>

                                            </div>

                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Employees count of your company

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->count_employees}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Background of your employees

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->background_employees}}
                                                </div>

                                            </div>

                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Country

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    @php
                                                        $country=DB::table('countries')->where('id',$data->country_id)->first();
                                                    @endphp
                                                    {{$country->name}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Count of Your looking investments

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->looking_investment}}
                                                </div>

                                            </div>

                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Offering Sharer

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->sharer}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Your company's monthly revenues

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->monthly_revenues}}
                                                </div>

                                            </div>

                                        </div>
                                        &nbsp;
                                        <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12"> Your company's monthly expenses

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->monthly_expenses}}
                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12">Business Created Date </label>
                                                <div class="col-md-12 input-title">
                                                    {{$data->created_at}}
                                                </div>

                                            </div>

                                        </div>
                                            &nbsp;
                                            &nbsp;
                                            &nbsp;

                                            <div class="row">
                                            <div class="col-md-1">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-5">
                                                <label class="detail-title col-md-12"> Like Count

                                                </label>
                                                <div class="col-md-12 input-title">
                                                    <span class="label label-sm label-danger circle"> {{$data->like_count}}</span>

                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <form method='get' action="{{url('entra/see_who_like')}}" class="form-horizontal">
                                                    <div class="form-body">

                                                        <div class="form-group ">

                                                            <div class="col-sm-10 col-md-10">
                                                                <label class="input-title">See Investors Who liked your plan

                                                                </label>
                                                                <?php
                                                                $visitor_id_array = explode(',', $data->visitor_id);
                                                                ?>
                                                                <select class="form-control select2me" name="inves" required>
                                                                    @foreach ($visitor_id_array as $v)
                                                                        @if($v != 0)

                                                                            <option value="{{$v}}">
                                                                                <?php
                                                                                $vd = \Illuminate\Support\Facades\DB::table('investor')->where('user_id', $v)->first();
                                                                                ?>{{$vd->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2">
                                                                <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                                                <button type="submit" class="btn btn-success"
                                                                > See <i class="fa fa-search"></i>

                                                                </button>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </form>


                                            </div>

                                        </div>
                                           <?php
                                                $com_data=\Illuminate\Support\Facades\DB::table('company')->where('user_id',Auth::user()->id)->count();
                                            ?>
                                        @if((Auth::user()->type == 1 or Auth::user()->type == 2) and ($com_data > 0))
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button class="btn btn-success"
                                                                onclick="go('{{url('business_plan_edit/'.$data->id)}}')">
                                                            Edit
                                                        </button>
                                                        <button class="btn btn-danger" onclick="delete_record({{$data->id}});">
                                                            Delete
                                                        </button>
                                                    </div>
                                                    <script>
                                                        function delete_record(id) {
                                                            var del = window.confirm("Are you sure to delete this record?");
                                                            if (del == true) {
                                                                window.location.assign("{{url('business_plan_delete')}}" + '/' + id);
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-4" style="margin-top:2px;">


                            </div>
                            <!-- END FORM-->
                        </div>

                        <!-- END VALIDATION STATES-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
    <script>
        function go(link) {
            window.location.assign(link);
        }
        ;
    </script>


@endsection
