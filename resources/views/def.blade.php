@extends('layout.master')
@section('title','News Browse')
@section('content')
@if(sizeof($news)==0)



<h4 class="alert alert-info">There is no data currently</h4>

@else

<h4>Hi there</h4>

@endif

<br><br>

<a href="#" class="btn btn-info pull-right"> Upload New City </a>

@endsection
