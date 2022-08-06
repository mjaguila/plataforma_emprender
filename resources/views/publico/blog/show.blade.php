@extends('layouts.vistapadre')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endsection

@section('contenido')
    <div class="container container-post">
        <div class="post-preview">
            <span class="badge bg-dark">{{$articulo->categoria->descripcion}}</span>
            <h2 class="post-title">{{$articulo->titulo}}</h2>
            <p class="post-meta">Publicado por {{$articulo->user->name}} el {{$articulo->created_at}}</p>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <p class="post-contenido">{!! nl2br($articulo->contenido) !!}</p>
                        <div class="text-center">
                            <img class="img-post" src="{{ asset('img/articulos/'. $articulo->img) }}" />
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
    
@endsection