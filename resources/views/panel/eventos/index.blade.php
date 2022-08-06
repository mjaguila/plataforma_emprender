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
                <a class="btn btn-outline-secondary mb-4" href="eventos/create">Crear</a>
            </div>
        </div>
        <div class="row">                
            <div class="col">  
                <table id="eventos" class="table table-striped table-secondary pt-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Lugar</th>
                            <th>Inicio</th>
                            <th>Finalización</th>
                            <th>Folleto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventos as $evento)
                            <tr>
                                <td>{{$evento->titulo}}</td>
                                <td>{{$evento->descripcion}}</td>
                                <td>{{$evento->lugar}}</td>
                                <td>{{$evento->inicio}}</td>
                                <td>{{$evento->fin}}</td>
                                <td><a href="/img/eventos/{{$evento->folleto}}" target="_blank">Folleto</a></td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                            <a href="/eventos/{{$evento->id}}/edit" class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar"><i class="bi bi-pencil"></i></a>
                                        <form method="post" action="{{ route('eventos.autorizar', $evento->id) }}">
                                            @csrf
                                            @method('PUT') 
                                            
                                            @if ($evento->autorizado == 0)
                                                <button class="btn btn-outline-secondary btn-sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Autorizar"><i class="bi bi-check2-circle"></i></button> 
                                            @else
                                                <button class="btn btn-secondary btn-sm" disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Autorizado"><i class="bi bi-check2-circle"></i></button>
                                            @endif
                                        </form>
                                    <form class="formEliminar" action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"><i class="bi bi-trash"></i></button>    
                                    </div>   
                                    </form>
                                </td>
                            </tr>  
                        @endforeach        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@stop

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#eventos').DataTable({
                "pageLength": 5,
                responsive: true,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No hay datos",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered":   "(Filtro de _MAX_ total registros)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No se encontraron coincidencias",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Próximo",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": Activar orden de columna ascendente",
                        "sortDescending": ": Activar orden de columna desendente"
                    }
                }
            });
        } );
    </script>
    <script>
        (function () {
        'use strict'

        var forms = document.querySelectorAll('.formEliminar')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault()
                    event.stopPropagation()
                    Swal.fire({
                        title: '¿Confirma la eliminación del registro?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirmar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.submit()
                                Swal.fire(
                                '¡Eliminado!',
                                'El registro ha sido eliminado correctamente.',
                                'success'
                                )
                            }
                        })
                    }, false)
            })
        })()
    </script>
@stop