<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\representante;
use Illuminate\Support\Facades\DB;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $texto=trim($request->get('texto'));
        $representantes= DB::table('representates')
                    ->select('id_representantes','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','correo','celular','id_genero','ci')
                    ->where('apellido_paterno','LIKE','%'.$texto.'%')
                    ->orWhere('ci','LIKE','%'.$texto.'%')
                    ->orderBy('id_representantes','asc')
                    ->paginate(21);
        return view('representantes.index',compact('representantes','texto'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('representantes.create');
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
            'primer_nombre'=>'required|alpha',
            'apellido_paterno'=>'required|alpha',
            'apellido_materno'=>'required|alpha',
            'celular'=>'required|numeric',
            'id_genero'=>'required',
            'correo'=>'required|email',
            'ci'=>'required'
        ]);

        $representante= new representante;
        $representante -> primer_nombre = $request ->input('primer_nombre');
        $representante -> segundo_nombre = $request -> input('segundo_nombre');
        $representante -> apellido_paterno = $request -> input('apellido_paterno');
        $representante -> apellido_materno = $request -> input('apellido_materno');
        $representante -> celular = $request -> input('celular');
        $representante -> id_genero = $request -> input('id_genero');
        $representante -> correo = $request -> input('correo');
        $representante -> ci = $request -> input('ci');
        $representante->save();
        return redirect()->route('representante.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $representante = representante::findOrFail($id);
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        return view('representantes.edit',['representante'=> $representante]);
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
            'primer_nombre'=>'required|alpha',
            'apellido_paterno'=>'required|alpha',
            'apellido_materno'=>'required|alpha',
            'celular'=>'required|numeric',
            'id_genero'=>'required',
            'correo'=>'required|email',
            'rude'=>'required',
            'ci'=>'required'
        ]);

        $representante=representante::findOrFail($id);
        $representante -> primer_nombre = $request ->input('primer_nombre');
        $representante -> segundo_nombre = $request -> input('segundo_nombre');
        $representante -> apellido_paterno = $request -> input('apellido_paterno');
        $representante -> apellido_materno = $request -> input('apellido_materno');
        $representante -> celular = $request -> input('celular');
        $representante -> id_genero = $request -> input('id_genero');
        $representante -> correo = $request -> input('correo');
        $representante -> ci = $request -> input('ci');
        $representante->save();
        return redirect()->route('representante.index');
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
            $representante=representante::findOrFail($id);
            $representante->delete();
        } catch (\Exception $e) {
            $status = 'Representante relacionado, imposible de eliminar';
        }
        //Retornar vista
        return redirect()->route('representante.index')
                 ->with('status', $status);

    }
 
}
