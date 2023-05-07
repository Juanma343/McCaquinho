<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use \App\Models\Platos;

use Session;

class pedidoController extends Controller
{
    
    public function guardar(Request $request) {

        $pedido = new Pedido;
        $pedido->nombre = $request->txtNombre;
        $pedido->direccion = $request->txtDireccion;
        $pedido->telefono = $request->intTelefono;

        $pedido->save();

        return view('pedido.pedido');
        
    }

    public function mostrarPlatosPedido(Request $request) { 

        $platos = Session::get('platos');

        $idPlato=[];
        $cantidades=[]; // para pasarle a la vista la cantidad de cada plato.

        if ($platos != null){

            foreach ($platos['platos'] as $id => $cantidad) {
                
                if ($cantidad > 0) {
                
                    $idPlato[] = $id;
                    $cantidades[] = $cantidad;

                }

            }  

        }

        $plato = Platos::select('id', 'nombre', 'url_foto', 'precio')->whereIn('id', $idPlato)->get();

        return view('pedido.pedido')->with(['platos' => $plato, 'cantidades' => $cantidades]);

    }

    public function sumarCantidad(Request $request) { 

        $platos = Session::get('platos');
        
        if ($platos != null) {

            foreach ($platos['platos'] as $id => $cantidad){

                if ($request->id == $id) $platos['platos'][$id] = $cantidad + 1; 

            }  

        }

        Session::put("platos", $platos); 
        
        return redirect('pedido');

    }

    public function restarCantidad(Request $request) { 

        $platos = Session::get('platos');
        
        if ($platos != null) {

            foreach ($platos['platos'] as $id => $cantidad){
            
                if ($request->id == $id) $platos['platos'][$id] = $cantidad - 1; 

            }  
            
        }

        Session::put("platos", $platos); 
        
        return redirect('pedido');

    }

    public function mostrar_pedido(Request $request) {         
        
        $pedidos = Pedido::orderBy('id', 'desc')->paginate(4);         
        
        return view('pedido.mostrar_pedido')->with(['pedidos' => $pedidos]);     
    
    }

}