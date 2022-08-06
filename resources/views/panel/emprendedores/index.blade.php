@extends('layouts.dash')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10">
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
                <table id="emprendedores" class="table table-striped table-secondary pt-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Emprendimiento</th>
                            <th>Sector</th>
                            <th>Celular</th>
                            @if(Auth::user()->is_admin == 1)
                                <th>Autorizado</th>
                                <th>Fecha de alta</th>
                                <th>Actualización</th>
                            @endif
                            <th class="not-export-col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emprendedores as $emprendedor)
                            <tr>
                                <td>{{$emprendedor->name}}</td>
                                <td>{{$emprendedor->email}}</td>
                                <td>{{$emprendedor->nombre}}</td>
                                <td>@if($emprendedor->sector)
                                    {{$emprendedor->sector->descripcion}}
                                    @endif
                                </td>
                                <td>{{$emprendedor->celular}}</td>
                                @if(Auth::user()->is_admin == 1)
                                    <td>@if($emprendedor->autorizado) Si @else No @endif</td>
                                    <td>{!! date('d/m/y', strtotime($emprendedor->created_at)) !!}</td>
                                    <td>{!! date('d/m/y', strtotime($emprendedor->updated_at)) !!}</td>
                                @endif
                                <td>  
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <a href="/emprendedores/{{$emprendedor->id}}" class="btn btn-outline-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver detalle"><i class="bi bi-eye"></i></a>
                                        @if(Auth::user()->is_admin == 1)
                                            <form method="post" action="{{ route('emprendedores.autorizar', $emprendedor->id) }}">
                                                @csrf
                                                @method('PUT') 
                                                
                                                @if ($emprendedor->autorizado == 0)
                                                <button class="btn btn-outline-secondary btn-sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Autorizar"><i class="bi bi-check2-circle"></i></button> 
                                                @else
                                                <button class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Autorizado"><i class="bi bi-check2-circle"></i></button>
                                                @endif
                                            </form>
                                        @endif
                                    </div>   
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#emprendedores').DataTable({
                
                responsive: true,
                "pageLength": 5,
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
                },
                dom: "Blfrtip",
                buttons: [
                    {
                        text: 'Exportar a Excel',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    {
                        text: 'Exportar a pdf',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                ],
            });
        } );
    </script>
@stop