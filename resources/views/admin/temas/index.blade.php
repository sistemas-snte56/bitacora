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
            <h4 style="color:#FFFFFF;"><strong>LISTA DE TEMAS POR EVENTO</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title mb-4">
                <a href="{{ route('tema.create') }}" class="btn bg-primary float-right">
                    <i class="fa fa-sm fa-fw fa-pen"></i> Nuevo Tema
                </a>                
            </div>
            <div class="card-text">
                {{-- Setup data for datatables --}}
                @php
                    $heads = [
                        'ID',
                        'FECHA',
                        'TITULO',
                        'DESCRIPCION',
                        ['label' => 'ACCIONES', 'no-export' => true, 'width' => 12],
                    ];
                    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>';
                    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
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
                <x-adminlte-datatable id="table1" :heads="$heads"  :config="$config"  striped hoverable bordered compressed>
                    @foreach($temas as $tema )
                        <tr>
                            <td>{{$tema->id}}</td>
                            <td>{{ $tema->created_at->format('d/m/Y') }}</td>
                            <td>{{$tema->titulo}}</td>
                            <td>{{$tema->descripcion}}</td>
                            <td>
                                <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
                                <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <a class="btn btn-xs btn-default text-danger mx-1 shadow" title="Borrar" href="">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </a>
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
    @if(session('success_tema'))
    <script>
        $(document).ready(function(){
            let mensaje = "{{ session ('success_tema') }}"
            Swal.fire({
                icon: 'success',
                title: mensaje,
                text: 'El tema que registraste se guardo satisfactoriamente.',
                showConfirmButton: true,
            });
        });
    </script>
    @endif 
@stop