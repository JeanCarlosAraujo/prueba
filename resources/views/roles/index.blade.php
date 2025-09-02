@extends('layout')
@section('title','Saludo')

@section('content')
<div class="d-flex flex-column align-items-center text-center">

    <h3 class="mt-4">Listado de Roles</h3>

    <div class="mb-3">
        <a href="{{url('roles/create')}}" class="btn btn-primary">Nuevo rol</a>
    </div>

    @if(session('type'))
    <div class="alert alert-{{session('type')}} alert-dismissible fade show w-75" role="alert">
        <strong>Noticia: </strong>{{ session ('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive w-75">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $rol)
                <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{ $rol->nombre }}</td>
                    <td>
                        <a href="{{ url('roles/'. $rol->id . '/edit') }}" class="btn btn-outline-warning btn-sm">Editar</a>
                        <form action="{{ route('usuarios.destroy', $rol->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Quieres eliminar el registro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@stop()
