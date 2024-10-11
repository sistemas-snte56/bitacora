@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Dashboard</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>FORMULARIO DE REGISTRO</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title">
                <strong>LISTA GENERAL</strong>
            </div>
            <div class="card-text">
                {{-- Setup data for datatables --}}
                @php
                    $heads = [
                        'ID',
                        'REGION',
                        'DELEGACION',
                        'NIVEL',
                        'SEDE',
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
                <x-adminlte-datatable id="table1" :heads="$heads"  :config="$config"  striped hoverable bordered compressed with-buttons>
                    @foreach($delegaciones as $delegacion )
                        <tr>
                            <td>{{$delegacion->id}}</td>
                            <td>{{$delegacion->region->region}}-{{$delegacion->region->sede}} </td>
                            <td>{{$delegacion->deleg_delegacional}}</td>
                            <td>{{$delegacion->nivel_delegacional}}</td>
                            <td>{{$delegacion->sede_delegacional}}</td>
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

@stop