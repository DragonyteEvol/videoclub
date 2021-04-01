<?php

namespace App\Http\Controllers;

use App\Movie;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

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

	public function putRent($id){
		$movie= Movie::findOrFail($id);
		$movie->rented=true;
		$movie->save();
		return redirect('/catalog/show/' . $id);
	}

	public function putReturn($id){
		$movie= Movie::findOrFail($id);
		$movie->rented=false;
		$movie->save();
		return redirect('/catalog/show/' . $id);
	}

	public function deleteMovie($id){
		$movie = Movie::findOrFail($id);
		$movie->delete();
		return redirect('catalog');
	}
}
