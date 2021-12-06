<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use App\Models\tipo_usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $tipo_usuario = tipo_usuario::All();
        $usuarios= DB::table('usuarios')
                    ->select('id_usuario','nombre','clave','fecha_registro','id_tipo_usuario')
                    ->where('nombre','LIKE','%'.$texto.'%')
                    ->orWhere('fecha_registro','LIKE','%'.$texto.'%')
                    ->orderBy('id_usuario','asc')
                    ->paginate(50);
        return view('usuarios.index',['usuarios'=> $usuarios, 
                                        'texto'=>$texto,
                                        'tipo_usuario'=> $tipo_usuario]);



    }

    public function index1(Request $request)
    {
        $texto=trim($request->get('texto'));
        $usuarios= DB::table('usuarios')
                    ->select('id_usuario','nombre','clave','fecha_registro','id_tipo_usuario')
                    ->where('nombre','LIKE','%'.$texto.'%')
                    ->orWhere('fecha_registro','LIKE','%'.$texto.'%')
                    ->orderBy('id_usuario','asc')
                    ->paginate(50);
        return view('usuarios.index1',compact('usuarios','texto'));



    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'clave' =>'required',
            'fecha_registro'=>'required',
            'id_tipo_usuario'=>'required'
        ]);
        $usuarios= new usuarios;
        $usuarios -> nombre = $request ->input('nombre');
        $usuarios -> clave = $request -> input('clave');
        $usuarios -> fecha_registro = $request -> input('fecha_registro');
        $usuarios -> id_tipo_usuario = $request -> input('id_tipo_usuario');
        $usuarios->save();
        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $usuarios = usuarios::findOrFail($id);
        $tipo_usuario = tipo_usuario::All();
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        return view('usuarios.edit',['usuarios'=> $usuarios,
                                     'tipo_usuario'=>$tipo_usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
            'clave' =>'required',
            'fecha_registro'=>'required',
            'id_tipo_usuario'=>'required'
        ]);
        
        $usuarios= usuarios::findOrFail($id);
        $usuarios -> nombre = $request ->input('nombre');
        $usuarios -> clave = $request -> input('clave');
        $usuarios -> fecha_registro = $request -> input('fecha_registro');
        $usuarios -> id_tipo_usuario = $request -> input('id_tipo_usuario');
        $usuarios->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status='';
        try {
            $usuarios=usuarios::findOrFail($id);
            $usuarios->delete();
        } catch (\Exception $e) {
            $status = 'Usuario relacionado, imposible de eliminar';
        }
        //Retornar vista
        return redirect()->route('usuarios.index')
                 ->with('status', $status);
    }

}