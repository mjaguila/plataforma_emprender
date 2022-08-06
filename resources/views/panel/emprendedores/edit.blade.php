@extends('layouts.dash')

@section('header')
    <h2 class="h4 font-weight-bold">
        Mi cuenta
    </h2>
@stop

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Mi cuenta
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
                <form method="post" action="{{ route('emprendedores.update', $emprendedor->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control form-control-sm" name="nombre" value="{{ $emprendedor->name }}" disabled/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control form-control-sm" name="email" value="{{ $emprendedor->email }}" disabled/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cuil">Cuil:</label>
                                <input type="number" class="form-control form-control-sm" name="cuil" value="{{ $emprendedor->cuil }}" max="99999999999" required size="11"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="domicilio">Domicilio:</label>
                                <input type="text" class="form-control form-control-sm" name="domicilio" value="{{ $emprendedor->domicilio }}" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <select class="form-select form-select-sm" name="provincia" id="provincia" aria-label="Default select example" required>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{$provincia->id}}" 
                                            @if($provincia->id==$emprendedor->provincia_id)
                                                selected
                                            @endif>
                                            {{$provincia->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="localidad">Localidad:</label>
                                <select class="form-select form-select-sm" name="localidad" id="localidad" aria-label="Default select example" required>
                                    @foreach ($localidades as $localidad)
                                        @if ($localidad->provincia_id==$emprendedor->provincia_id)
                                            <option value="{{$localidad->id}}" 
                                                @if($localidad->id==$emprendedor->localidad_id)
                                                    selected
                                                @endif>
                                                {{$localidad->descripcion}}     
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type="text" class="form-control form-control-sm" name="celular" value="{{ $emprendedor->celular }}" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="profesion">Profesión:</label>
                                <select class="form-select form-select-sm" name="profesion" aria-label="Default select example">
                                    @foreach ($profesiones as $profesion)
                                        <option value="{{$profesion->id}}" 
                                            @if($profesion->id==$emprendedor->profesion_id)
                                                selected
                                            @endif>
                                            {{$profesion->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fech-nac">Fecha de nacimiento:</label>
                                <input type="date" class="form-control form-control-sm" name="fech-nac" value="{{ $emprendedor->fechnac }}" required/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary mx-auto mt-4">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</main>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $("#provincia").change(function(){
                $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                });
                $.ajax({ 
                    url: '/localidadProvincia/'+$(this).val(), 
                    type: 'GET', 
                    dataType: 'json',
                    cache: false, 
                    success: function(data) { 
                        console.log(data); 
                        $('#localidad').empty();
                        for (var i = 0; i < data.length; i++) 
                        {
                            var newRow ="<option value="+data[i].id+">"+data[i].descripcion+"</option>";
                            $(newRow).appendTo("#localidad");                 
                        }
                    }, 
                }); 
            });
        });
    </script>
@endsection
