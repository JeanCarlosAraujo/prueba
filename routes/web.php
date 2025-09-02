<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CelularController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('login');
});

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
});

Route::get('productos', [ProductosController::class, 'index'])->name('productos.index');

Route::post('check',[UsuarioController::class,'check']);

Route::middleware(['auth'])->group(function (){
  
    Route::get('home', function () {
        return view('index');
    });
    // Route::resource('celulares',CelularController::class);
    Route::resource('usuarios',UsuarioController::class);
    
    Route::middleware(['admin'])->group(function(){
        
        Route::resource('productos',ProductosController::class);
        Route::resource('roles',RolesController::class);
        Route::resource('usuarios',UsuarioController::class);

    });

    Route::middleware(['client'])->group(function(){
        
        Route::get('productos', function () {
            return view('productos.index');
        });
    });
});

