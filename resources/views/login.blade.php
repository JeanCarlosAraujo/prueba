<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <div class="container">

    <h2 class="text-center mt-4 mb-4">Inicio de Sesion</h2>
    @if(session('type'))
    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        <strong>Noticia: </strong>{{ session ('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="row">
        <div class="col-md-4"></div>
        <div class="card p-3 col-md-4 text-center">
        <form action="check" method="POST">
    @csrf
        <div class="row mt-2">
            <div class="col-md-12">
                <input type="email" name="email" class="form-control" placeholder="Ingrese su Email" required>
            </div>
        </div>
             <div class="row mt-2">
            <div class="col-md-12">
                <input type="password" name="password" class="form-control" placeholder="Ingrese su clave" required>
            </div>
        </div>
        <button class="btn btn-primary mt-2 ">Enviar</button>

    </form>
    </div>
    </div>
    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script> 
</body>
</html>

