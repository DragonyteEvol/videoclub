<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    return Movie::all();
//	    return response()->json(Movie::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
	Movie::create($request->all());
	return response()->json(['error'=>false,'msg'=>'Pelicula Creada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    return response()->json(Movie::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
	$movie=Movie::findOrFail($id);
	$movie->title=$request->title;
	$movie->year=$request->year;
	$movie->director=$request->director;
	$movie->poster=$request->poster;
	$movie->rented=$request->rented;
	$movie->synopsis=$request->synopsis;
	$movie->save();
	return response()->json(['error'=>false,'msg'=>'Pelicula Actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $movie=Movie::findOrFail($id);
	    $movie->delete();
	    return response()->json(['error'=>false,'msg','Pelicula Borrada']);
    }

    public function putRent($id){
    	$movie =Movie::findOrFail($id);
	$movie->rented=true;
	$movie->save();
	return response()->json(['error'=>false,'msg'=>'Pelicula Rentada']);
    }

    public function putReturn($id){
    	$movie =Movie::findOrFail($id);
	$movie->rented=false;
	$movie->save();
	return response()->json(['error'=>false,'msg'=>'Gracias Por Devolver La Pelicla']);
    	
    }
}
