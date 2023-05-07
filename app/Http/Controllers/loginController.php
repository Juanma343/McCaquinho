<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\NuevoUsuarioRequest;
use App\Models\Usuario;

class loginController extends Controller
{

    
    public function login(Request $request)
    {
        // if(isset($_SESSION['is login']))
        //     if($_SESSION['is login'] == true){

        //         $_SESSION['is login'] = false;
        //         return view('welcome');
        //     }

        session_start();
        if(!isset($_SESSION['is_login']) && $_SESSION['is_login'] == false){
            $nombre = $request->input('nombre');
            $contrasenaLog = $request->input('contrasena');
            
            $usuarios = Usuario::all();

            $salida = null;
            
            for ($i = 0; $i < count($usuarios); $i++) {
                if ($usuarios[$i]->nombre == $nombre) {
                    $salida = $usuarios[$i];
                }
            }

            if ($salida == null) return view('welcome');
            else{
                if ($contrasenaLog == $salida->contrasena){

                    if ($salida->es_consultor == 1) {
        
                        $_SESSION['is_login'] = true;
                        $_SESSION['es_consultor'] = true;
                        return view('welcome');
        
                    } else {
        
                        $_SESSION['is_login'] = true;
                        $_SESSION['es_consultor'] = false;
                        return view('welcome');
        
                    }
        
                } else {
        
                    return view('login.login');
        
                }
            }
        }
        else{
            return view('welcome');
        }
    }

    public function registroview()
    {
        return view('registro.registro');
    }

    public function registro(Request $request)
    {
        $nombre = $request->input('nombre');
        $contrasena = $request->input('contrasena');
        $es_consultor = $request->input('es_consultor');

        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->contrasena = $contrasena;
        $usuario->es_consultor = $es_consultor;
        $usuario->save();

        return view('login.login');
    }

    public function loginview()
    {
        return view('login.login');
    }
    public function logout()
    {
        session_start();
        $_SESSION['is login'] = false;
        return view('welcome');
    }
    public function verSesion()
    {
        session_start();
        echo $_SESSION['is_login'];
        return view('welcome');
    }
}
