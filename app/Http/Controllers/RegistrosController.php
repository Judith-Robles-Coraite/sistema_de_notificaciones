<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\registros;
use App\Models\estudiante;
use App\Models\aulas;
use App\Models\gestion;
use App\Models\representante;
use App\Models\parentesco;
use Session;

class RegistrosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $registros= registros::All();
        $estudiante= estudiante::All();
        $aulas= aulas::All();
        $gestiones= gestion::All();
        $representante= representante::All();
        $parentesco= parentesco::All();
        return view('registros.index',['registros'=> $registros, 
                                        'estudiante'=>$estudiante,
                                        'aulas'=> $aulas,
                                        'gestiones'=> $gestiones,
                                        'representante'=>$representante,
                                        'parentesco'=>$parentesco ]);
  
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiante = 1;
        $aulas= aulas::All();
        $gestiones= gestion::All();
        $representante= representante::All();
        $parentesco= parentesco::All();
        return view('registros.create',['estudiante'=> $estudiante,
                                        'aulas'=> $aulas,
                                        'gestiones'=> $gestiones,
                                        'representante'=>$representante,
                                        'parentesco'=>$parentesco ]);
    }
    public $var=null;
    //public $numero=1;
    public function mostrarestudiante(Request $request,$id){
        
        $estudiante = estudiante::findOrFail($id);
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        //$var = $request->session()->put('estudiante', $estudiante );
        session(['estudiante' => $estudiante]);
        $aulas= aulas::All();
        $gestiones= gestion::All();
        $parentesco= parentesco::All();
        $representante= representante::All();
        //Session::flash('estudiante', $estudiante);
        return view('registros.create1',['estudiante'=> $estudiante,
                                        'aulas'=> $aulas,
                                       'gestiones'=> $gestiones,
                                       'representante'=>$representante,
                                       'parentesco'=>$parentesco ]);

        
    }

    public function mostrarrepresentante(Request $request,$id){
        
        $representante= representante::findOrFail($id);
        $estudiante= Session::get('estudiante');
        //$estudiante = Session::get('estudiante');
        $aulas= aulas::All();
        $gestiones= gestion::All();
        $parentesco= parentesco::All();
        return view('registros.create2',['estudiante'=> $estudiante,
                                        'representante'=>$representante,
                                        'aulas'=> $aulas,
                                        'gestiones'=> $gestiones,
                                        'parentesco'=>$parentesco]);
    }

    public function bandera($bandera){

        $bandera = "1";
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        return view('registros.create',['bandera'=> $bandera]);

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
            'id_estudiante'=>'required|unique:registros',
            'id_aula'=>'required|numeric',
            'id_gestion_escolar'=>'required|numeric',
            'id_representate'=>'required|numeric',
            'id_parentescos'=>'required|numeric',
        ]);

        $registros= new registros;
        $registros -> id_estudiante = $request -> id_estudiante;
        $registros -> id_aula = $request -> id_aula;
        $registros -> id_gestion_escolar = $request -> id_gestion_escolar;
        $registros -> id_representate = $request ->  id_representate;
        $registros -> id_parentescos = $request -> id_parentescos;
        $registros -> save();

        return redirect()->route('registros.index');
    }

    public function edit($id)
    {
        $registros = registros::findOrFail($id);
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        $aulas= aulas::All();
        $gestiones= gestion::All();
        $parentesco= parentesco::All();
        $representante= representante::All();
        return view('registros.edit',['registros'=> $registros,
                                        'aulas'=> $aulas,
                                        'gestiones'=> $gestiones,
                                        'representante'=>$representante,
                                        'parentesco'=>$parentesco]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_estudiante'=>'required',
            'id_aula'=>'required',
            'id_gestion_escolar'=>'required',
            'id_representate'=>'required|numeric',
            'id_parentescos'=>'required',
        ]);
        $registros = registros::findOrFail($id);
        $registros -> id_estudiante = $request -> id_estudiante;
        $registros -> id_aula = $request -> id_aula;
        $registros -> id_gestion_escolar = $request -> id_gestion_escolar;
        $registros -> id_representate = $request ->  id_representate;
        $registros -> id_parentescos = $request -> id_parentescos;
        $registros -> save();

        return redirect()->route('registros.index');

    }

    public function destroy($id){

        $status='';
        try {
            $registros=registros::findOrFail($id);
            $registros->delete();
        } catch (\Exception $e) {
            $status = 'Matricula relacionada, imposible de eliminar';
        }
        //Retornar vista
        return redirect()->route('registros.index')
                 ->with('status', $status);

    }
 

    
}
