@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-sm-4">
		<img src="{{$pelicula['poster']}}" width="350px" height="500px">
	</div>
	<div class="col-sm-8">
		<h4>{{$pelicula->title}}</h4>
		<h5><b>Director: </b>{{$pelicula->director}}</h5>
		<p><b>Año: </b>{{$pelicula->director}}<p>
		<p><b>Sinopsis: </b>{{$pelicula->synopsis}}</p>
		@if($pelicula->rented)
			<p><b>Estado: </b>La pelicula se encuentra alquilada</p>
			<form action="{{action('CatalogController@putReturn', $pelicula->id)}}" 
    method="POST" style="display:inline">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger" style="display:inline">
	Devolver película
    </button>
</form>
		@else
			<form action="{{action('CatalogController@putRent', $pelicula->id)}}"
    method="POST" style="display:inline">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-success" style="display:inline">
        Alquilar película
    </button>
</form>
		@endif
		<a href="/LARAVEL/videoclub/public/catalog/edit/{{$pelicula->id}}" class="btn btn-warning">Editar Pelicula</a>
<form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}"
    method="POST" style="display:inline">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger" style="display:inline">
        Borrar película
    </button>
</form>
		<a href="/LARAVEL/videoclub/public/catalog/" class="btn btn-light">Volver</a>
	</div>
</div>
@endsection
