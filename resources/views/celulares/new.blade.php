@extends('layout')
@section('title', 'celulares')
@section ('content')
<h3 class="mt-4 mb-3">Registro Celulares</h3>
<form action="{{ url('celulares') }}" method="POST">
    @csrf 
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="marca" class="form-control" placeholder="Ingrese la Marca" value="{{ old('marca') }}">
            @error('marca')
            <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="text" name="modelo" class="form-control" placeholder="Ingrese el Modelo" value="{{ old('modelo') }}">
            @error('modelo')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="number" name="ram_gb" class="form-control" placeholder="Ingrese la RAM (GB)" min=0 max=100 value="{{ old('ram_gb') }}">
            @error('ram_gb')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="number" name="precio" class="form-control" placeholder="Ingrese el Precio" value="{{ old('precio') }}">
            @error('precio')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
     <br>
     <button class="btn btn-success">Guardar</button>
     <a href="{{url('celulares')}}" class="btn btn-secondary">Cancelar</a>

    </div>

</form>
@stop()