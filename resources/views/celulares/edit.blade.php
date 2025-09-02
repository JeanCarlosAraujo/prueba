@extends('layout')
@section('title', 'celulares')
@section ('content')
<h3 class="mt-4 mb-3">Editar Celulares</h3>
<form id="id" action="{{ route('celulares.update',$datos->id)}}" " method="POST">
    @csrf 
    @method('PUT')
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="marca" class="form-control" placeholder="Ingrese la Marca" value="{{ old('marca',$datos->marca) }}">
            @error('marca')
            <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="text" name="modelo" class="form-control" placeholder="Ingrese el Modelo" value="{{ old('modelo',$datos->modelo) }}">
            @error('modelo')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="number" name="ram_gb" class="form-control" placeholder="Ingrese la RAM (GB)" value="{{ old('ram_gb',$datos->ram_gb) }}">
            @error('ram_gb')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="number" name="precio" class="form-control" placeholder="Ingrese el Precio" value="{{ old('precio',$datos->precio) }}">
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
@section('js')
<script src="{{ url ('js/jquery.validate.min.js')}}"></script>
<script src="{{ url ('js/localization/messages_es.min.js')}}"></script>

<script>
    $("#form").validate({
        rules:{
            marca:{
                required:true,
                maxlength: 100
            },
            modelo:{
                require:true,
                maxlength: 150
            },
            ram_gb:{
                required:true,
                number:true,
                min:1,
                max: 100
            },
            precio:{
                required:true,
                number:true,
                min:0,
                max:10000000

        }
    }
 });
</script>