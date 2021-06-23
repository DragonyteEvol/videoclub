<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Rent;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class CatalogController extends Controller
{
	protected $key='6e4f2add';
	public function getIndex(){
		$peliculas=Movie::all();
		return view('catalog.index')->with('movies',$peliculas);
	}

	public function getShow($id){
		$url='http://www.omdbapi.com/?i='.$id.'&apikey='.$this->key;
		$data=file_get_contents($url);
		$item=(json_decode($data,true));
		$rent =Rent::where('id_imbd',$id)->get();
		if(count($rent)>0){
			$rent=true;
		}else{
			$rent=false;
		}
		$genres=explode(",",$item["Genre"]);	
		return view('catalog.show')->with('movie',$item)->with('rent',$rent)->with('genres',$genres);
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
		$rent=Rent::where('id_imbd',$id)->get();
		if(count($rent)>0){
			Rent::findOrFail($rent[0]->id)->delete();
			return $this->getShow($id)->with('message','Movie returned');
		}else{
			$new=['id_imbd'=>$id];
			Rent::create($new);
			return $this->getShow($id)->with('message','Movie rented');
		}
	}

	public function putReturn($id){
		$movie= Movie::findOrFail($id);
		$movie->rented=false;
		$movie->save();
		return $this->showMovieC($id)->with('message','Movie Returned');
	}

	public function deleteMovie($id){
		$movie = Movie::findOrFail($id);
		$movie->delete();
		return redirect('catalog');
	}

	public function searchImdb(Request $request){
		$request->validate([
			'search' => ['required','min:3'],
		]);
		$url='http://www.omdbapi.com/?s='.$request->search.'&apikey='.$this->key;
		$data=file_get_contents($url);
		$item=(json_decode($data,true));
		return view('catalog.search')->with('data',$item["Search"]);
	}

	public function showMovieC($id){
		$movie=Movie::findOrFail($id);
		return view('catalog.showc')->with('movie',$movie);
	}

	public function putRentC($id){
		$movie= Movie::findOrFail($id);
		$movie->rented=true;
		$movie->save();
		return $this->showMovieC($id)->with('message','Movie Rented');
	}
}
