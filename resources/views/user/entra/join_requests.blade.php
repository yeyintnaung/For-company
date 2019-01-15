@extends('layouts.dashboard')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark">Asssociation Request Message</i>
                            </div>


                        </div>
                        @if(\Illuminate\Support\Facades\Session::has('request'))
                            <div class="note note-success">
                                <h4 class="block">Successful</h4>

                                <p> {{\Illuminate\Support\Facades\Session::get('request')}}

                                </p>
                            </div>
                        @endif

                        <div class="row">

                            @php
                            $chek_already_hv=DB::table('request_tojoin')->where([['user_id','=',Auth::user()->id],['asso_id','=',$data->id],['confirm','=','no']])->count();
                            @endphp
                            @if($chek_already_hv == 0)
                                <div class="c-contact"
                                     style="padding:18px; border:2px solid #67809F;background-color:#67809F;">
                                    <div class="caption">
                                        <h3 class="" style="color:white;">Send request message to {{$data->name}}</h3>
                                        <p class="c-font-lowercase" style="color:#c1c1c1;">Our helpline is always open
                                            to receive any inquiry or feedback. Please feel free to drop us an email
                                            from the form below and we will get back to you as soon as we can.</p>
                                    </div>
                                    <form action="{{url('entra/asso_request')}}" method="post"
                                          class="form-horizontal">
                                        {{csrf_field()}}
                                        <input type="hidden" placeholder="Your Name" name="user_id"
                                               value="{{Auth::user()->id}}" class="form-control input-md">
                                        @php
                                        $com=DB::table('company')->where('user_id',Auth::user()->id)->first();
                                        @endphp
                                        <input type="hidden" placeholder="Your Name" name="com_id" value="{{$com->id}}"
                                               class="form-control input-md">
                                        <input type="hidden" placeholder="Your Email" name="asso_user"
                                               value="{{$data->user_id}}" class="form-control input-md">
                                        <input type="hidden" placeholder="Your Email" name="asso_id"
                                               value="{{$data->id}}"
                                               class="form-control input-md">


                                        <div class="form-group {{ $errors->has('request_message') ? ' red ' : '' }}">
                                            <textarea rows="8" name="request_message"
                                                      placeholder="Write comment here ..."
                                                      class="form-control input-md"></textarea>
                                        </div>
                                        @if ($errors->has('request_message'))
                                            <span class="help-block" style="color:red;">
                                                    <strong>{{ $errors->first('request_message') }}</strong>
                                                     </span>
                                        @endif
                                        <button type="submit" class="btn grey">Request</button>
                                    </form>
                                </div>
                            @else
                                <div class="note note-success">
                                    <h4 class="block">Noti</h4>

                                    <p> Please wait response from association

                                    </p>
                                </div>
                            @endif


                        </div>
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
    <!-- BEGIN QUICK NAV -->



@endsection
