<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\NuevoUsuarioRequest;
use App\Models\Usuario;

use Session;

class loginController extends Controller
{

    public function login(Request $request) {

        if (!Session::get('is_login') && Session::get('is_login') == false) {

            $nombre = $request->input('nombre');
            $contrasenaLog = $request->input('contrasena');
            
            $usuarios = Usuario::all();

            $salida = null;
            
            for ($i = 0; $i < count($usuarios); $i++) {

                if ($usuarios[$i]->nombre == $nombre) {

                    $salida = $usuarios[$i];

                }
                
            }

            if ($salida == null) return redirect()->route('loginview')->with('success', 'Usuario o contraseña incorrectos');
            else {

                if ($contrasenaLog == $salida->contrasena){

                    if ($salida->es_consultor == 1) {
        
                        Session::put('is_login', true);
                        Session::put('es_consultor', true);

                        return redirect()->route('consultar_reservas');
        
                    } else {
        
                        Session::put('is_login', true);
                        Session::put('es_consultor', false);

                        return redirect()->route('platos');
        
                    }
        
                } else {
        
                    return redirect()->route('loginview')->with('success', 'Usuario o contraseña incorrectos');
        
                }

            }

        } else {

            return redirect()->route('platos');

        }
    }

    public function registroview()
    {
        if (Session::get('is_login') && !Session::get('es_consultor')) {

            return view('registro.registro');        

        } else {

            return redirect()->route('loginview');

        }

    }

    public function registro(Request $request) {

        if (Session::get('is_login') && !Session::get('es_consultor')) {

            $nombre = $request->input('nombre');
            $contrasena = $request->input('contrasena');
            $es_consultor = $request->input('es_consultor');

            $usuario = new Usuario();
            $usuario->nombre = $nombre;
            $usuario->contrasena = $contrasena;
            $usuario->es_consultor = $es_consultor;
            $usuario->save();

            return redirect()->route('registroview')->with('success', 'Usuario creado correctamente');
            
        } else{
          
            return redirect()->route('loginview');

        }     

    }

    public function loginview() {

        if (Session::get('is_login') == null || Session::get('is_login') == false) {

            return view('login.login');
            
        } else {

            return redirect()->route('logout');

        } 
    }

    public function logout()
    {
        if (Session::get('is_login') != null) {

            Session::put('is_login', false);
            Session::put('es_consultor', true);

            return redirect()->route('platos');

        } else {

            return redirect()->route('platos');

        }

    }

    public function verSesion()
    {

        if(Session::get('is_login')){
            
            echo "true";
        
        } else {

            echo "false";

        }

        return view('welcome');

    }

    public function nuestra_historia () {

        return view('nuestra_historia');

    }

}
