@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
    {{-- <h1> &nbsp; </h1> --}}
    <div class="mb-1"></div>
@stop

@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>MI BITACORA DE SALIDAS</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title mb-4">
                    <a href="{{ route('bitacora.create') }}" class="btn bg-primary float-right">
                        <i class="fa fa-sm fa-fw fa-pen"></i> Registrar salida
                    </a>                
            </div>
            <div class="card-text">
                {{-- Setup data for datatables --}}
                @php
                    $heads = [
                        'FECHA',
                        'HORA DE SALIDA',
                        'DEPENDENCIA',
                        'MOTIVO',
                        'OBSERVACIÓN',
                        'STATUS',
                        ['label' => 'ACCIONES', 'no-export' => true, 'width' => 12],
                    ];
                    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>';
                    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>';                                
                    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </button>';


                    $config = [
                        'order' => [[0, 'asc']],
                        'columns' => [
                            ['orderable' => true], 
                            ['orderable' => false], 
                            ['orderable' => false], 
                            ['orderable' => false], 
                            ['orderable' => false], 
                            ['orderable' => false],
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
                                @can('admin.bitacora.status')
                                    <input type="button" id="status{{$bitacora->id}}" data-id="{{$bitacora->id}}" class="mi_boton btn btn-info btn-sm"
                                        value="{{$bitacora->status ? 'Finalizado' : 'Terminar'}}" 
                                        data-status="{{$bitacora->status ? 1 : 0}}">  
                                @endcan
                                    &nbsp;
                                @can('admin.bitacora.destroy')
                                    <form action="{{route('bitacora.destroy', $bitacora)}}" method="post" class="formEliminar" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan    
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
    <link rel="stylesheet" href="/css/miestilo.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrarlo!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    }
                });

            })
        });
    </script>

    @if(session('success_salida'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('success_salida') }}"
                Swal.fire({
                    icon: 'success',
                    title: mensaje,
                    text: 'La salida que registraste se guardo satisfactoriamente.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif 
    @if(session('success_delete'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('success_delete') }}"
                Swal.fire({
                    icon: 'success',
                    title: mensaje,
                    text: 'La salida que registraste se borro satisfactoriamente.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif 

    <script>
        $('.mi_boton').click(function() {
            var button = $(this);
            var estatus = button.data('status') == 1 ? 0 : 1; // Cambia el estatus
            var id = button.data('id');
    
            $.ajax({
                type: "GET",
                dataType: "json",
                // url: '{{ route('bitacora.status') }}',
                url: "{{ route('bitacora.status') }}", // Genera la URL aquí
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




