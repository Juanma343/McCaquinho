<?php

namespace App\Http\Controllers;

use \App\Models\Platos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

class PlatoController extends Controller
{

    public function index() {

        $is_login = false;
        $es_consultor = true;

        if (Session::get('is_login') == true) {

            $is_login = true;

            if (Session::get('es_consultor') == false) {

                $es_consultor = false;

            }

        }

        $platos = Platos::all()->where('plato_eliminado', false);
        
        return view('carta')->with(['platos' => $platos, 'is_login' => $is_login, 'es_consultor' => $es_consultor]);
        
    }

    public function guardarEnSesion(Request $request) { 

        $platos = Session::get('platos');

        if ($platos == null) {

            $aux = array("platos" => array($request->id => 1));
            // print_r($aux);
            Session::put("platos", $aux); 
            
        } else {
        
            $repetido = false;
            
            foreach ($platos['platos'] as $id => $cantidad) {

                if ($id == $request->id) {
                    $platos["platos"][$id] = $cantidad + 1;
                    Session::put('platos', $platos);
                    $repetido = true;
                    // sprint_r($platos);
                }

            }

            if (!$repetido) {
                $platos['platos']["$request->id"] = 1;
                Session::put('platos', $platos);
                // print_r($platos);
            } 

        }	

        return redirect()->route('platos')->with('success', 'El plato ha sido añadido a tu carrito correctamente');

    }

    public function eliminarPlato (Request $request) {

        \DB::table('plato')
            ->where('id', $request->id)  
            ->limit(1)  
            ->update(array('plato_eliminado' => true));

        return redirect()->route('platos')->with('success', 'El plato ha sido eliminado correctamente');

    }

    public function añadirPlato(){
        return view('platos.plato');
    }

    public function guardarPlato(Request $request){
        $plato = new Platos;
        $plato->nombre = $request->Nombre_plato;
        $plato->descripcion = $request->Descripcion;
        $plato->precio = $request->Precio;
        $plato->plato_eliminado = false;

        $directorio = "img/";
        $foto = $directorio . basename($_FILES["foto"]["name"]);
        $formato_foto = strtolower(pathinfo($foto,PATHINFO_EXTENSION));
        $existe = file_exists($foto);
        $subida_ok = "0";


        if($formato_foto == "jpg" || $formato_foto == "png" || $formato_foto == "jpeg" ) {
            if(file_exists($foto) != "1"){
                $subida_ok = "1";
            }else{
                $subida_ok = 0;
            }
        }
        


        if($subida_ok=="1"){

            move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
            $mensajeStatus = "Plato creado correctamente";
            $plato->url_foto = $foto;
            $plato->save();
            
        }else{
           
            $mensajeStatus = "No ha sido posible crear el plato. Comprueba el formato de la imagen y que ninguna foto tenga el mismo nombre";
            
        }

        return redirect()->route('añadirPlato')->with('success', $mensajeStatus);
    }

}
