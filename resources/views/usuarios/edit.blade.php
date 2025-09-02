@extends('layout')
@section('title', 'usuarios')
@section ('content')
<h3 class="mt-4 mb-3">Editar Usuarios</h3>
<form id="id" action="{{ route('usuarios.update',$usuarios->id)}}"  method="POST">
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
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="number" name="telefono" class="form-control" placeholder="Ingrese el Telefono" value="{{ old('telefono', $usuarios->telefono) }}">
            @error('telefono')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
             <strong> Seleccione el Rol:</strong>
               <br>
                <input type="radio" name="rol" value="1">Administrador 
                <input type="radio" name="rol" value="2">Vendedor    
            @error('rol')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <input type="email" name="email" class="form-control" placeholder="Ingrese el Email" value="{{ old('email',$usuarios->email) }}">
            @error('email')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-4">
            <input type="password" name="password" class="form-control" placeholder="Ingrese el password" value="{{ old('password',$usuarios->password) }}">
            @error('password')
             <div class="error compacto col-lg-5 "> {{ $message }}</div>
            @enderror
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