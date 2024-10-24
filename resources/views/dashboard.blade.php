@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <div class="mb-1"></div>
@stop



@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>MI BITACORA DE SALIDAS</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title">
                <div class="mb-1">
                    <h4>
                        <strong>{{$userName}}</strong>
                    </h4>
                </div>
            </div>
            <div class="card-text">
                <div class="row">
                    <div class="col-sm">
                        <a href=" {{ route('bitacora.index') }} ">
                            <x-adminlte-info-box title="Tareas concluidas" text="{{$countStatus1}}" icon="fas fa-lg fa-tasks text-orange" theme="gradient-success" icon-theme="white" fgroup-class="col-md-6" />
                        </a>
                    </div>
                    <div class="col-sm">
                        <a href=" {{ route('bitacora.index') }} ">
                            <x-adminlte-info-box title="Tareas sin concluir" text="{{$countStatus0}}" icon="fas fa-lg fa-tasks text-orange" theme="gradient-danger" icon-theme="white" fgroup-class="col-md-6" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="/css/responsive.bootstrap5.css"> --}}
@stop
    
@section('js')
    
    {{-- <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.js') }}"></script> --}}
        
    <script>

        $(document).ready(function() {

            let iBox = new _AdminLTE_InfoBox('ibUpdatable');

            let updateIBox = () =>
            {
                // Update data.
                let rep = Math.floor(1000 * Math.random());
                let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
                let progress = Math.round(rep * 100 / 1000);
                let text = rep + '/1000';
                let icon = 'fas fa-lg fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
                let description = progress + '% reputation completed to reach next level';

                let data = {text, icon, description, progress};
                iBox.update(data);
            };

            setInterval(updateIBox, 5000);
        })

    </script>
@stop