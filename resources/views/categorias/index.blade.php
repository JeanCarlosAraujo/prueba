@extends('layout')
@section('title','Saludo')
@section('content')
<h3>Bienvenido {{ Auth::user()->nombre }} a la Aplicacion de Mercado</h3>

@stop()