<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel='stylesheet' href="{{ url('css/style.css') }}">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
    <!-- Barra de navegación -->
<nav class="custom-navbar">
    <div class="nav-content">
        <a href="{{ url('home') }}">Inicio</a>
        @if (Auth::user())
        @if (Auth::user()->rol->nombre == "Administrador")
        <a href="{{ url('usuarios') }}">Usuarios</a>
        <a href="{{ url('roles') }}">Roles</a>
        @endif
        <a href="{{ url('productos') }}">Productos</a>
        <a href="{{ url('categorias') }}">Categorías</a>
        <a class="logout" href="{{ url('logout') }}">Salir</a>
        @endif
    </div>
</nav>

<!-- Contenedor del contenido -->
<main class="page-content">
    @yield('content')
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script> 
    @yield('js')
</body>
</html>