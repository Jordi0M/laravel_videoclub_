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
        return view('catalog.edit', array('id'=>$id));
    }
    

}
