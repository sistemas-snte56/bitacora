@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="contenedor">
        <div class="card">
            <div class="card-header">
                <h4><strong>FORMULARIO DE REGISTRO</strong></h4>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-2" style="color: #89194b;">
                        <strong>
                            {{ $tema->titulo }}
                        </strong>
                    </h4>
                </div>
                <div class="card-text">
                    <form action="{{route('registro.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="tema" value="{{ $tema->id }}">
                        <livewire:region/>
                        <x-adminlte-select name="select_genero" label-class="text-orange" label="GÉNERO" fgroup-class="col-md-12">
                            <option value="">Selecciona...</option>
                            @foreach ($generos as $id => $genero)
                                <option value="{{ $id }}" {{ old('select_genero') ==  $id  ? 'selected' : '' }}>{{ $genero }}</option>
                            @endforeach
                        </x-adminlte-select>

                        <x-adminlte-input name="nombre" label-class="text-orange" label="NOMBRE (S)" placeholder="Ingresa tu nombre" type="text" 
                            fgroup-class="col-md-12" value="{{old('nombre')}}" />
                        <x-adminlte-input name="apellido_paterno" label-class="text-orange" label="APELLIDO PATERNO" placeholder="Primer apellido" type="text" 
                            fgroup-class="col-md-12" value="{{old('apellido_paterno')}}" />
                        <x-adminlte-input name="apellido_materno" label-class="text-orange" label="APELLIDO MATERNO" placeholder="Segundo apellido" type="text" 
                            fgroup-class="col-md-12" value="{{old('apellido_paterno')}}" />
                        <x-adminlte-input name="telefono" label="TELÉFONO" 
                            fgroup-class="col-md-12" value="{{old('telefono')}}"  label-class="text-orange" placeholder="A diez dígitos" type="text"/>
                        <x-adminlte-input name="email" label="CORREO ELECTRÓNICO" 
                            fgroup-class="col-md-12" value="{{old('email')}}"  label-class="text-orange" placeholder="Tú email" type="text"/>
                        <x-adminlte-input name="rfc" label-class="text-orange" label="RFC" placeholder="Ingresa tu rfc" type="text" 
                            fgroup-class="col-md-12" value="{{old('rfc')}}" />
                            
                        <div class="form-group col-md-12">
                            <label for=""> &nbsp; </label>
                            <button class="btn btn-primary  float-right" type="submit">
                                <i class="fas fa-lg fa-fw fa-save"></i> Guardar
                            </button>
                        </div>  


















                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
