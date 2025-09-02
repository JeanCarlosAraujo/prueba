@extends('layout')
@section('title','Saludo')
@section('content')
<h3 class="mt-4">Listado de Celulares</h3>
<div class="text-end">
    <a href="{{url('celulares/create')}}" class="btn btn-primary">Nuevo Celular</a>
</div>
<br>
@if(session('type'))
<div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
    <strong>Noticia: </strong>{{ session ('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<table class="table">
    <thead>
        <th>Marca</th>
        <th>Modelo</th>
        <th>RAM (GB)</th>
        <th>Precio</th>
    </thead>
    <tbody>
        @foreach($datos as $celular)
        <tr>
            <td>
                {{ $celular ->marca }}
            </td>
            <td>
                {{ $celular ->modelo }}
            </td>
            <td>
                {{ $celular ->ram_gb }}
            </td>
            <td>
                {{ $celular -> precio }}
            </td>
            <td>
                <a href="{{url('celulares/'.$celular->id.'/edit')}}" class="btn btn-warning">Editar</a>
                <form action="{{ route('celulares.destroy', $celular->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <BUtton class="btn btn-danger" onclick="return confirm('¿Quieres eliminar el registro?')">Eliminar</BUtton>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop()