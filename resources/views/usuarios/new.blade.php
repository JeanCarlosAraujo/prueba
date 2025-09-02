@extends('layout')
@section('title', 'Registro de Usuarios')
@section('content')

<div class="container mt-4" style="max-width: 600px;">
    <h3 class="mb-4 text-center">Registro De Usuarios</h3>

    <form action="{{ url('usuarios') }}" method="POST" novalidate>
        @csrf 

        {{-- Nombre --}}
        <div class="mb-3">
            <label for="nombre" class="form-label fw-bold">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Ingrese el Nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Teléfono --}}
        <div class="mb-3">
            <label for="telefono" class="form-label fw-bold">Teléfono</label>
            <input type="number" id="telefono" name="telefono" class="form-control @error('telefono') is-invalid @enderror" placeholder="Ingrese el Teléfono" value="{{ old('telefono') }}">
            @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Rol --}}
        <div class="mb-3">
            <label class="form-label fw-bold d-block">Seleccione el Rol:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input @error('rol_id') is-invalid @enderror" type="radio" name="rol_id" id="rolAdmin" value="1" {{ old('rol_id') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="rolAdmin">Administrador</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input @error('rol_id') is-invalid @enderror" type="radio" name="rol_id" id="rolVendedor" value="2" {{ old('rol_id') == '2' ? 'checked' : '' }}>
                <label class="form-check-label" for="rolVendedor">Cliente</label>
            </div>
            @error('rol_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese el Email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="password" class="form-label fw-bold">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingrese la Contraseña">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Botones --}}
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success px-4">Guardar</button>
            <a href="{{ url('usuarios') }}" class="btn btn-secondary px-4">Cancelar</a>
        </div>
    </form>
</div>

@stop()
