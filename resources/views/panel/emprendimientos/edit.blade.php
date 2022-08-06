@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <div class="row">                
            <div class="col">  
                <h2 class="titulo">
                    Mi emprendimiento
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
                <form method="post" action="{{ route('emprendimientos.update', $emprendimiento->id) }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="row caja-foto">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="logo">Logo del emprendimiento:</label>
                                    <input class="form-control form-control-file form-control-sm" type="file" id="logo" name="logo" accept=".jpg, .png" >
                                </div>    
                            </div> 
                            <div class="col-md-4 text-center">
                                <img class="img-fluid mt-4 logo" id="logoSeleccionado" src="/img/logos_emprendimientos/{{$emprendimiento->logo}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control form-control-sm" name="nombre" value="{{$emprendimiento->nombre}}" minlength="3" maxlength="255" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="etapa">Etapa:</label>
                                <select class="form-select form-select-sm" name="etapa" id="etapa" aria-label="Default select example" required>
                                    @foreach ($etapas as $etapa)
                                        <option value="{{$etapa->id}}" 
                                            @if($etapa->id==$emprendimiento->etapa_id)
                                                selected
                                            @endif>
                                            {{$etapa->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipo-emprendimiento">Tipo de emprendimiento:</label>
                                <select class="form-select form-select-sm" name="tipo-emprendimiento" id="tipo-emprendimiento" aria-label="Default select example" required>
                                    @foreach ($tipos_emprendimiento as $tipo_emprendimiento)
                                        <option value="{{$tipo_emprendimiento->id}}" 
                                            @if($tipo_emprendimiento->id==$emprendimiento->tipos_emprendimiento_id)
                                                selected
                                            @endif>
                                            {{$tipo_emprendimiento->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sector">Sector:</label>
                                <select class="form-select form-select-sm" name="sector" id="sector" aria-label="Default select example" required>
                                    @foreach ($sectores as $sector)
                                        <option value="{{$sector->id}}" 
                                            @if($sector->id==$emprendimiento->sector_id)
                                                selected
                                            @endif>
                                            {{$sector->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fech-inicio">Fecha de inicio:</label>
                                <input type="date" class="form-control form-control-sm" name="fech-inicio" value="{{$emprendimiento->fecha_inicio}}" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="clase">Clase:</label>
                                <select class="form-select form-select-sm" name="clase" id="clase" aria-label="Default select example" required>
                                    @foreach ($clases as $clase)
                                        <option value="{{$clase->id}}" 
                                            @if($clase->id==$emprendimiento->clase_id)
                                                selected
                                            @endif>
                                            {{$clase->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="empleados">Empleados:</label>
                                <select class="form-select form-select-sm" name="empleados" id="empleados" aria-label="Default select example" required>
                                    @foreach ($empleados as $empleado)
                                        <option value="{{$empleado->id}}" 
                                            @if($empleado->id==$emprendimiento->empleado_id)
                                                selected
                                            @endif>
                                            {{$empleado->descripcion}}     
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="face">Facebook:</label>
                                <input type="text" class="form-control form-control-sm" name="face" value="{{old('face',$emprendimiento->face)}}" maxlength="255"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="twitter">Twitter:</label>
                                <input type="text" class="form-control form-control-sm" name="twitter" value="{{$emprendimiento->twitter}}" maxlength="255"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="insta">Instagram:</label>
                                <input type="text" class="form-control form-control-sm" name="insta" value="{{$emprendimiento->insta}}" maxlength="255"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="web">Web:</label>
                                <input type="text" class="form-control form-control-sm" name="web" value="{{$emprendimiento->web}}" maxlength="255"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control form-control-sm" name="email" value="{{$emprendimiento->mail}}" maxlength="255" required/>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pdf">Pdf emprendimiento:</label>
                                <input class="form-control form-control-file form-control-sm" type="file" id="pdf" name="pdf" maxlength="255">
                            </div> 
                            @if ($emprendimiento->pdf<>'') <a href="/img/emprendimientos/{{ $emprendimiento->pdf }}" target="_blank">Pdf</a>@endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="afip">Formulario de inscripción en Afip:</label>
                                <input class="form-control form-control-file form-control-sm" type="file" id="afip" name="afip" maxlength="255">
                            </div>
                            @if ($emprendimiento->afip<>'') <a href="/img/emprendimientos/{{ $emprendimiento->afip }}" target="_blank">Afip</a>@endif
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bromatologia">Habilitación bromatología:</label>
                                <input class="form-control form-control-file form-control-sm" type="file" id="bromatologia" name="bromatologia" maxlength="255">
                            </div>
                            @if ($emprendimiento->bromatologia<>'') <a href="/img/emprendimientos/{{ $emprendimiento->bromatologia }}" target="_blank">Bromatología</a> @endif
                        </div>  
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="idea">Idea:</label>
                                <textarea class="form-control form-control-sm" name="idea" id="idea" rows="4" minlength="20" maxlength="1000" required>{{$emprendimiento->idea}}</textarea>
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

            $('#logo').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#logoSeleccionado').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })

        });
    </script>
@endsection

