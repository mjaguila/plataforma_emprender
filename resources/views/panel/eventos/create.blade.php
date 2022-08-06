@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Eventos
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
                <form method="POST" action="/eventos" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group"> 
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control form-control-sm" name="titulo" value="{{ old('titulo') }}" maxlength="255" size="255" required/>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <textarea class="form-control form-control-sm" name="descripcion" id="descripcion" rows="6" required>{{ old('descripcion') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="lugar">Lugar:</label>
                                <input type="text" class="form-control form-control-sm" name="lugar" value="{{ old('lugar') }}" maxlength="255" size="255" required/>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inicio">Inicio:</label>
                                        <input type="date" class="form-control form-control-sm" name="inicio" value="{{ old('inicio') }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hora-inicio">Hora inicio:</label>
                                        <input type="time" class="form-control form-control-sm" name="hora-inicio" value="{{ old('hora-inicio') }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fin">Fin:</label>
                                        <input type="date" class="form-control form-control-sm" name="fin" value="{{ old('fin') }}" required/>
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hora-fin">Hora fin:</label>
                                        <input type="time" class="form-control form-control-sm" name="hora-fin" value="{{ old('hora-fin') }}" required/>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-outline-secondary mx-auto mt-4">Actualizar</button>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="folleto">Seleccione una imagen</label>
                                <div class="area-sel-imagen">
                                    <input class="form-control form-control-file form-control-sm" type="file" id="folleto" name="folleto" accept=".jpg, .png" required>
                                </div>
                            </div>
                            <img class="img-fluid mt-4" id="imagenSeleccionada">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function(e){
            $('#folleto').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })
        })
    </script>
@stop
