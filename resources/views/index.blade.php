@extends('layout')
@section('title','Saludo')
@section('content')

<h3>Hola {{ Auth::user()->nombre }}, Bienvenido!</h3>
<div class="mt-5 text-center">
        <h2 class="mb-4">Este es tu Mercado</h2>
        <p class="lead">Aquí encontrarás los mejores productos al mejor precio, con la frescura que solo nosotros garantizamos.</p>
    </div>

        <div class="container-cards">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('img/xiaomi14.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">XIAOMI 14</h5>
            <p class="card-text">El Xiaomi 14 es un smartphone de gama alta con pantalla AMOLED de 6,36", procesador Snapdragon 8 Gen 3, cámara principal Leica de 50 MP, batería de 4610 mAh con carga rápida de 90W y diseño premium.</p>
        </div>
    </div>
    <h1>hola</h1>
    <h1>hola</h1>
    <h1>hola</h1>
            
    <p>chulo</p>
    <p>chulo</p>
    <p>chulo</p>
            
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('img/iphonexr.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">IPHONE XR</h5>
            <p class="card-text">El iPhone XR cuenta con pantalla Liquid Retina de 6,1", chip A12 Bionic, cámara de 12 MP, reconocimiento facial Face ID y batería de larga duración en un diseño resistente al agua.</p>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="{{ asset('img/motorola.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Motorola g58 Power</h5>
            <p class="card-text">El Motorola G58 es un smartphone potente con pantalla de 6,6″ a 144 Hz, procesador MediaTek Dimensity 7300 Plus, hasta 12 GB de RAM y cámaras versátiles, todo en un diseño ligero de apenas 192 g..</p>
        </div>
    </div>
</div>


@stop()
