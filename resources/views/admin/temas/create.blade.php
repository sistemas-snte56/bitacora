@extends('adminlte::page')

@section('title', 'Nuevo Tema')

@section('content_header')
    <div class="mb-1"></div>
@stop

@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>CREAR NUEVO TEMA</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title mb-4">
                <div style="margin-right:0px;" class="float-left">
                    <a href="{{ url('admin/temas') }}" class="btn btn-secondary float-right"><i class="fa fa-sm fa-fw fa-home"></i>&nbsp;Regresar</a>
                </div>               
            </div>
            <div class="card-text">
                {!! Form::open(['route'=>['tema.store'], 'method'=>'POST']) !!}
                    @csrf

                    <div class="row">
                
                        <x-adminlte-input name="titulo" label-class="text-orange" label="TEMA" placeholder="Nombre del Tema"  type="text" fgroup-class="col-md-12" value="{{old('titulo')}}"/>
                        <x-adminlte-textarea name="descripcion" label-class="text-orange" label="DESCRIPCIÓN" type="textarea" fgroup-class="col-md-12"  placeholder="Insert description..."/>
                        <x-adminlte-button class="button" label-class="text-orange" label="Guardar" theme="primary" icon="fas fa-save" type="submit"/>

                    </div>                    

                {!! Form::close() !!}
                
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