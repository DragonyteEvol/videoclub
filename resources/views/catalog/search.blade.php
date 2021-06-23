@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		@foreach($data as $movie)
		<div class="col-3 my-2 p-1 " style="border: solid #f1f1f1 2px;border-radius: 5px;">
			<a href="{{route('showMovie',$movie['imdbID'])}}"><img src='{{$movie["Poster"]}}' width="100%" height="200px" style="border-radius: 5px;"></a>
			<a href="{{route('showMovie',$movie['imdbID'])}}"><h4 style="text-align: center;"><b>{{$movie["Title"]}}</b></h4></a>
			<h5 class="text-muted mx-auto" style="text-align: center;">{{$movie["Year"]}}</h5>
		</div>
		@endforeach
	</div>
</div>
@endsection
