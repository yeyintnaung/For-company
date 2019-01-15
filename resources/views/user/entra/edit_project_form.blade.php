@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
        
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title page_title">
                Edit Your project <br>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->


            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        Hi {{Auth::user()->name}} You can edit your Projects , Tender and Third party
                        announcement in this Page!

                    </div>

                </div>
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="note note-success">
                        <h4 class="block">Successful</h4>

                        <p> Your form was successfully {{\Illuminate\Support\Facades\Session::get('success')}}

                        </p>
                    </div>
                @endif
                <div class="porlet-body" style="padding: 20px;">

                    <form action="{{url('entra/edit_project/'.$data->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 input-title control-label">
                                    Project Name
                                </label>

                                <div class="col-md-8">
                                    <input type="text" name="name" data-required="1" value="{{$data->name}}"
                                        class="form-control" required/>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                @endif

                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-4 input-title control-label">
                                    Description
                                </label>

                                <div class="col-md-8">
                                    <textarea class="wysihtml5 form-control" rows="6" name="description" data-error-container="#editor1_error" required>{{$data->description}}</textarea>
                                </div>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                             </span>
                                @endif

                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group {{ $errors->has('attachment1') ? ' has-error' : '' }}">
                                <label class="col-md-4 input-title control-label">
                                    Attachment 1
                                </label>

                                <div class="col-md-8">
                                    <input type="file" name='attachment1'  id="exampleInputFile1" />
                                </div>

                                    @if ($errors->has('attachment1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('attachment1') }}</strong>
                                             </span>
                                @endif
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group {{ $errors->has('business_hub_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 input-title control-label">
                                    Audience Industries
                                </label>

                                <div class="col-md-8">
                                    <select class="form-control select2me" name="business_hub_id" required>
                                        <?php
                                            $selected=DB::table('business_group')->where('id',$data->business_hub_id)->first();
                                            ?>
                                            <option value="{{$selected->id}}" style="word-wrap:break-word" selected>{{$selected->name}}</option>

                                        <?php
                                        $bh = \Illuminate\Support\Facades\DB::table('business_hub')->get();
                                        ?>
                                        @foreach ($bh as $b)
                                            <option value="{{$b->id}}" style="word-wrap:break-word">{{$b->description}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('business_hub_id'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('business_hub_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="clearfix"></div>

                            <input type="hidden" name="id" value="{{$data->id}}"/>
                            <div class="form-group {{ $errors->has('expire_date') ? ' has-error' : '' }}">
                                <label class="col-md-4 input-title control-label">Project Expire Date

                                </label>

                                <div class="col-md-8">
                                    <input type="date" name="expire_date" data-required="1" value="{{$data->expire_date}}"
                                        class="form-control" required/>
                                </div>
                                @if ($errors->has('expire_date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('expire_date') }}</strong>
                                             </span>
                                @endif

                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" id="pub" name="publish" value=""/>
                                        <button type="submit" onclick='pubs(1)' class="btn btn-lg green">Save And Published
                                        </button>
                                        <button type="submit" onclick='pubs(2)' class="btn btn-lg green" >Save
                                        </button>
                                        <script>
                                            function pubs(p){
                                                if(p == 1){
                                                    document.getElementById('pub').value=1;

                                                }
                                                else{
                                                    document.getElementById('pub').value=0;

                                                }


                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>

                    </form>

                    <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>


        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>


@endsection
