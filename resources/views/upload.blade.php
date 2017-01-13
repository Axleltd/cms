@extends('layouts.app')

@section('content')

	<form action="{{ url('/upload')}}" method="POST" enctype="multipart/form-data">
		<input type="hidden"  name="_token" value="{{ csrf_token()}}">
		<input type="hidden"  name="_method" value="post">
		<input type="file" name="image" id="image">
		<input type="submit" value="Submit">
	</form>
@stop