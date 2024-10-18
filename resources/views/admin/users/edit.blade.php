@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h4>USUARIOS</h4>
@stop



@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>ACTUALIZAR USUARIO </strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title mb-4">
                <strong style="text-transform: uppercase"> {{$user->name}} </strong> <br>
                <div style="margin-right:0px;" class="float-left">
                    <a href="{{ url('admin/users') }}" class="btn btn-secondary float-right"><i class="fa fa-sm fa-fw fa-home"></i>&nbsp;Regresar</a>
                </div>
            </div>
            <div class="card-text">
                {!! Form::open(['route'=>['admin.user.update',$user], 'method'=>'PATCH']) !!}
                    @csrf
                    <div class="row">
                        <x-adminlte-input name="name"  placeholder="Ingresa tu nombre completo" 
                            label-class="text-orange" label="Ingresa tu nombre completo" type="text" fgroup-class="col-md-12" :value="old('name',$user->name)" />
    
                        <x-adminlte-input name="email"  placeholder="¿Cúal es tu correo electrónico?" 
                            label-class="text-orange" label="¿Cúal es tu correo electrónico?" type="email" fgroup-class="col-md-12" :value="old('email',$user->email)" />
    
                        <x-adminlte-input name="password"  placeholder="Coloca tu contraseña" 
                            label-class="text-orange" label="Coloca tu contraseña" type="password" fgroup-class="col-md-12" :value="old('password')" />
    
                        <x-adminlte-input name="confirm-password"  placeholder="Confirma tu contraseña" 
                            label-class="text-orange" label="Confirma tu contraseña" type="password" fgroup-class="col-md-12" :value="old('confirm-password')" />
    
    
                        <x-adminlte-select name="role" fgroup-class="col-md-12"  label-class="text-orange" label="Selecciona un rol">
                            <option value="" disabled selected>Selecciona Rol</option>                      
                            <x-adminlte-options :options="$roles" :selected="old('role')"/>
                        </x-adminlte-select>   
                    </div>    
                    {!! Form::button('<i class="fa fa-sm fa-fw fa-save"></i>&nbsp;Guardar', ['type' => 'submit', 'class' => 'btn btn-primary' ]) !!}




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