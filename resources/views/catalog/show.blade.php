@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-sm-4">
		<img src="{{$pelicula['poster']}}">
	</div>
	<div class="col-sm-8">
		<h4>{{$pelicula->title}}</h4>
		<h5><b>Director: </b>{{$pelicula->director}}</h5>
		<p><b>Año: </b>{{$pelicula->director}}<p>
		<p><b>Sinopsis: </b>{{$pelicula->synopsis}}</p>
		@if($pelicula->rented)
			<p><b>Estado: </b>La pelicula se encuentra alquilada</p>
			<button class="btn btn-danger">Devolver Pelicula</button>
		@else
			<button class="btn btn-success">Alquilar Pelicula</button>
		@endif
		<a href="/LARAVEL/videoclub/public/catalog/edit/{{$pelicula->id}}" class="btn btn-warning">Editar Pelicula</a>
		<a href="/LARAVEL/videoclub/public/catalog/" class="btn btn-light">Volver</a>
	</div>
</div>
@endsection
