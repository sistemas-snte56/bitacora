@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h4>ADMIN | USUARIOS</h4>
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
                <div class="row">
                    <div class="col-sm">
                        <a href=" {{ route('admin.bitacora.index') }} ">
                            <x-adminlte-info-box title="Tareas concluidas" text="{{$countStatus1}}" icon="fas fa-lg fa-tasks text-orange" theme="gradient-success" icon-theme="white" fgroup-class="col-md-6" />
                        </a>
                    </div>
                    <div class="col-sm">
                        <a href=" {{ route('admin.bitacora.index') }} ">
                            <x-adminlte-info-box title="Tareas sin concluir" text="{{$countStatus0}}" icon="fas fa-lg fa-tasks text-orange" theme="gradient-danger" icon-theme="white" fgroup-class="col-md-6" />
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <hr>
    <div class="card">
        <div class="card-body">

                    

            {{-- Setup data for datatables --}}
            @php
                $heads = [
                    'ID',
                    'Name',
                    'Company',
                    'State',
                    'Status',
                    'Junte',
                    'Personal',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
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
                    'data' => [
                        [22, 'John Bender', '+02 (123) 123456789', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [19, 'Sophia Clemens', '+99 (987) 987654321', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [3, 'Peter Sousa', '+69 (555) 12367345243', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [22, 'John Bender', '+02 (123) 123456789', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [19, 'Sophia Clemens', '+99 (987) 987654321', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [3, 'Peter Sousa', '+69 (555) 12367345243', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [22, 'John Bender', '+02 (123) 123456789', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [19, 'Sophia Clemens', '+99 (987) 987654321', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [3, 'Peter Sousa', '+69 (555) 12367345243', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [22, 'John Bender', '+02 (123) 123456789', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [19, 'Sophia Clemens', '+99 (987) 987654321', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [3, 'Peter Sousa', '+69 (555) 12367345243', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [22, 'John Bender', '+02 (123) 123456789', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [19, 'Sophia Clemens', '+99 (987) 987654321', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                        [3, 'Peter Sousa', '+69 (555) 12367345243', 'Personal' , 'México'  , 'Concluido', 'Personal', '<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'],
                    ],
                    'order' => [[0, 'asc']],
                    'columns' => [
                        ['orderable' => true], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                    ],
                    'responsive' => true,
                ];
            @endphp

            {{-- Compressed with style options / fill data using the plugin config --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config"
                striped hoverable bordered compressed>
                @foreach($config['data'] as $row)
                    <tr>
                        @foreach($row as $cell)
                            <td>{!! $cell !!}</td>
                        @endforeach
                    </tr>
                @endforeach
            </x-adminlte-datatable>            




        </div>
    </div>
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop