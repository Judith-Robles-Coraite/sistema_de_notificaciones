<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\docentes;
use App\Models\usuarios;
use App\Models\cargos;
use Illuminate\Support\Facades\DB;

class DocentesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $docentes= DB::table('docentes')
                    ->select('id_docentes','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','fecha_nacimiento','direccion','correo','telefono','celular','id_usuario','id_cargo','id_genero','estudios_realizados','ci')
                    ->where('apellido_paterno','LIKE','%'.$texto.'%')
                    ->orWhere('ci','LIKE','%'.$texto.'%')
                    ->orderBy('id_docentes','asc')
                    ->paginate(21);
        $usuarios=usuarios::All();
        return view('docentes.index',compact('docentes','texto'));

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios= usuarios::All();
        $cargos= cargos::All();
        return view('docentes.create',['usuarios'=> $usuarios,
                                        'cargos'=> $cargos ]);
    }


    public function mostrarusuario($id){

        $usuarios= usuarios::findOrFail($id);
        $cargos= cargos::All();
        return view('docentes.create1',['usuarios'=> $usuarios,
                                        'cargos'=> $cargos ]);
    }

    public function mostrarusuarioedit($id){

        $usuarios= usuarios::findOrFail($id);
        $cargos= cargos::All();
        return view('docentes.edit',['usuarios'=> $usuarios,
                                        'cargos'=> $cargos ]);
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
            'id_usuario'=>'required|unique:docentes',
            'primer_nombre'=>'required|alpha',
            'apellido_paterno'=>'required|alpha',
            'apellido_materno'=>'required|alpha',
            'fecha_nacimiento'=>'required|date',
            'direccion'=>'required',
            'correo'=>'required|email',
            'celular'=>'required|numeric',
            'id_cargo'=>'required',
            'id_genero'=>'required',
            'estudios_realizados'=>'required',
            'ci'=>'required|unique:docentes'
        ]);

        $docentes= new docentes;
        $docentes -> primer_nombre = $request ->input('primer_nombre');
        $docentes -> segundo_nombre = $request -> input('segundo_nombre');
        $docentes -> apellido_paterno = $request -> input('apellido_paterno');
        $docentes -> apellido_materno = $request -> input('apellido_materno');
        $docentes -> fecha_nacimiento = $request -> input('fecha_nacimiento');
        $docentes -> direccion = $request -> input('direccion');
        $docentes -> correo = $request -> input('correo');
        $docentes -> telefono = $request -> input('telefono');
        $docentes -> celular = $request -> input('celular');
        $docentes -> id_usuario = $request -> input('id_usuario');
        $docentes -> id_cargo = $request -> input('id_cargo');
        $docentes -> id_genero = $request -> input('id_genero');
        $docentes -> estudios_realizados = $request -> input('estudios_realizados');
        $docentes -> ci = $request -> input('ci');
        $docentes->save();
        return redirect()->route('docentes.index');
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
        $docentes = docentes::findOrFail($id);
        $cargos= cargos::All();
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        return view('docentes.edit',['docentes'=> $docentes,
                                    'cargos'=> $cargos]);
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
            'id_usuario'=>'required',
            'primer_nombre'=>'required|alpha',
            'apellido_paterno'=>'required|alpha',
            'apellido_materno'=>'required|alpha',
            'fecha_nacimiento'=>'required|date',
            'direccion'=>'required',
            'correo'=>'required|email',
            'celular'=>'required|numeric',
            'id_cargo'=>'required',
            'id_genero'=>'required',
            'estudios_realizados'=>'required',
            'ci'=>'required'
        ]);

        $docentes= docentes::findOrFail($id);
        $docentes -> primer_nombre = $request ->input('primer_nombre');
        $docentes -> segundo_nombre = $request -> input('segundo_nombre');
        $docentes -> apellido_paterno = $request -> input('apellido_paterno');
        $docentes -> apellido_materno = $request -> input('apellido_materno');
        $docentes -> fecha_nacimiento = $request -> input('fecha_nacimiento');
        $docentes -> direccion = $request -> input('direccion');
        $docentes -> correo = $request -> input('correo');
        $docentes -> telefono = $request -> input('telefono');
        $docentes -> celular = $request -> input('celular');
        $docentes -> id_usuario = $request -> input('id_usuario');
        $docentes -> id_cargo = $request -> input('id_cargo');
        $docentes -> id_genero = $request -> input('id_genero');
        $docentes -> estudios_realizados = $request -> input('estudios_realizados');
        $docentes -> ci = $request -> input('ci');
        $docentes->save();
        return redirect()->route('docentes.index');
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
        $docentes=docentes::findOrFail($id);
        $docentes->delete();
        } catch (\Exception $e) {
            $status = 'Docente relacionado, imposible de eliminar';
        }
        //Retornar vista
        return redirect()->route('docentes.index')
                 ->with('status', $status);
    }

}
