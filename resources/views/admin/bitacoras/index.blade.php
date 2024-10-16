@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Dashboard</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>BITACORA DE SALIDAS</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title">
                <strong>LISTA GENERAL</strong>
            </div>
            <div class="card-text">
            {{-- Setup data for datatables --}}
                @php
                    $heads = [
                        'FECHA',
                        'HORA DE SALIDA',
                        'PERSONAL',
                        'DEPENDENCIA',
                        'MOTIVO',
                        'OBSERVACIÓN',
                        'STATUS',
                        ['label' => 'ACCIONES', 'no-export' => true, 'width' => 12],
                    ];

                    $config = [
                        'order' => [
                            [0, 'asc'], // Ordenar por FECHA (columna 0)
                            [1, 'asc'], // Ordenar por HORA DE SALIDA (columna 1)
                            [6, 'asc'], // Ordenar por STATUS (columna 6)                            
                        ],
                        'columns' => [
                            ['orderable' => true], 
                            ['orderable' => true], 
                            ['orderable' => false], 
                            ['orderable' => false], 
                            ['orderable' => false], 
                            ['orderable' => false], 
                            ['orderable' => true],
                            ['orderable' => false],
                        ],
                        'language' => [
                            'url' => 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
                        ],
                        'pageLength' => 100, // Configuración por defecto de la cantidad de entradas por página
                        'lengthMenu' => [50, 100, 200], // Opciones de entradas por página                        
                    ];
                @endphp
                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads"  :config="$config"  striped hoverable bordered compressed with-buttons>
                    @foreach($bitacoras as $bitacora )
                        <tr>
                            <td>{{$bitacora->fecha_salida }}</td>
                            <td>{{$bitacora->hora}}</td>
                            <td>{{$bitacora->user->name}}</td>
                            <td>{{$bitacora->dependencia->dependencia}}</td>
                            <td id="motivo{{$bitacora->id}}">
                                
                                
                                @if ($bitacora->status == 1)
                                    <p id="status_motivo_{{$bitacora->id}}">
                                        <del>{{$bitacora->motivo}}</del>
                                    </p>
                                @else
                                    <p id="status_motivo_{{$bitacora->id}}">
                                        {{$bitacora->motivo}}
                                    </p>
                                @endif


                            </td>
                            <td>{{$bitacora->observacion}}</td>
                            <td id="resp{{$bitacora->id}}">
                                @if ($bitacora->status == 1)
                                    <h5><span class="badge badge-success">Concluido</span></h5>
                                @else
                                    <h5><span class="badge badge-danger">Sin concluir</span></h5>
                                @endif
                            </td>
                            <td>
                                <input type="button" id="status{{$bitacora->id}}" data-id="{{$bitacora->id}}" class="mi_boton btn btn-info btn-sm"
                                    value="{{$bitacora->status ? 'Finalizado' : 'Terminar'}}" 
                                    data-status="{{$bitacora->status ? 1 : 0}}">  
                                    &nbsp;
                                <form action="{{route('bitacora.destroy', $bitacora)}}" method="post" class="formEliminar" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        $('.mi_boton').click(function() {
            var button = $(this);
            var estatus = button.data('status') == 1 ? 0 : 1; // Cambia el estatus
            var id = button.data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('bitacora.status') }}',
                data: {'estatus': estatus, 'id': id},
                success: function(data) {
                    button.data('status', estatus); // Actualiza el estado en el botón
                    button.val(estatus ? 'Finalizado' : 'Terminar'); // Cambia el texto del botón

                    var motivoCell = $('#motivo' + id);
                    if (estatus === 0) { // Si el nuevo estado es InActive
                        // Si es Active, puedes decidir si eliminar el <del> o no
                        motivoCell.html(motivoCell.text().replace(/<del>(.*?)<\/del>/, '$1')); // Remueve el efecto <del> si está presente

                    } else {
                        motivoCell.html('<del>' + motivoCell.text() + '</del>'); // Aplica el efecto <del>
                    }
                    $('#resp' + id).html(data.var);
                }
            });
        });
    </script>
@stop