@extends('layouts.master')

@section('content')
<div class="row" style="margin-top:40px">
	<div class="offset-md-3 col-md-6">
		<div class="card">
			<div class="card-header text-center">
			Edit Movie
			</div>
			<div class="card-body" style="padding:30px">
				<form method="POST">
					@method('PUT')
					{{csrf_field()}}
					<div class="form-group">
						<label class="form-label" for="title">Title</label>
						<input type="text" name="title" id="title" class="form-control" value="{{$pelicula->title}}">
					</div>

					<div class="form-group">
						<label class="form-label">Year</label>
						<input type="number" name="year" value="{{$pelicula->year}}" class="form-control">
					</div>

					<div class="form-group">
						<label class="form-label">Director</label>
						<input type="text" name="director" value="{{$pelicula->director}}"  class="form-control">
					</div>

					<div class="form-group">
						<label class="form-label">Poster</label>
						<input type="text" name="poster" value="{{$pelicula->poster}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="synopsis">Plot</label>
						<textarea name="synopsis" id="synopsis" class="form-control"  rows="3">{{$pelicula->synopsis}}</textarea>
					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary form-control" style="padding:8px 100px;margin-top:25px;">
						Edit
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection
