<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobiliario;

class MobiliarioController extends Controller
{
    public function administrar_mobiliario(){
        return view('mobiliario.administrar_mobiliario');
    }

    public function modificar(Request $request){
        $mobiliario = Mobiliario::findOrFail(1);
        if($request->Columna == 1){
            $mobiliario->mesas_disponibles = $request->numero;
        }else{
            $mobiliario->mesas_maximas = $request->numero;
        }
        $mobiliario->save();
        return view('mobiliario.administrar_mobiliario_con_exito');
    }

    public static function mesas_disponibles(){
        $mobiliario = Mobiliario::findOrFail(1);
        return $mobiliario->mesas_disponibles;
    }

    public function mesas_maximas(){
        $mobiliario = Mobiliario::findOrFail(1);
        return $mobiliario->mesas_maximas;
    }

    


}
