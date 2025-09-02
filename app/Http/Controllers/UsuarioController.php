<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('verificar:ver_usuarios')->only('index');
        $this->middleware('verificar:crear_usuarios')->only('create', 'store');
        $this->middleware('verificar:editar_usuarios')->only('edit', 'update');
        $this->middleware('verificar:eliminar_usuarios')->only('destroy');
        $this->middleware('verificar:ver_detalle_usuarios')->only('show');
    }

    public function check(Request $request)
    {
        if(Auth::attempt($request->only('email','password')))
        return redirect()->intended('home');

        return redirect('login')->with('type','danger')
                                ->with('message','Usuario o contraseña incorrectos');

    }

    public function index()
    {
        //
        $datos = Usuario::with('rol')->get();
        return view('usuarios.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('usuarios.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(),[
           'nombre' => 'required|max:50',
            'telefono' => 'required|max:100',
            'rol_id' => 'required|max:100',
            'email' => 'required|max:150',
            'password' => 'max:150',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else{

            $datos = $request->all();
            $datos ['password'] = Hash::make($datos['password']);
        Usuario::create($datos);    
        return redirect('usuarios')->with('type','success')
                                    ->with('message','Registro Creado Exitosamente');
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
        //
        $usuarios = Usuario::find($id);
        if (!$usuarios) {
            return redirect('usuarios')->with('type', 'danger')
                                       ->with('message', 'Usuario no encontrado');
        }
        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|max:50',
        'telefono' => 'required|max:100',
        'rol' => 'required|max:100',
        'email' => 'required|max:150',
        'password' => 'nullable|max:150',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $usuario = Usuario::find($id);
    if (!$usuario) {
        return redirect('usuarios')->with('type', 'danger')
                                   ->with('message', 'Usuario no encontrado');
    }

    $data = $request->only(['nombre', 'telefono', 'rol', 'email']);

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->input('password'));
    }

    $usuario->update($data);

    return redirect('usuarios')->with('type', 'warning')
                               ->with('message', 'Registro actualizado exitosamente');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Usuario::destroy($id);
        return redirect('usuarios')->with('type','danger') ->with('message','Registro  Exitosamente');

    }
}
