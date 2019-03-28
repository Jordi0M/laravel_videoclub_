<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class CatalogController extends Controller
{
    public function getIndex()
    {
		$arrayPeliculas = Movie::all();

        return view('catalog.index', ['arrayPeliculas' => $arrayPeliculas]);
    }

    public function getShow($id)
    {
		$arrayPeliculas = Movie::findOrFail($id);
		return view('catalog.show', ['pelicula' => $arrayPeliculas]);
		//return view('catalog.show', ['pelicula' => $arrayPeliculas[$id]->findOrFail($id)]);

    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
				$arrayPeliculas = Movie::findOrFail($id);
        return view('catalog.edit', array('pelicula'=>$arrayPeliculas));
    }
	
	public function postCreate(Request $request)
    {

			$nueva = new Movie;
			$nueva->title = $request->title;
			$nueva->year = $request->year;
			$nueva->director = $request->director;
			$nueva->poster = $request->poster;
			$nueva->rented = 0;
			$nueva->synopsis = $request->synopsis;
			$nueva->save();
			
			return $this->getIndex();
		
    }

    public function putEdit(Request $request, $id)
    {
		$editar = Movie::where('id', $id)->first();
		$editar->update($request->all());

		return $this->getShow($id);
		/*	
		$arrayPeliculas = Movie::findOrFail($id);
		return view('catalog.edit', array('pelicula'=>$arrayPeliculas));
		*/
    }

}
