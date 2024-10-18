@extends('adminlte::page')

@section('title', 'Nuevo rol')

@section('content_header')
    <h4>ROLES</h4>
@stop



@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>NUEVO ROL</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title mb-4">
                <div style="margin-right:0px;" class="float-left">
                    <a href="{{ url('admin/roles') }}" class="btn btn-secondary float-right"><i class="fa fa-sm fa-fw fa-home"></i>&nbsp;Regresar</a>
                </div>
            </div>
            <div class="card-text">
                {!! Form::open(['route'=>'admin.roles.store','method'=>'POST']) !!}
                    @csrf
                    <div class="row">
                        <x-adminlte-input name="name"  placeholder="Ingresa el nombre del Rol" 
                            label-class="text-orange" label="Ingresa tu nombre completo" type="text" fgroup-class="col-md-12" :value="old('name')" />
                    </div>    
                    @foreach ($permissions as $value)
                        <div class="form-check">
                            <label>
                                {!! Form::checkbox('permissions[]', $value->id, false, ['class'=>'name']) !!}
                                {{ $value->name }}
                            </label> 
                        </div>
                    @endforeach
                    @if($errors->has('permissions'))
                        <div class="text-danger">{{ $errors->first('permissions') }}</div>
                    @endif
                    <br>
                    {!! Form::button('<i class="fa fa-sm fa-fw fa-save"></i>&nbsp;Guardar', ['type' => 'submit', 'class' => 'btn btn-primary mb-4' ]) !!}
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