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
		return view('catalog.create');
		
		/*
		Cliente::create($request->all());
		//return "prueba";
		
		$clientes = DB::table('clientes')->paginate(4);
		$busqueda = $request->get("busqueda");
		$clientes->appends(['busqueda' => $busqueda])->links();
		
		return view('clientes.VistaClientes', ['ListaClientes' => $clientes], ['busqueda' => $busqueda]);
		*/
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
