@extends('templates.admin')

@section('content')
	<h1>Add New Location</h1>
	{!! Form::model(null, array('route' => array('api.v1.location.store'), 'class' => 'uk-form'), null) !!}
		@include('location.form')
	{!! Form::close() !!}
@endsection

@section('sidebar')
	<ul class="uk-nav uk-nav-side">
    	<li><a href="#">View All</a></li>
    	<li class="uk-active"><a href="#">Add New</a></li>
	</ul>
@endsection