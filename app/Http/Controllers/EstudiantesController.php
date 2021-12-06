<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiante;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstudiantesController extends Controller
{
    public function vista(){
        return view('auth.estudiantes_registrar');
    }
    public function create(Request $request){

        $request->validate([
            'primer_nombre'=>'required|alpha',
            'apellido_paterno'=>'required|alpha',
            'apellido_materno'=>'required|alpha',
            'fecha_nacimiento'=>'required|date',
            'id_genero'=>'required',
            'rude'=>'required|unique:estudiantes',
            'ci'=>'required|unique:estudiantes'
        ]);

        $estudiante = new estudiante();
        $estudiante -> primer_nombre = $request -> primer_nombre;
        $estudiante -> segundo_nombre = $request -> segundo_nombre;
        $estudiante -> apellido_paterno = $request -> apellido_paterno;
        $estudiante -> apellido_materno = $request -> apellido_materno;
        $estudiante -> fecha_nacimiento = $request -> fecha_nacimiento;
        $estudiante -> id_genero = $request -> id_genero;
        $estudiante -> rude = $request -> rude;
        $estudiante -> ci = $request -> ci;
        $estudiante -> save();

        return redirect()->route('leer.principal');
    } 

    public function index(Request $request)
    {
        //$estudiantes = estudiante::all();
        //return view('auth.estudiantes_lista.leer', compact('auth.estudiantes_lista'));
        //return view::make('auth.estudiantes_lista')->with('auth.estudiantes_lista', $estudiantes);
        //return view('auth.estudiantes_lista',['estudiantes'=> $estudiantes]);

        $texto=trim($request->get('texto'));
        $estudiantes= DB::table('estudiantes')
                    ->select('id_estudiantes','primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','fecha_nacimiento','id_genero','rude','ci')
                    ->where('apellido_paterno','LIKE','%'.$texto.'%')
                    ->orWhere('ci','LIKE','%'.$texto.'%')
                    ->orderBy('id_estudiantes','asc')
                    ->paginate(50);
        return view('auth.estudiantes_lista',compact('estudiantes','texto'));
      
        

    }

    public function edit($id)
    {
        $estudiante = estudiante::findOrFail($id);
        //return $estudiante;
        //return $estudiantes;
        //return view('auth.estudiantes_lista',compac('estudiante'));
        return view('auth.estudiantes_editar',['estudiante'=> $estudiante]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'primer_nombre'=>'required|alpha',
            'apellido_paterno'=>'required|alpha',
            'apellido_materno'=>'required|alpha',
            'fecha_nacimiento'=>'required|date',
            'id_genero'=>'required',
            'rude'=>'required',
            'ci'=>'required'
        ]);

        $estudiante=estudiante::findOrFail($id);
        $estudiante -> primer_nombre = $request ->input('primer_nombre');
        $estudiante -> segundo_nombre = $request -> input('segundo_nombre');
        $estudiante -> apellido_paterno = $request -> input('apellido_paterno');
        $estudiante -> apellido_materno = $request -> input('apellido_materno');
        $estudiante -> fecha_nacimiento = $request -> input('fecha_nacimiento');
        $estudiante -> id_genero = $request -> input('id_genero');
        $estudiante -> rude = $request -> input('rude');
        $estudiante -> ci = $request -> input('ci');
        $estudiante->save();
        return redirect()->route('leer.principal');
    }

    public function destroy($id){

        $status='';
        try {
            $estudiante = estudiante::find($id);
            $estudiante->delete();
        } catch (\Exception $e) {
            $status = 'Estudiante relacionado, imposible de eliminar';
        }
        //Retornar vista
        return redirect()->route('leer.principal')
                 ->with('status', $status);
    }

    public function busqueda(Request $request){
        $texto=trim($request->get('texto'));
        $estudiantes=BD::table('estudiantes')
                    ->select('id_estudiantes','apellido_paterno','ci')
                    ->where('apellido_paterno','LIKE', '%'.$texto.'%')
                    ->orWhere('ci','LIKE', '%'.$texto.'%');
                    -orderBy('apellido_paterno','asc')
                    ->paginate(50);
        return view('auth.estudiantes_lista',['estudiantes'=> $estudiantes]);
    }


}
