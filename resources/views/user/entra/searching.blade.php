@extends('layouts.dashboard')

@section('content')

    <div class="page-content-wrapper">
        <div class="page-content">
            <h1 class="page-title page_title">Search
            </h1>

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

                            <div class="col-md-6 col-md-offset-3">
                                {{--<form method='post' action="{{url('entra/searching')}}" class="form-horizontal">--}}
                                    {{--{{csrf_field()}}--}}
                                    <div class="col-md-12"><strong>Type the name you want to search</strong></div>

                                    <div class="col-md-8">
                                        <input type="text" id="search_name" class="form-control" name='search_name' placeholder="Type Name and press Enter ....">
                                    </div>


                                    {{--<div class="col-md-4">--}}
                                        {{--<input type="submit" id="search" class="btn btn-success"  value="Search"/>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-md-12 form-md-radio">--}}

                                        {{--<div class="md-radio-inline">--}}

                                            {{--<div class="md-radio">--}}
                                                {{--<input type="radio" id="com" name="type" value="com" class="md-radiobtn">--}}
                                                {{--<label for="com">--}}
                                                    {{--<span class="inc"></span>--}}
                                                    {{--<span class="check"></span>--}}
                                                    {{--<span class="box"></span>--}}
                                                    {{--Company or association--}}
                                                {{--</label>--}}
                                            {{--</div>--}}


                                            {{--<div class="md-radio">--}}
                                                {{--<input type="radio" id="inves" name="type" value="inves" class="md-radiobtn" checked="">--}}
                                                {{--<label for="inves">--}}
                                                    {{--<span class="inc"></span>--}}
                                                    {{--<span class="check"></span>--}}
                                                    {{--<span class="box"></span>--}}
                                                    {{--Investor--}}
                                                {{--</label>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</form>--}}
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        {{--<div id="results">--}}
                            {{--<table class="table table-bordered">--}}
                                {{--<tr>--}}
                                    {{--<td><input type="text" id="id" name="id"></td>--}}

                                    {{--<td><input type="text" id="name" name="name"> </td>--}}

                                    {{--<td> <a href="{{ '#view' }}" type="submit" class="btn green" name="view" id="view"> View </a> </td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}
                        {{--</div>--}}


                        <div id="">
                            <table class="table table-bordered">
                                <tr>
                                    <td><input type="text" name="results" id="results"> </td>
                                </tr>
                            </table>
                        </div>

                    @include('user.entra.alert.alert')

                    <!-- END VALIDATION STATES-->
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">--}}

    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>--}}

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script>
        $('#search_name').autocomplete({
                source : "{!! URL::route('searching') !!}",
                minlength : 1,
                autoFocus:true,
                select:function(e,ui)
                {
//                    $("#id").val(ui.item.id);
//                    $("#name").val(ui.item.value);
//                    $("search_name").val(ui.item.name);
//                    $("view").val(ui.item.href);

                    $('results').val(ui.item.results,id);
                },
//                select:function (data) {
//                    var table[];
//                    table = '<table>';
//
//                    table .= '<tr> <td>'+data[id]+'</td>';
//
//                    table .= '<td>'+data[name]+'</td>';
//
//                    table .= '<td> <a href="other_com_detail/"'+data[id]+'</a> s</td>';
//
//                    table .=  '</tr>';
//
//                    table .= '</table>';
//
//                    return table;
//
//                }
            });

//        $(function()
//        {
//            $( "#search" ).autocomplete(
//                {
//                    url: "search",
//                    dataType: "jsonp",
//                    type: 'GET',
//                    minLength: 2,
//                    select: function( e, ui )
//                    {
//                        $("#name").val(ui.item.name);
//                    }
//                });
//        });
    </script>

@endsection