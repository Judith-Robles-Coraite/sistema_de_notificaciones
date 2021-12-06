<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asistencia;
use App\Models\aulas;
use App\Models\gestion;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $docentes=docentes::All();
        $grados=grado::All();
        $aulas= aulas::All();
        return view('aulas.index',['aulas'=> $aulas,
                    'docentes'=>$docentes,
                    'grados'=>$grados]);

    }

    public function create()
    {
        $aulas= aulas::All();
        $gestion= gestion::All();
        return view('asistencia.create',['aulas'=> $aulas,
                                    'gestion'=>$gestion ]);
    }

    public function mostrarprofesor($id){

        $docentes= docentes::findOrFail($id);
        $grados= grado::All();
        $gestion= gestion::All();
        return view('aulas.create1',['docentes'=> $docentes,
                                        'grados'=> $grados,
                                        'gestion'=>$gestion ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_aula'=>'required',
            'id_gestion_escolar'=>'required',
        ]);

        $asistencia= new asistencia;
        $asistencia -> id_aula = $request -> input('id_aula');
        $asistencia -> id_gestion_escolar = $request ->input('id_gestion_escolar');
        $asistencia -> fecha = $request -> input('fecha');
        $asistencia->save();
        return redirect()->route('asistencia.create');
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
        $aulas = aulas::findOrFail($id);
        $grados= grado::All();
        $gestion= gestion::All();
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        return view('aulas.edit',['aulas'=> $aulas,
                                    'grados'=> $grados,
                                    'gestion'=>$gestion]);
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
            'id_grado'=>'required',
            'id_docente'=>'required',
            'id_gestion_escolar'=>'required',
            'paralelo'=>'required'
        ]);

        $aulas= aulas::findOrFail($id);
        $aulas -> id_gestion_escolar = $request ->input('id_gestion_escolar');
        $aulas -> id_grado = $request -> input('id_grado');
        $aulas -> id_docente = $request -> input('id_docente');
        $aulas -> paralelo = $request -> input('paralelo');
        $aulas->save();
        return redirect()->route('aulas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
       // $aulas=aulas::findOrFail($id);
        //$aulas->delete();
        //return redirect()->route('aulas.index');
        $status='';
        try {
            $aulas=aulas::findOrFail($id);
            $aulas->delete();
        } catch (\Exception $e) {
            $status = 'Aula relacionada, imposible de eliminar';
        }
        //Retornar vista
        return redirect()->route('aulas.index')
                 ->with('status', $status);
    }

}