@extends('layout')
@section('title', 'roles')
@section ('content')
<h3 class="mt-4 mb-3">Editar Roles</h3>
<form id="id" action="{{ route('usuario.update',$usuarios->id)}}"  method="POST">
    @csrf 
    @method('PUT')
      <div class="row">
        <div class="col-md-4">
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese el Nombre" value="{{ old('nombre',$usuarios->nombre) }}">
            @error('nombre')
            <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
            <div class="col-md-4">
                @php
                $grupos=[];
                foreach ($acciones as $accion){
                    $grupos[$accion->modulo][]=$accion;
                }
                @endphp
                @foreach ($grupos as $modulo => $items)
                <h4>{{$modulo}}</h4>
                @foreach ($items as $item)
                @if(in_array($item->id,$permisosAsignados))
                <input type="checkbox" name="accion_id[]" class="form-check-input" value="{{$item->id}}" checked>{{$item -> nombre}}<br>
                @else
                <input type="checkbox" name="accion_id[]" class="form-check-input" value="{{$item->id}}">{{$item -> nombre}}<br>
                @endif
                @endforeach
                <hr>
                @endforeach
            </div>
         </div>
         
    <br><br>
    <div class="d-flex gap-2">
    <button type="submit" class="btn btn-success px-4">Guardar</button>
    <a href="{{ url('usuarios') }}" class="btn btn-secondary px-4">Cancelar</a>
</div>

    </div>

</form>
@stop()
@section('js')
<script src="{{ url ('js/jquery.validate.min.js')}}"></script>
<script src="{{ url ('js/localization/messages_es.min.js')}}"></script>

<script>
    $("#form").validate({
        rules:{
            nombre:{
                required:true,
                maxlength: 50
            },
            telefono:{
                require:true,
                maxlength: 100
            },
            rol:{
                required:true,
                maxlength: 100,
            },
            email:{
                required:true,
                maxlength: 150
            },
           password:{
               required:true,
                maxlength: 150
            }
        
        },
   
    });
</script>