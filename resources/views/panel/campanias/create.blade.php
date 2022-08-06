@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Mails masivos
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
                <form method="POST" action="/campanias" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group"> 
                                <label for="asunto">Asunto:</label>
                                <input type="text" class="form-control form-control-sm" name="asunto" value="{{ old('asunto') }}" maxlength="255" size="255" required/>
                            </div>
                            <div class="form-group">
                                <label for="cuerpo">Cuerpo:</label>
                                <textarea class="form-control form-control-sm" name="cuerpo" id="cuerpo" rows="6" required>{{ old('cuerpo') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor:</label>
                                <input type="text" class="form-control form-control-sm" name="autor-nombre" value="{{ Auth::user()->name }}" readonly/>
                                <input type="hidden" name="autor" value="{{ Auth::user()->id }}">
                            </div>
                            <button type="submit" class="btn btn-outline-secondary mx-auto mt-4">Actualizar</button>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha-enviar">Fecha a enviar:</label>
                                <input type="date" class="form-control form-control-sm" name="fecha-enviar" value="{{ old('fecha-enviar') }}" required/>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Seleccione una imagen</label>
                                <div class="area-sel-imagen">
                                    <input class="form-control form-control-file form-control-sm" type="file" id="imagen" name="imagen" accept=".jpg, .png" >
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
            $('#imagen').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })
        })
    </script>
@stop
