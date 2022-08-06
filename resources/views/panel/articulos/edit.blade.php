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
                <form method="post" action="{{ route('articulos.update', $articulo->id ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <div class="form-group"> 
                                <label for="titulo">Título:</label>
                                <input type="text" class="form-control form-control-sm" name="titulo" maxlength="255" size="255" value="{{ $articulo->titulo }}" required/>
                            </div>
                            <div class="form-group">
                                <label for="contenido">Contenido:</label>
                                <textarea class="form-control form-control-sm" name="contenido" id="contenido" rows="6" required>{!! str_replace('<br />','',$articulo->contenido) !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor:</label>
                                <input type="text" class="form-control form-control-sm" name="autor" value="{{ Auth::user()->name }}" readonly/>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary mx-auto mt-4">Actualizar</button>
                        </div>
                        <div class="col">
                            <div class="form-group"> 
                                <label for="categoria">Categoría:</label>
                                <select class="form-select form-select-sm" name="categoria" aria-label="Default select example" required>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}" 
                                            @if($categoria->id==$articulo->categoria_id)
                                                selected
                                            @endif>
                                            {{$categoria->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Seleccione una imagen</label>
                                <div class="area-sel-imagen">
                                    <input class="form-control form-control-file form-control-sm" type="file" id="imagen" name="imagen" accept=".jpg, .png" >
                                </div>
                            </div>
                            <img class="img-fluid mt-4" id="imagenSeleccionada" src="/img/articulos/{{$articulo->img}}" alt="">
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
