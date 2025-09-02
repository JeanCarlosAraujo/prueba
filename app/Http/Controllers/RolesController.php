<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Accion;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    // Mostrar listado de roles
    public function index()
    {
        $datos = Rol::all();
        return view('roles.index', compact('datos'));
    }

    // Mostrar formulario para crear nuevo rol
    public function create()
    {
        $datos= Accion::all();
        return view('roles.new',compact('datos'));  // Aquí cargas la vista para crear rol

    }

    // Guardar nuevo rol
    public function store(Request $request)
    {
        // Validar (puedes agregar reglas más completas)
        // $request->validate([
        //     'nombre' => 'required|string|max:255|unique:roles,nombre',
        // ]);
        $validated = Validator::make($request->all(),[
            'nombre' => 'required| max:50',
        ]);
        if ($validated->fails()){
            return back()->withErrors($validated)
                        ->withInput();
        }
        else{
            $rolCreado = Rol::create ($request->all());

            $acciones = $request ->all('accion_id');
            foreach ($acciones['accion_id'] as $value){
                $permiso['rol_id']= $rolCreado->id;
                $permiso['accion_id']= $value;
                Permiso::create($permiso);
            }
        }

        // Crear y guardar
        // Rol::create([
        //     'nombre' => $request->nombre,
        // ]);

        // Redireccionar con mensaje
        return redirect()->route('roles.index')->with('type', 'success')->with('message', 'exitantemente creado');
    }

    // Mostrar formulario para editar rol existente
    public function edit($id)
    {
        $rol = Rol::find($id);
        $permisos = Permiso::where('rol_id',$id)->get('accion_id');

        foreach($permisos as $permiso){
            $permisosAsignados[] = $permiso['accion_id'];
        }
        $acciones = Accion::all();
        return view('roles.edit', compact('rol', 'permisosAsignados', 'acciones'));
    }

    // Actualizar rol
    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:roles,nombre,' . $rol->id,
        ]);

        $rol->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('roles.index')->with('type', 'success')->with('message', 'Rol actualizado con éxito');
    }

    // Eliminar rol
    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();

        return redirect()->route('roles.index')->with('type', 'danger')->with('message', 'Rol eliminado con éxito');
    }
}

