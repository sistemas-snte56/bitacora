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
                        <x-adminlte-select name="select_dependencia" label-class="text-orange" label="¿A QUE DEPENDENCIA TE DIRIGES?" fgroup-class="col-md-12">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-orange">
                                    <i class="fas fa-city text-white"></i>
                                </div>
                            </x-slot>                            
                            <x-adminlte-options :options="$dependencias" :selected="old('select_dependencia')" empty-option="SELECCIONA" />
                        </x-adminlte-select>     
                
                        <!-- Campo adicional, inicialmente oculto -->
                        <x-adminlte-input name="dependencia_especifica" label-class="text-orange" id="input_otro" label="POR FAVOR ESPECIFICAR OTRA DEPENDENCIA" placeholder="Especifica otra dependencia" type="text" fgroup-class="col-md-12" style="display:none;" value="{{old('dependencia_especifica')}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-orange">
                                    <i class="fas fa-building text-white"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input> 













                        <x-adminlte-input name="motivo" label-class="text-orange" label="¿CÚAL ES EL MOTIVO DE TU SALIDA?" placeholder="Motivo de tu salida"  type="text" fgroup-class="col-md-12" value="{{old('motivo')}}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-orange">
                                    <i class="fas fa-exclamation-circle text-white"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>                            

                        @php
                            $config = [
                                'format' => 'DD-MM-YYYY',
                                'autoclose' => true,      // Cierra el calendario al seleccionar una fecha
                                // 'language' => ['url' => 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es.min.js',],
                                'language' => ['url' => 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',],
                            ];
                        @endphp

                        <x-adminlte-input-date name="fecha_salida" :config="$config" placeholder="Ingresa fecha" label-class="text-orange" label="FECHA DE SALIDA" fgroup-class="col-md-12" :value="old('fecha_salida')">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-orange">
                                    <i class="fas fa-calendar text-white"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>                            


                        {{-- Placeholder, time only and prepend icon --}}
                        @php
                            $config = ['format' => 'HH:mm:ss'];
                        @endphp
                        <x-adminlte-input-date name="hora_salida" :config="$config" placeholder="En que horario..." label-class="text-orange" label="HORA DE SALIDA" fgroup-class="col-md-12" :value="old('hora_salida')" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-orange">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>

                        <x-adminlte-textarea name="observacion" label-class="text-orange" label="OBESRVACIONES" type="textarea" fgroup-class="col-md-12"  placeholder="Insert observación..."/>

                        







                        <x-adminlte-button class="button" label-class="text-orange" label="Guardar" theme="primary" icon="fas fa-save" type="submit" />

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
    <script>
        // Script para mostrar el input cuando se seleccione "Otros"
        document.getElementById('select_dependencia').addEventListener('change', function () {
            var inputOtro = document.getElementById('input_otro');
            if (this.value === "17") {  // O el ID de "Otros" si está basado en ID
                inputOtro.style.display = 'block'; // Mostrar el campo
            } else {
                inputOtro.style.display = 'none'; // Ocultar el campo
            }
        });
    </script>
@stop