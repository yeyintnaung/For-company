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

        <div id="editor" class="form-group">
            <div class="col-md-3">
                <label for="title">Amount</label>
            </div>
            <div class="col-md-8">

                <input type="number" class="form-control" id="title" name="amount" placeholder="Amount ($)" required/> <br>

            </div>
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>





        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
    </form>
    <hr style="font-size=12px;">
@endsection
