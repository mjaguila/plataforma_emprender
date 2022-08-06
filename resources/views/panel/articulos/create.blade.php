@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Publicaciones
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
                <form method="POST" action="/articulos" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control form-control-sm" name="titulo" value="{{ old('titulo') }}" maxlength="255" size="255" required/>
                            </div>
                            <div class="form-group">
                                <label for="contenido">Contenido:</label>
                                <textarea class="form-control form-control-sm" name="contenido" id="contenido" rows="6" required>{{ old('contenido') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="autor-nombre">Autor:</label>
                                <input type="text" class="form-control form-control-sm" name="autor-nombre" value="{{ Auth::user()->name }}" readonly/>
                                <input type="hidden" name="autor" value="{{ Auth::user()->id }}">
                            </div>
                            <button type="submit" class="btn btn-outline-secondary mt-4">Guardar</button>
                        </div>
                        <div class="col">
                            <div class="form-group"> 
                                <label for="categoria">Categoría:</label>
                                <select class="form-select form-select-sm" name="categoria" aria-label="Default select example" required>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}"
                                            {{ old('categoria') == $categoria->id ? 'selected' : '' }}> 
                                            {{$categoria->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Seleccione una imagen</label>
                                <div class="area-sel-imagen">
                                    <input class="form-control form-control-file form-control-sm" type="file" id="imagen" name="imagen" accept=".jpg, .png" required>
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
