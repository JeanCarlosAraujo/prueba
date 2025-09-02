<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Celular;
use Illuminate\Support\Facades\Validator; 

class CelularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Celular::all();
        return view ('celulares.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('celulares.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'marca' =>'required|max:100',
            'modelo' =>'required|max:150',
            'ram_gb' => 'required|integer|max:100',
            'precio' => 'required|numeric|min:1'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else{
        
        Celular::create($request->all());
        return redirect('celulares')->with('type','success')->with('message','Registro Creado Exitosamente');   
     }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datos = Celular ::find($id);
        return view ('celulares.edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $validator = Validator::make($request->all(),[
            'marca' =>'required|max:100',
            'modelo' =>'required|max:150',
            'ram_gb' => 'required|integer|max:100',
            'precio' => 'required|numeric|min:1'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else{
        $celular = Celular ::find($id);
        $celular->update($request->all());
        return redirect('celulares')->with('type','warning')
                                    ->with('message','Registro actualizado Exitosamente');   

    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Celular::destroy($id);
        return redirect('celulares')->with('type','danger')
                                    ->with('message','El Registro se Elimino');
    }
}
