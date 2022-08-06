@extends('layouts.vistapadre')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="title-reducido">
                <h3>Listado de emprendedores</h3>
            </div>
            
            <table id="emprendedores" class="table table-light table-hover mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Emprendimiento</th>
                        <th>Sector</th>
                        <th>Fecha de alta</th>
                        <th>Fecha actualización</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emprendedores as $emprendedor)
                        <tr>
                            <td>{{$emprendedor->user->name}}</td>
                            <td>{{$emprendedor->emprendimiento->nombre}}</td>
                            <td>{{$emprendedor->emprendimiento->sector->descripcion}}</td>
                            <td>{{$emprendedor->emprendimiento->mail}}</td>
                            <td>{{$emprendedor->celular}}</td>
                        </tr>  
                    @endforeach        
                </tbody>
            </table>
        </div>
    </div>
    
</div>
    
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
@stop

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#emprendedores').DataTable({
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
@stop