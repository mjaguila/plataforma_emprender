@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Informes de gestión
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
                <form method="POST" action="/informes" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="anio">Año:</label>
                                <input type="number" class="form-control form-control-sm" name="anio" value="{{ old('anio') }}" min="2000" max="3000" size="4" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="autor-nombre">Autor:</label>
                                <input type="text" class="form-control form-control-sm" name="autor-nombre" value="{{ Auth::user()->name }}" readonly/>
                                <input type="hidden" name="autor" value="{{ Auth::user()->id }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="pdf">Seleccione pdf del informe</label>
                                <div class="area-sel-imagen">
                                    <input class="form-control form-control-file form-control-sm" type="file" id="pdf" name="pdf" accept=".pdf" required>
                                </div>
                                <a id="pdfSeleccionado" href=""></a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary mt-4">Guardar</button>
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
            $('#pdf').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#pdfSeleccionado').attr('href', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })
        })
    </script>
@stop
