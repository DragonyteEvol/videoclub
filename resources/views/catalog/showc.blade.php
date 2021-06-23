@extends('layouts.master')
@section('title')
MovieClub - Show Movie
@endsection
@section('content')
<div class="container">
	<div class="row p-1 my-3" style="border: solid #f2f2f2 2px;border-radius: 15px;">
		<div class="col-6">
			<img src="{{$movie->poster}}" width="100%" height="500px" style="border-radius: 15px;">
		</div>
		<div class="col-6">
			<h2><b>{{$movie->title}}</b></h2>
			<hr>
			<p><b>Date: </b>{{$movie->year}}</p>
			<p><b>Plot: </b>{{$movie->synopsis}}</p>
			<p><b>Director: </b>{{$movie->director}}</p>
			<p><b>Created_at: </b>{{$movie->created_at}}</p>
			<p class="my-1 {{$movie->rented ? '' : ''}}" style="display: block;">{{$movie->rented ? 'Rented' : 'Available'}}</p>
			@if($movie->rented)
			<form action="{{action('CatalogController@putReturn', $movie->id)}}" 
			      method="POST" style="display:inline">
			      {{ method_field('PUT') }}
			      {{ csrf_field() }}
			      <button type="submit" class="btn btn-danger form-control" style="display:inline">
				      Return Movie
			      </button>
			</form>
			@else
			<form action="{{action('CatalogController@putRentC', $movie->id)}}"
			      method="POST" style="display:inline">
			      {{ method_field('PUT') }}
			      {{ csrf_field() }}
			      <button type="submit" class="btn btn-success form-control" style="display:inline">
				      Rent Movie
			      </button>
			</form>
			@endif
			<a href="{{route('editMovie',$movie->id)}}" class="btn btn-primary form-control">Edit</a>
			<form action="{{action('CatalogController@deleteMovie', $movie->id)}}"
			      method="POST" style="display:inline">
			      {{ method_field('DELETE') }}
			      {{ csrf_field() }}
			      <button type="submit" class="btn btn-danger form-control" style="display:inline">
				      Delete
			      </button>
			</form>
		</div>
	</div>
</div>
@endsection
