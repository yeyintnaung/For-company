@extends('layout.master')
@section('title','News Browse')
@section('content')

    <form enctype='multipart/form-data' method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-md-3">
                <label for="title">Email</label>
            </div>
            <div class="col-md-8">
                <?php
                $emails = DB::table('users')->orderBy('email','asc')->get();
                ?>
                <select class="form-control" name="user_id">

                    @foreach($emails as $email)
                        <option value="{{$email->id}}">{{$email->email}}</option>

                    @endforeach
                </select>


            </div>

        </div>

        <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;</div>


        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">User Type</label>
            </div>
            <div class="col-md-8">

            <select class="form-control" name="user_type">

                    <option value="1">Company</option>
                    <option value="2">Investor</option>


            </select>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Plan Type</label>
            </div>
            <div class="col-md-8">

            <select class="form-control" name="plan_type">

                <option value="1" selected>A</option>
                <option value="2">B</option>
                <option value="3">C</option>


            </select>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Start Date</label>
            </div>
            <div class="col-md-8">

            <input type="datetime-local"  class="form-control" name="start_date" />
            </div>

        </div>
        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Duration Month</label>
            </div>
            <div class="col-md-8">

                <input type="number"  class="form-control" name="duration_month" />
            </div>

        </div>

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">View Project</label>
            </div>
            <div class="col-md-8">
            <input type="number" class="form-control" name="view_project" required/>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Create Project</label>
            </div>
            <div class="col-md-8">

            <input type="number"  class="form-control" name="create_project" required/>
            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Create Business Plans</label>
            </div>
            <div class="col-md-8">

            <input type="number" class="form-control" name="create_business_plan" required/>
            </div>

        </div>
        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
    </form>
    <hr style="font-size=12px;">
@endsection
