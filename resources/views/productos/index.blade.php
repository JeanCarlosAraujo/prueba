@extends('layout')
@section('title','Productos')

@section('content')
<div class="d-flex flex-column align-items-center text-center">
    <h3 class="mt-4">Bienvenido {{ Auth::user()->nombre }} a la sección de productos!</h3>

    <div class="w-75 text-end mt-3 mb-3">
        <a href="{{ url('productos/create') }}" class="btn btn-primary">Nuevo Producto</a>
    </div>

    @if($productos->isEmpty())
        <p class="mt-4">No hay productos disponibles.</p>
    @else
        <div class="table-responsive w-75 mt-4">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ number_format($producto->precio, 2) }}</td>
                        <td>
                            <a href="{{ url('productos/'.$producto->id.'/edit') }}" class="btn btn-outline-warning btn-sm">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Quieres eliminar el producto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@stop()
