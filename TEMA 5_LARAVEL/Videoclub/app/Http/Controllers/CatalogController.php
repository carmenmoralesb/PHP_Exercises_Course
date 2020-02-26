<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Movie;

class CatalogController extends Controller
{
	public function getIndex() {		
		$movies = Movie::all();
		return view('catalog.index',
			array('movies' => $movies));
	}
	
    public function getShow($id) {
		$movie = Movie::findOrFail($id);

		return view('catalog.show',
			array('pelicula' => $movie));
    }

    public function getCreate() {
        return view('catalog.create');
	}
	
	public function postCreate(Request $request) {
		$movie = new Movie();
		$movie->title = $request->input('title');
		$movie->year = $request->input('year');
		$movie->director = $request->input('director');
		$movie->poster = $request->input('poster');
		$movie->synopsis = $request->input('synopsis');

		$movie->save();		

		return redirect()->route('showmovie',['id' => $movie->id]);
	}

    public function getEdit($id) {
		$movie = Movie::findOrFail($id);

		return view('catalog.edit',
			array(
				'id' => $id,
				'pelicula' => $movie));
	}	
	
	public function putEdit(Request $request, $id) {
		$movie = Movie::findOrFail($id);

		$movie->title = $request->input('title');
		$movie->year = $request->input('year');
		$movie->director = $request->input('director');
		$movie->poster = $request->input('poster');
		$movie->synopsis = $request->input('synopsis');
		$movie->save();
		return redirect()->route('showmovie',['id' => $movie->id]);

	}
}



