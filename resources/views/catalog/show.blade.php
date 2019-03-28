@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-4">

        <img src="{{$pelicula['poster']}}" alt="">

    </div>
    <div class="col-sm-8">

    
            <h1>{{$pelicula['title']}}</h1>
            <br>
            <h2>Año:  {{$pelicula['year']}}</h2>
            <br>
            <h2>Director: {{$pelicula['director']}}</h2>            
            <p>Resumen: {{$pelicula['synopsis']}}</p>
            <p>a{{$pelicula['rented']}}</p>
            {{--}}
            @if ( {{$pelicula['rented']}} == true)
                {
                    <p>true</p>
                    <button type="button" class="btn btn-primary">Alquilar pelicula</button>
                }
                @elseif ( {{$pelicula['rented']}} == false)
                {
                    <p>false</p>
                    <button type="button" class="btn btn-danger">Devolver pelicula</button>
                }
            @endif
            {{--}}
            <button type="button" class="btn btn-warning">Editar pelicula</button>
            <button type="button" class="btn btn-light">Volver al listado</button>
            

    </div>
</div>

@stop