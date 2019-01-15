@extends('layouts.dashboard')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <h1 class="page-title page_title">
                Received Message
            </h1>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <strong class="" style="font-weight:bold;">  Message from:
                                @if($data->from_type == 'c')
                                        <?php
                                        $com = DB::table('company')->where('user_id', $data->from_user)->first();
                                        ?>
                                        {{$com->name}}
                                        <span class="label label-sm label-warning">Company</span>
                                    @elseif($data->from_type == 'i')
                                        <?php
                                        $com = DB::table('investor')->where('user_id', $data->from_user)->first();
                                        ?>
                                        {{$com->name}}
                                        <span class="label label-sm label-info">Investor</span>
                                    @else
                                        <?php
                                        $com = DB::table('association')->where('user_id', $data->from_user)->first();
                                        ?>
                                        {{$com->name}}
                                        <span class="label label-sm label-success">Association</span>
                                 @endif
                            </div>



                        </div>
                        @include('user.entra.alert.balert')


                        <div class="c-contact" style="padding:18px; border:2px solid #67809F;background-color:#67809F;">
                            <div class="caption" >

                                <h4><strong style="color:white;">{{$data->title}}</strong></h4>
                                <strong><p  class="c-font-lowercase" style="color:#c1c1c1;text-indent: 12px;">{{$data->subject}}</p></strong>
                                <h5 class="" style="color:white;float:left;">Date: {{$data->created_at}}  </h5> &nbsp;   &nbsp;   &nbsp;     <button type="button" class="btn green-meadow" onclick="reply('{{url('entra/reply_message/'.$data->from_user)}}')"><span class="fa fa-reply">&nbsp;</span>Reply</button>

                                <script>
                                    function reply(re){
                                        window.location.assign(re);

                                    }
                                </script>

                            </div>

                        </div>


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

