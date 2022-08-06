@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Emprendedores
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
        <div class="row">                
            <div class="col">  
                <form>                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control form-control-sm" name="nombre" disabled value="{{ $emprendedor->name }}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control form-control-sm" name="email" disabled value="{{ $emprendedor->email }}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cuil">Cuil:</label>
                                <input type="number" class="form-control form-control-sm" name="cuil" disabled value="{{ $emprendedor->cuil }}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="domicilio">Domicilio:</label>
                                <input type="text" class="form-control form-control-sm" name="domicilio" disabled value="{{ $emprendedor->domicilio }}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="localidad">Localidad:</label>
                                <input type="text" class="form-control form-control-sm" name="localidad" disabled value="@if ($emprendedor->localidad<>''){{ $emprendedor->localidad->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <input type="text" class="form-control form-control-sm" name="provincia" disabled value="@if ($emprendedor->provincia<>''){{ $emprendedor->provincia->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type="text" class="form-control form-control-sm" name="celular" disabled value="{{ $emprendedor->celular }}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="profesion">Profesión:</label>
                                <input type="text" class="form-control form-control-sm" name="profesion" disabled value="@if ($emprendedor->profesion<>''){{ $emprendedor->profesion->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fech-nac">Fecha de nacimiento:</label>
                                <input type="date" class="form-control form-control-sm" name="fech-nac" disabled value="{{ $emprendedor->fechnac }}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="emprendimiento">Nombre emprendimiento:</label>
                                <input type="text" class="form-control form-control-sm" name="emprendimiento" disabled value="@if ($emprendedor->nombre<>''){{ $emprendedor->nombre }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="etapa">Etapa:</label>
                                <input type="text" class="form-control form-control-sm" name="etapa" disabled value="@if ($emprendedor->etapa<>''){{ $emprendedor->etapa->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo-emprendimiento">Tipo emprendimiento:</label>
                                <input type="text" class="form-control form-control-sm" name="tipo-emprendimiento" disabled value="@if ($emprendedor->tipos_emprendimiento<>''){{ $emprendedor->tipos_emprendimiento->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sector">Sector:</label>
                                <input type="text" class="form-control form-control-sm" name="sector" disabled value="@if ($emprendedor->sector<>''){{ $emprendedor->sector->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fecha-inicio">Fecha inicio:</label>
                                <input type="date" class="form-control form-control-sm" name="fecha-inicio" disabled value="@if ($emprendedor->fecha_inicio<>''){{ $emprendedor->fecha_inicio }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="clase">Clase:</label>
                                <input type="text" class="form-control form-control-sm" name="clase" disabled value="@if ($emprendedor->clase<>''){{ $emprendedor->clase->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="empleados">Cantidad de empleados:</label>
                                <input type="text" class="form-control form-control-sm" name="empleados" disabled value="@if ($emprendedor->empleado<>''){{ $emprendedor->empleado->descripcion }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="face">Facebook:</label>
                                <input type="text" class="form-control form-control-sm" name="face" disabled value="@if ($emprendedor->face<>''){{ $emprendedor->face }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input type="text" class="form-control form-control-sm" name="twitter" disabled value="@if ($emprendedor->twitter<>''){{ $emprendedor->twitter }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insta">Instagram:</label>
                                <input type="text" class="form-control form-control-sm" name="insta" disabled value="@if ($emprendedor->insta<>''){{ $emprendedor->insta }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="web">Web:</label>
                                <input type="text" class="form-control form-control-sm" name="web" disabled value="@if ($emprendedor->web<>''){{ $emprendedor->web }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mail">Mail:</label>
                                <input type="text" class="form-control form-control-sm" name="mail" disabled value="@if ($emprendedor->mail<>''){{ $emprendedor->mail }}@endif"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idea">Idea:</label>
                                <textarea class="form-control form-control-sm" name="idea" id="idea" rows="4" disabled>@if ($emprendedor->idea<>''){{ $emprendedor->idea }}@endif</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pdf">Pdf: </label>
                                @if ($emprendedor->pdf)<a target="_blank" href="/img/emprendimientos/{{ $emprendedor->pdf }}">Pdf emprendimiento</a>@endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="afip">Afip: </label>
                                @if ($emprendedor->afip)<a target="_blank" href="/img/emprendimientos/{{ $emprendedor->afip }}">Constancia Afip</a>@endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="broma">Bromatología: </label>
                                @if ($emprendedor->bromatologia)<a target="_blank" href="/img/emprendimientos/{{ $emprendedor->bromatologia }}">Habilitación Bromatología</a>@endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop
