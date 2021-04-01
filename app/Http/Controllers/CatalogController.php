<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

	public function getIndex(){
		$peliculas=Movie::all();
		return view('catalog.index')->with('peliculas',$peliculas);
	}

	public function getShow($id){
		$pelicula = Movie::findOrFail($id);
		return view('catalog.show')->with('pelicula',$pelicula);
	}

	public function getCreate(){
		return view('catalog.create');
	}

	public function getEdit($id){
		$pelicula = Movie::findOrFail($id);
		return view('catalog.edit')->with('pelicula',$pelicula);
	}

	public function postCreate(Request $request){
		Movie::create($request->all());
		return redirect('/catalog');
	}

	public function putEdit(Request $request,$id){
		$pelicula= Movie::findOrFail($id);
		$pelicula->title=$request->title;
		$pelicula->year=$request->year;
		$pelicula->director=$request->director;
		$pelicula->poster=$request->poster;
		$pelicula->synopsis=$request->synopsis;
		$pelicula->save();
		return redirect('/catalog');
	}
}
