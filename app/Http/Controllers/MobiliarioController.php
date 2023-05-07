<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobiliario;

use Session;

class MobiliarioController extends Controller
{
    public function administrar_mobiliario() {

        if(Session::get('is_login') && Session::get('es_consultor') == false){

            return view('mobiliario.administrar_mobiliario');

        } else {

            return view('login.login');

        }

    }

    public function modificar(Request $request){

        if (Session::get('is_login') && Session::get('es_consultor') == false) {

            $mobiliario = Mobiliario::findOrFail(1);

            if ($request->Columna == 1) {

                $mobiliario->mesas_disponibles = $request->numero;

            } else {
            
                $mobiliario->mesas_maximas = $request->numero;
            
            }

            $mobiliario->save();

            return redirect()->route('administrar_mobiliario')->with('success', 'Los datos del mobiliario han sido modificados correctamente');
            
        } else {

            return view('login.login');

        }


    }

    public static function mesas_disponibles() {

        $mobiliario = Mobiliario::findOrFail(1);

        return $mobiliario->mesas_disponibles;

    }

    public function mesas_maximas() {

        $mobiliario = Mobiliario::findOrFail(1);

        return $mobiliario->mesas_maximas;

    }

}