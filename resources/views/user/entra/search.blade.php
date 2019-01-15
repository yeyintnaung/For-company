@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title page_title">Search
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                            </div>

                        </div>
                        @include('user.entra.alert.balert')

                        <div class="row">
                            <div class="col-md-6">
                                <form method='post' action="{{url('entra/search')}}" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="col-md-12"><strong>Type the name you want to search</strong></div>

                                    <div class="col-md-8">

                                        <input type="text" class="form-control" name='name' placeholder="Type Name....">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-success"
                                                value="Search"/>
                                    </div>
                                    <div class="col-md-12 form-md-radios ">
                                        <label for="form_control_1"></label>
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_6" name="type" value="com" class="md-radiobtn">
                                                <label for="checkbox2_6"> <span class="inc"></span>
                                                    <span class="check"></span> <span class="box"></span> Company or
                                                    association </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="checkbox2_7" name="type" value="inves" class="md-radiobtn" checked="">
                                                <label for="checkbox2_7"> <span class="inc"></span>
                                                    <span class="check"></span> <span class="box"></span>
                                                    Investor</label>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="col-md-6">
                                <form method='post' action="{{url('entra/adv_search')}}" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="col-md-12"><strong>Advance Search</strong></div>

                                    <div class="col-md-8">

                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('business_hub_id') ? ' has-error' : '' }}">
                                                <label class="input-title">Business Industries

                                                </label> <select class="form-control select2me" name="business_hub_id" required>
                                                    <?php
                                                    $bh = \Illuminate\Support\Facades\DB::table('business_hub')->get();
                                                    ?>
                                                    @foreach ($bh as $b)
                                                        <option value="{{$b->id}}" style="word-wrap:break-word">{{$b->description}}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('business_hub_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('business_hub_id') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="font-weight:bold;color:#888;">Country </label>
                                            <select class="form-control" id="country" name="country_id">
                                                <?php
                                                $bcc = \Illuminate\Support\Facades\DB::table('countries')->get();

                                                ?>
                                                @foreach ($bcc as $bc)
                                                    <option value="{{$bc->id}}"
                                                            style="word-wrap:break-word">{{$bc->name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                        <label class="input-title">City/State? </label>

                                        <select class="form-control " id="cities" name="city_id" required>
                                            <?php
                                            $states = DB::table('states')->where('country_id', 1)->get();
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

                                        @if ($errors->has('city_id'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('city_id') }}</strong>
                                                     </span>
                                        @endif
                                    </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="float:left;">
                                        <input type="submit" class="btn btn-success"
                                                value="Search"/>
                                    </div>


                                </form>
                            </div>

                        </div>

                        <table class="table table-bordered table-hover">
                            @foreach($results as $result)

                                <tr>
                                        <td> {{ $result->id }} </td>
                                        <td> {{ $result->name }} </td>
                                </tr>
                            @endforeach

                        </table>


                    @include('user.entra.alert.alert')

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
