@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
	<div class="offset-md-3 col-md-6">
		<div class="card">
			<div class="card-header text-center">
			Modificar Pelicula	
			</div>
			<div class="card-body" style="padding:30px">
				<form method="POST">
					@method('PUT')
					{{csrf_field()}}
					<div class="form-group">
						<label class="form-label" for="title">Título</label>
						<input type="text" name="title" id="title" class="form-control" value="{{$pelicula->title}}">
					</div>

					<div class="form-group">
						<label class="form-label">Año</label>
						<input type="number" name="year" value="{{$pelicula->year}}">
					</div>

					<div class="form-group">
						<label class="form-label">Director</label>
						<input type="text" name="director" value="{{$pelicula->director}}" >
					</div>

					<div class="form-group">
						<label class="form-label">Poster</label>
						<input type="text" name="poster" value="{{$pelicula->poster}}">
					</div>

					<div class="form-group">
						<label for="synopsis">Resumen</label>
						<textarea name="synopsis" id="synopsis" class="form-control"  rows="3">{{$pelicula->synopsis}}</textarea>
					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
						Modificar Pelicula	
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection
