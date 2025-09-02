@extends('layout')
@section('title', 'Registro de Productos')
@section('content')

<div class="container mt-4" style="max-width: 600px;">
    <h3 class="mb-4 text-center">Registro De Productos</h3>

    <form action="{{ url('productos') }}" method="POST" novalidate>
        @csrf 

        {{-- Marca --}}
        <div class="mb-3">
            <label for="marca" class="form-label fw-bold">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control @error('marca') is-invalid @enderror" placeholder="Ingrese la Marca" value="{{ old('marca') }}">
            @error('marca')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Modelo --}}
        <div class="mb-3">
            <label for="modelo" class="form-label fw-bold">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control @error('modelo') is-invalid @enderror" placeholder="Ingrese el Modelo" value="{{ old('modelo') }}">
            @error('modelo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- RAM --}}
        <div class="mb-3">
            <label for="ram" class="form-label fw-bold">RAM</label>
            <input type="text" id="ram" name="ram" class="form-control @error('ram') is-invalid @enderror" placeholder="Ingrese la RAM" value="{{ old('ram') }}">
            @error('ram')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Precio --}}
        <div class="mb-4">
            <label for="precio" class="form-label fw-bold">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control @error('precio') is-invalid @enderror" placeholder="Ingrese el Precio" value="{{ old('precio') }}" min="0" step="0.01">
            @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Botones --}}
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success px-4">Guardar</button>
            <a href="{{ url('productos') }}" class="btn btn-secondary px-4">Cancelar</a>
        </div>
    </form>
</div>

@stop()
