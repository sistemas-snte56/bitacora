@extends('adminlte::page')

@section('title', 'Usuario')

@section('content_header')
    <h4>USUARIOS</h4>
@stop



@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>LISTA DE USUARIOS</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title mb-4">
                <a href="{{ route('admin.user.create') }}" class="btn bg-primary float-right">
                    <i class="fa fa-sm fa-fw fa-plus"></i> Nuevo usuario
                </a>
            </div>
            <div class="card-text">
            {{-- Setup data for datatables --}}
                @php
                    $heads = [
                        'NOMBRE',
                        'EMAIL',
                        'ROL',
                        ['label' => 'ACCIONES', 'no-export' => true, 'width' => 12],
                    ];

                    $config = [
                        'order' => [
                            [0, 'asc'], // Ordenar por FECHA (columna 0)
                        ],
                        'columns' => [
                            ['orderable' => true], 
                            ['orderable' => false], 
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
                    @foreach($users as $user )
                        <tr>
                            <td>{{$user->name }}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $roleName)
                                        <h5><span class="badge badge-success">{{$roleName}}</span></h5>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.user.edit', $user)}}" class="btn btn-success btn-sm" >
                                    Editar
                                </a>
                                {!! Form::open(['route' => ['admin.user.destroy',$user], 'method' => 'DELETE', 'class' => 'formEliminar', 'style' => 'display: inline']) !!}
                                    @csrf
                                    {!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}

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
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrarlo!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    }
                });

            })
        });
    </script>

    @if(session('success_create'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('success_create') }}"
                Swal.fire({
                    icon: 'success',
                    title: mensaje,
                    text: 'El usuario que registraste se guardo satisfactoriamente.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif 
    @if(session('success_update'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('success_update') }}"
                Swal.fire({
                    icon: 'success',
                    title: mensaje,
                    text: 'El que registraste se actualizo satisfactoriamente.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif 
@stop