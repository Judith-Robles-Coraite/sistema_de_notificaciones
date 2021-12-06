<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;


class SessionsController extends Controller
{
    public function create() {
        
        return view('auth.login');
    }

    

    public function store(Request $request){

        $usuarios = login::all();
        $nombr = $request-> nombre;
        $clav= $request-> password;

        $users=login::where('id_usuario', 45)->get(array('nombre'));
        foreach ($users as $o) {
            $r= $o->nombre;
        }

        $user=login::where('id_usuario', 45)->get(array('clave'));
        foreach ($user as $m) {
            $c= $m->clave;
        }

        //return $nombr;
        if($r== $nombr ){
            if($c== $clav){
                return view('bienvenida');
            }else{
                return back()->withErrors([
                    'message2' => 'Usuario o contraseña incorrectos, porfavor ingrese nuevamente los datos'
                ]);
            }
            
        }else{
            
            return back()->withErrors([
                'message1' => 'Usuario o contraseña incorrectos, porfavor ingrese nuevamente los datos'
            ]);
        }

        /*$validator = Validator::make( $request->all(), [
            'nombre' => 'required|',
            'password' => 'required|min:0',
        ] );

       
        if ($validator->fails()) {
            return response()->json( [ 'success' => false, 'errors' => $validator->errors() ] );
        }
        if ( Auth::attempt( [ 'nombre'  => $request->nombre, 'clave' => $request->password ]) ) {

            return 'ok';

         } else {
            return response()->json( [ 'success' => false, 'message' => 'Usuario o contraseña incorrecta' ] );
         }
        
        /*$nombre = $request-> nombre;
        $clave= $request-> clave;
        
        $credentials= $request->validate(
        ['nombre' => 'required|min:3',
         'password' => 'required|string'
        ]); 
        if(Auth::attempt($credentials))
        {
            return $nombre;
        }
        return $clave;*/        
    }

    /*public function store( Request $request ) {

        $validator = Validator::make( $request->all(), [
            'nombre' => 'required|min:3',
            'password' => 'required|min:3',
        ] );

        if ( $validator->fails() ) {
            return response()->json( [ 'success' => false, 'errors' => $validator->errors() ] );
        }


        if ( Auth::attempt( [ 'nombre'  => $request->nombre, 'clave' => $request->pasword ]) ) {

                return 'ok';

         } else {
            return response()->json( [ 'success' => false, 'message' => 'Usuario o contraseña incorrecta' ] );
        }
    }

    public function username()
    {
        return 'nombre';
    }

    public function password()
    {
        return 'password';
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            $this->password() => 'required|string',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function logout()
    {
    Auth::logout();
    return Redirect::to(‘/’);
    }
   
}
