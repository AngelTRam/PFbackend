<?php

namespace App\Http\Controllers;

use App\Models\Lugares;
use Illuminate\Http\Request;

class LugaresController extends Controller
{
    public function getPlaces($id){
        return $places = Lugares::find($id);
    }

    public function getAllPlaces(){
        return $places = Lugares::all();
    }

    public function addPlace(Request $request){
        $datos = $request->validate($this->validateData());
        $lugares = Lugares::create($datos);
        return(response(['respuesta'=>'Se registró '.$lugares['nombre'].'.'],200));
    }

    public function modifyPlace($id,Request $request){
        $lugares = Lugares::where('id_lugar',$id)->first();
        if(!$lugares){
            return(response(['respuesta'=>'Lugar no encontrado.'],404));
        }
        $datos = $request->validate($this->validateData());
        $lugares -> update($datos);
        return(response(['respuesta'=>'Se modificó '.$lugares['nombre'].'.'],200));
    }

    public function deletePlace($id){
        $lugar = Lugares::find($id);
        if(!$lugar){
            return(response(['respuesta'=>'Lugar no encontrado.'],404));
        }
        $lugar->delete($id);
        return(response(['respuesta'=>'Se eliminó '.$lugar['nombre'].'.'],200));
    }

    public function validateData(){
        return[
            "nombre"=>"required|string",
            "latitud"=>"required|string",
            "longitud"=>"required|string",
            "id_poblacion"=>"required|numeric"
        ];
    }
}
