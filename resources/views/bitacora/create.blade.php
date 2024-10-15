@extends('adminlte::page')

@section('title', 'Nuevo Tema')

@section('content_header')
    <div class="mb-1"></div>
@stop

@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>CREAR NUEVO SALIDA</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title mb-4">
                <div style="margin-right:0px;" class="float-left">
                    <a href="{{ url('/bitacora') }}" class="btn btn-secondary float-right"><i class="fa fa-sm fa-fw fa-home"></i>&nbsp;Regresar</a>
                </div>               
            </div>
            <div class="card-text">
                {!! Form::open(['route'=>['bitacora.store'], 'method'=>'POST']) !!}
                    @csrf
                    <div class="row">
                        <x-adminlte-select name="select_dependencia" fgroup-class="col-md-12">
                            <option value="" disabled selected>¿A qué dependencia te diriges?</option>                      
                            <x-adminlte-options :options="$dependencias" :selected="old('select_dependencia')"/>
                        </x-adminlte-select>     

                        <!-- Campo adicional, inicialmente oculto -->
                        <x-adminlte-input name="dependencia_especifica" id="input_otro" label-class="text-orange" label=""  placeholder="Por favor especificar otra dependencia" type="text" fgroup-class="col-md-12" hidden :value="old('dependencia_especifica')" />

                        <x-adminlte-input name="motivo"  placeholder="¿Cúal es el motivo de tu salida?" label-class="text-orange" label="" type="text" fgroup-class="col-md-12" :value="old('motivo')" />

                        @php
                            $config = [
                                'format' => 'DD-MM-YYYY',
                                'autoclose' => true,      // Cierra el calendario al seleccionar una fecha
                                // 'language' => ['url' => 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es.min.js',],
                                'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',],
                            ];
                        @endphp

                        <x-adminlte-input-date name="fecha_salida" :config="$config" placeholder="Selecciona la fecha de salida" label-class="text-orange" label="" fgroup-class="col-md-12" :value="old('fecha_salida')" />

                        {{-- Placeholder, time only and prepend icon --}}
                        @php
                            $config = ['format' => 'HH:mm:ss'];
                        @endphp
                        <x-adminlte-input-date name="hora_salida" :config="$config" placeholder="Selecciona la hora de salida" label-class="text-orange" label="" fgroup-class="col-md-12" :value="old('hora_salida')" />

                        <x-adminlte-textarea name="observacion" label-class="text-orange" label="" type="textarea" fgroup-class="col-md-12"  placeholder="¿Gustas ingresar alguna observación?"/>

                        <x-adminlte-button class="button" label-class="text-orange" label="Guardar" theme="primary" icon="fas fa-save" type="submit" />

                    </div>        

                {!! Form::close() !!}

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
        // Script para mostrar el input cuando se seleccione "Otros"
        document.getElementsByName('select_dependencia')[0].addEventListener('change', function () {
            var inputOtro = document.getElementById('input_otro');
            if (this.value === "17") {  // O el ID de "Otros" si está basado en ID
                inputOtro.removeAttribute('hidden'); // Mostrar el campo
            } else {
                inputOtro.setAttribute('hidden', true); // Ocultar el campo
            }
        });

    </script>
@stop