@extends('layout.master')
@section('title','Projects')
@section('content')
    <style>
        .navbar1 {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar1 a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown1 {
            float: left;
            overflow: hidden;
        }

        .dropdown1 .dropbtn1 {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar1 a:hover, .dropdown1:hover .dropbtn1 {
            background-color: darkgrey;
        }

        .dropdown-content1 {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content1 a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content1 a:hover {
            background-color: #ddd;
        }

        .dropdown1:hover .dropdown-content1 {
            display: block;
        }
        /*Link*/
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: darkslategray;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 20px;
            padding: 10px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
        /*heading*/
        h1{
            color: darkslategray;
        }

        /*table*/
         table {
             font-family: arial, sans-serif;
             border-collapse: collapse;
             width: 100%;
         }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <?php
    $data = DB::connection('mysql_service')
        ->table('for_repair')
        ->orderBy('id','desc')
        ->get();
    ?>

    @if(sizeof($data)==0)
        <h4 class="alert alert-info">There is no data currently</h4>
    @else
        <h1>
            Total Number of Projects : {{count($data)}}
            <a href="{{ url('/dashboard') }}" class="button" style="vertical-align:middle"><span>Back </span></a>
        </h1>
        <div class="navbar1">
            <a href="{{url('show_all_projects')}}">Show All Projects</a>
            <div class="dropdown1">
                <button class="dropbtn1">By Months
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content1">
                    <a href="{{url('projects/months/01')}}">January</a>
                    <a href="{{url('projects/months/02')}}">February</a>
                    <a href="{{url('projects/months/03')}}">March</a>
                    <a href="{{url('projects/months/04')}}">April</a>
                    <a href="{{url('projects/months/05')}}">May</a>
                    <a href="{{url('projects/months/06')}}">June</a>
                    <a href="{{url('projects/months/07')}}">July</a>
                    <a href="{{url('projects/months/08')}}">August</a>
                    <a href="{{url('projects/months/09')}}">September</a>
                    <a href="{{url('projects/months/10')}}">October</a>
                    <a href="{{url('projects/months/11')}}">November</a>
                    <a href="{{url('projects/months/12')}}">December</a>
                </div>
            </div>
           </div>
        <div>
            <table>
                <tr>
                    <th>Post ID.</th>
                    <th>User ID.</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th></th>

                </tr>
                <?php
                $i=0;
                foreach($data as $a)
                {
                 ?>
                <tr>
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->user_id }}</td>
                    <td>{{ $a->name }}</td>
                    <td>{{ $a->phone }}</td>
                    <td>{{ $a->city }}</td>
                    <td><a href="show_detail/{{$a->id}}" class="btn btn-info">
                            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                            Detail
                        </a>
                    </td>

                </tr>
                <?php
                }
                ?>
            </table>


    @endif

@endsection

