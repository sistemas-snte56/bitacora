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
                        'ESTADO',
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
                        'order' => [[1, 'asc']],
                        'columns' => [
                            ['orderable' => false], 
                            null, 
                            null, 
                            null, 
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
                        @php
                            $config = [
                                'state' => false,
                                'animate' => true,
                                'offColor' => 'red',
                                'onColor' => 'green'
                            ];

                            $btnStatus = '<input type="checkbox" checked data-toggle="toggle" data-onstyle="outline-primary" data-offstyle="outline-secondary">';

                            // $btnConcluido = '<x-adminlte-input-switch name="iswText" :config="$config" data-on-text="SI" data-off-text="NO" igroup-size="sm"    
                            // data-on-color="success" checked/>';

                        @endphp         

                        <tr>
                            <td>{{$bitacora->fecha_salida }}</td>
                            <td>{{$bitacora->hora}}</td>
                            <td>{{$bitacora->dependencia->dependencia}}</td>
                            <td>
                                <p id="status_motivo">
                                    {{$bitacora->motivo}}
                                </p>
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
                                
                                <label class="switch">
                                    <input type="checkbox" name="status" id="status" data-id="{{$bitacora->id}}" class="mi_checkbox"
                                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                        data-off="InActive" {{$bitacora->status ? 'checked' : ''}} >
                                        <span class="slider round"></span>
                                </label>



                                <br>

                                <hr>
                                    {!! $btnStatus !!}
                                <hr>


                                <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"  href="{{route('bitacora.edit', $bitacora)}} ">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                <form action="{{route('bitacora.destroy', $bitacora)}}" method="post" class="formEliminar" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    {!! $btnDelete !!}
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
        $('.mi_checkbox').change(function(){
            var estatus = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            console.log(estatus);

            $.ajax({
                type:"GET",
                dataType: "json",
                url: '{{ route('bitacora.status') }}',
                data: {'estatus':estatus,'id':id},
                success: function(data)
                {
                    $('#resp'+id).html(data.var);
                    console.log(data.var)
                }
            });
        })

        
    </script>
@stop




