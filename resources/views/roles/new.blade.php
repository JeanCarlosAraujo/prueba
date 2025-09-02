@extends('layout')
@section('title', 'Registro de Roles')

@section('content')
<div class="container mt-4" style="max-width: 600px;">
    <h3 class="mb-4 text-center">Registro De Rol</h3>

    <form action="{{ url('roles') }}" method="POST" novalidate>
        @csrf
        {{-- Nombre del Rol --}}
        <div class="mb-3">
            <label for="rol" class="form-label fw-bold">Nombre del Rol</label>
            <input type="text" id="rol" name="nombre" class="form-control @error('rol') is-invalid @enderror" placeholder="Ingrese el nombre del rol" value="{{ old('nombre') }}">
            @error('rol')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!-- --------------------------------------- -->
         <br>
         <div class="row">
            <div class="col-md-4">
                @php
                $grupos=[];
                foreach ($datos as $accion){
                    $grupos[$accion->modulo][]=$accion;
                }
                @endphp
                @foreach ($grupos as $modulo => $items)
                <h4>{{$modulo}}</h4>
                @foreach ($items as $item)
                <input type="checkbox" name="accion_id[]" class="form-check-input" value="{{$item->id}}">{{$item -> nombre}}<br>
                @endforeach
                <hr>
                @endforeach
            </div>
         </div>

        {{-- Botones --}}
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success px-4">Guardar</button>
            <a href="{{ url('roles') }}" class="btn btn-secondary px-4">Cancelar</a>
        </div>
    </form>
</div>
@stop()
