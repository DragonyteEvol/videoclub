@extends('layouts.master')
@section('title')
MovieClub - Show Movie
@endsection
@section('content')
<div class="container">
	<div class="row p-1 my-3" style="border: solid #f2f2f2 2px;border-radius: 15px;">
		<div class="col-6">
			<img src="{{$movie['Poster']}}" width="100%" height="500px" style="border-radius: 15px;">
		</div>
		<div class="col-6">
			<h2><b>{{$movie['Title']}}</b></h2>
			<span class="btn btn-success">{{$movie["Ratings"][0]["Value"]}}</span>
			<hr>
			<p><b>Date: </b>{{$movie['Released']}}</p>
			<p><b>Directors and writers: </b>{{$movie['Director'].' '.$movie['Writer']}}</p>
			<p><b>Plot: </b>{{$movie['Plot']}}</p>
			<p><b>Awards: </b>{{$movie["Awards"]}}</p>
			<p><b>Runtime: </b>{{$movie["Runtime"]}}</p>
			@foreach($genres as $genre)
			<span class="badge bg-secondary">{{$genre}}</span>
			@endforeach
			<p class="my-1 {{$rent ? 'btn btn-danger' : 'btn btn-success'}}" style="display: block;">{{$rent ? 'Rented' : 'Available'}}</p>
			<form method="POST" action="{{action('CatalogController@putRent',$movie['imdbID'])}}">
				{{csrf_field()}}
				@method('PUT')
				<input type="submit" class="{{$rent ? 'btn btn-danger' : 'btn btn-success'}} form-control" value="{{$rent ? 'Return Movie' : 'Rent Movie'}}"> 
			</form>
		</div>
	</div>
</div>
@endsection
