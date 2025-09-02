<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Celular;
use Illuminate\Support\Facades\Validator; 

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view ('productos.index', compact('productos'));
    }

    public function create()
    {
        //
        return view('productos.new');
    }

}