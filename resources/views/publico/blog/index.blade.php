@extends('layouts.vistapadre')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endsection

@section('contenido')
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Noticias</h1>
                        <span class="subheading">Novedades Plataforma Emprender</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">
                @foreach($articulos as $articulo)
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <div style="height: 200px; overflow: hidden;">
                                <img class="img-fluid" style="height: 200px;" src="{{ asset('img/articulos/'. $articulo->img) }}" alt="">
                            </div>
                            <span style="position: absolute;" class="badge bg-dark m-2">{{$articulo->categoria->descripcion}}</span>
                            <div class="card-body">
                                <p class="post-contenido">{!! nl2br(substr($articulo->contenido,0,200)) !!}...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/blog/{{$articulo->id}}">Ver más</a>
                                    <small class="text-muted">{{$articulo->created_at}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach   
            </div>
            {{ $articulos->links() }} 
        </div> 
    </div>

    
@endsection