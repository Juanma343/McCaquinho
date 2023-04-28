<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Http\Requests\Realizar_Reserva_Request;

class ReservasController extends Controller
{
    
    public function consultar_reservas()
    {
        $reservas = Reserva::orderBy('id', 'desc')->paginate(3);
        return view('reservas.consultar_reservas')->with('reservas', $reservas);
    }

    public function mostrar_reserva(Reserva $reserva)
    {
        return view('reservas.mostrar_reserva')->with(['reserva' => $reserva]);
    }

    public function realizar_reserva()
    {
        return view('reservas.realizar_reserva');
    }

    public function guardar(Realizar_Reserva_Request $request){
        $reserva = Reserva::create($request->only('nombre', 'telefono', 'num_comensales', 'fecha', 'observaciones'));
        return redirect()->route('consultar_reservas',['reserva' => $reserva->id]);
    }


}
