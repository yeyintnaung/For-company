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
                <a href="{{url('/projects/project/detail/01')}}">January</a>
                <a href="{{url('/projects/project/detail/02')}}">February</a>
                <a href="{{url('/projects/project/detail/03')}}">March</a>
                <a href="{{url('/projects/project/detail/04')}}">April</a>
                <a href="{{url('/projects/project/detail/05')}}">May</a>
                <a href="{{url('/projects/project/detail/06')}}">June</a>
                <a href="{{url('/projects/project/detail/07')}}">July</a>
                <a href="{{url('/projects/project/detail/08')}}">August</a>
                <a href="{{url('/projects/project/detail/09')}}">September</a>
                <a href="{{url('/projects/project/detail/10')}}">October</a>
                <a href="{{url('/projects/project/detail/11')}}">November</a>
                <a href="{{url('/projects/project/detail/12')}}">December</a>
            </div>
        </div>
    </div>
   <table>
            <tr>
                <td>No.</td>
                <td>{{ $detail->id }}</td>
            </tr>
            <tr>
                <td>User ID</td>
                <td>{{ $detail->user_id }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $detail->name }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $detail->phone }}</td>
            </tr>
            <tr>
                <td>fr_type</td>
                <td>{{ $detail->fr_type }}</td>
            </tr>
            <tr>
                <td>Project define point</td>
                <td>{{ $detail->project_define_point }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $detail->address }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $detail->description }}</td>
            </tr>
            <tr>
                <td>Old Description</td>
                <td>{{ $detail->old_description }}</td>
            </tr>
            <tr>
                <td>Old Address</td>
                <td>{{ $detail->old_address }}</td>
            </tr>
            <tr>
                <td>Confirm</td>
                <td>{{ $detail->confirm }}</td>
            </tr>
            <tr>
                <td>Quotation</td>
                <td>{{ $detail->quotation }}</td>
            </tr>
            <tr>
                <td>Quotation Type</td>
                <td>{{ $detail->quotation_type }}</td>
            </tr>
            <tr>
                <td>State</td>
                <td>{{ $detail->state }}</td>
            </tr>
            <tr>
                <td>City</td>
                <td>{{ $detail->city }}</td>
            </tr>
            <tr>
                <td>Full</td>
                <td>{{ $detail->full }}</td>
            </tr>
            <td>Close</td>
                <td>{{ $detail->close }}</td>
            </tr>
            <tr>
                <td>Quotation file</td>
                <td>{{ $detail->quotation_file }}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{ $detail->created_at }}</td>
            </tr>
            <tr>
                <td>Updated at</td>
                <td>{{ $detail->updated_at }}</td>
            </tr>
 </table>
 <?php
 if(count($req_com)==0)
 {
     echo "<hr><h3>There's no requesting company for this project.</h3>";
 }
 else{
  ?>
  <hr> <h3>Requesting companies for this projects</h3>
<table>
    <tr>
        <th>No.</th>
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Requested time</th>
    </tr>
 <?php
    $i=0;
    foreach($req_com as $rc){
        $i++;
        $company = DB::table('company')
                        ->where([['user_id', '=', $rc->requester_id]])
                        ->first(); ;
  ?>      
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
        <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($rc->created_at))->diffForHumans() }}</td>
        </tr>
  <?php    
  //end of loop  
    }  
    //end of else
 }
 ?>
@endsection

