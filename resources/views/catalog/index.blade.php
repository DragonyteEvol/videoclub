@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		@foreach($movies as $movie)
		<div class="col-3 my-2 p-1 " style="border: solid #f1f1f1 2px;border-radius: 5px;">
			<a href="{{route('showMovieC',$movie->id)}}"><img src='{{$movie->poster}}' width="100%" height="200px" style="border-radius: 5px;"></a>
			<a href="{{route('showMovieC',$movie->id)}}"><h4 style="text-align: center;"><b>{{$movie->title}}</b></h4></a>
			<h5 class="text-muted mx-auto" style="text-align: center;">{{$movie->year}}</h5>
		</div>
		@endforeach
	</div>
</div>
@endsection
