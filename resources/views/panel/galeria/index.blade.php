@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Galería de fotos
                </h2>  
                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div><br />
                @endif
            </div>
        </div>
        <form method="post" action="{{ route('galeria.subir_fotos') }}" enctype="multipart/form-data">   
            @csrf
            <div class="row pb-4">
                <div class="col-md-6">
                    <div class="caja-foto">
                        <img id="foto1" class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria1.jpg') }}?nocache=<?php echo time(); ?>" alt="" />     
                        <input class="form-control form-control-sm" name="imagen1" id="imagen1" type="file" accept=".jpg" onchange="mostrar(foto1);"/> 
                    </div>      
                </div>
                
                <div class="col-md-6">
                    <div class="caja-foto">
                        <img id="foto2" class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria2.jpg') }}?nocache=<?php echo time(); ?>" alt="" />
                        <input class="form-control form-control-sm" name="imagen2" id="imagen2" type="file" accept=".jpg" onchange="mostrar(foto2);"/>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="caja-foto">
                        <img id="foto3" class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria3.jpg') }}?nocache=<?php echo time(); ?>" alt="" />
                        <input class="form-control form-control-sm" name="imagen3" id="imagen3" type="file" accept=".jpg" onchange="mostrar(foto3);"/>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="caja-foto">
                        <img id="foto4" class="img-fluid foto-galeria" src="{{ asset('img/galeria/Galeria4.jpg') }}?nocache=<?php echo time(); ?>" alt="" />
                        <input class="form-control form-control-sm" name="imagen4" id="imagen4" type="file" accept=".jpg" onchange="mostrar(foto4);"/>
                    </div>
                </div>
                
            </div>
            <div class="text-center">
                <input class="btn btn-outline-secondary mx-auto mt-4" id="submit-fotos" name="submit-fotos" type="submit" value="Actualizar galería">
            </div>
        </form>
    </div>
</main>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrar(foto){
            foto.src=URL.createObjectURL(event.target.files[0]);
        }   
    </script>
@stop