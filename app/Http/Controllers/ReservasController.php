<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Http\Controllers\MobiliarioController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;


class ReservasController extends Controller
{
    
    public function consultar_reservas()
    {
        if(Session::get('is_login') && Session::get('es_consultor') == true){

            $reservas = Reserva::orderBy('id', 'desc')->paginate(4);
            return view('reservas.consultar_reservas')->with('reservas', $reservas);
        }else{
            return view('login.login');
        }
    }

    public function mostrar_reserva(Reserva $reserva)
    {   
        if(Session::get('is_login') && Session::get('es_consultor') == true){
            return view('reservas.mostrar_reserva')->with(['reserva' => $reserva]);
        }else{
            return view('login.login');
        }
    }

    public function realizar_reserva()
    {
        if(!Session::get('is_login')){
            return view('reservas.realizar_reserva');
        }
        else{
            return view('welcome');
        }
        
    }

    public function mesas_en_uso(Request $request){
        $sumaMesas = DB::table('reserva')
                    ->where('timestamp', $request->fecha)
                    ->sum('mesas');

        return $sumaMesas;
    }

    public function guardar(Request $request){
        if(!Session::get('is_login')){
            $reserva_valida = true;

            $reserva = new Reserva;
            $reserva->nombre = $request->nombre;
            $reserva->telefono = $request->telefono;
            $reserva->num_comensales = $request->num_comensales;

            $num_mesas = intdiv($reserva->num_comensales, 2) - 1;
            if($num_mesas <= 0){
                $num_mesas = 1;
            }

            $MesasDisponibles = MobiliarioController::mesas_disponibles();

            $mesas_en_uso = $this->mesas_en_uso($request);

            if($num_mesas + $mesas_en_uso <= $MesasDisponibles){
                $reserva->mesas = $num_mesas;
            }else{
                $reserva_valida = false;
                $mensaje = "No hay suficientes mesas disponibles para $reserva->num_comensales comensales, en la fecha seleccionada";
            }

            if($request->fecha > date("Y-m-d H:i:s")){
                $reserva->timestamp = $request->fecha;
            }else{
                $reserva_valida = false;
                $mensaje = "La fecha introducida no es válida";
            }
            

            
            $reserva->observaciones = $request->observaciones;

            if($reserva_valida == true){
                
                $mensaje = "$reserva->nombre, ha reservado usted mesa para $reserva->num_comensales comensales.<br> Teléfono de contacto: $reserva->telefono. <br> Buen apetito!";
                echo "<div class='alert alert-success text-center' role='alert'>";
                echo "<p>$mensaje</p>";
                echo "</div>";
                $reserva->save();
                return view('reservas.realizar_reserva');
            }else{
                echo "<div class='alert alert-danger text-center' role='alert'>";
                echo"<p>Reserva NO realizada</p>";
                echo "<p>$mensaje</p>";
                echo "</div>";
                return view('reservas.realizar_reserva');
            }
        }else{
            return view('welcome');
        }
        
    }
}
