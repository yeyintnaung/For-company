@extends('layout.master')
@section('title','Register Fees')
@section('content')
    <form enctype='multipart/form-data' method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="col-md-3">
                <label for="title">Email</label>
            </div>
            <div class="col-md-8">

                <?php
                $selected_email = DB::table('users')->where('id', $fee->user_id)->first();
                $emails = DB::table('users')->orderBy('email', 'asc')->get();
                ?>

                <select class="form-control" name="user_id">
                    <option value="{{$fee->user_id}}" selected>{{$selected_email->email}}</option>
                    @foreach($emails as $email)
                        <option value="{{$email->id}}">{{$email->email}}</option>

                    @endforeach
                </select>


            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>

            <div id="editor" class="form-group">
                <div class="col-md-3">
                    <label for="title">Amount</label>
                </div>
                <div class="col-md-8">

                    <input type="number" class="form-control" id="title" name="amount" value='{{$fee->amount}}' placeholder="Amount ($)" required/> <br>

                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>

            <div id="editor" class="form-group">
                <div class="col-md-3">
                    <label for="title">Start Date</label>
                </div>
                <div class="col-md-8">

                    <input type="datetime-local" class="form-control" id="title" value="{{\Carbon\Carbon::parse($fee->start_date)->toDateTimeString()}}" name="start_date" /> <br>

                </div>
            </div>

        </div>


        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>


        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-pencil" aria-hidden="true"></i>
            &nbsp Update
        </button>
    </form>
@endsection
