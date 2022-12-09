<?php

namespace App\Http\Controllers;

use App\Models\LugaresViajes;
use Illuminate\Http\Request;

class LugaresViajesController extends Controller
{
    public function getAllPlacesTravels(){
        $PT = LugaresViajes::join('lugares','lugares-viajes.id_lugar','=','lugares.id_lugar')
        ->join('viajes','lugares-viajes.id_viaje','=','viajes.id_viaje')
        ->select(
            'lugares-viajes.id_intermedia as id',
            'lugares.nombre as lugar',
            'viajes.nombre as viaje',
            'lugares-viajes.notas'
        )->get();
        return response($PT,200);
    }
    public function getPlacesTravels($id){
        $PT = LugaresViajes::join('lugares','lugares-viajes.id_lugar','=','lugares.id_lugar')
        ->join('viajes','lugares-viajes.id_viaje','=','viajes.id_viaje')
        ->select(
            'lugares-viajes.id_intermedia as id',
            'lugares.nombre as lugar',
            'viajes.nombre as viaje',
            'lugares-viajes.notas'
        )->where('id_intermedia',$id)
        ->get();
        return response($PT,200);
    }
    public function addPlaceTravel(Request $request){
        $datos = $request->validate($this->validateData());
        $lugaresviajes = LugaresViajes::create($datos);
        return(response(['respuesta'=>'Se registró '.$lugaresviajes['notas'].'.'],200));
    }

    public function modifyPlaceTravel($id,Request $request){
        $lugaresviajes = LugaresViajes::where('id_intermedia',$id)->first();
        if(!$lugaresviajes){
            return(response(['respuesta'=>'LugarViaje no encontrado.'],404));
        }
        $datos = $request->validate($this->validateData());
        $lugaresviajes -> update($datos);
        return(response(['respuesta'=>'Se modificó '.$lugaresviajes['notas'].'.'],200));
    }

    public function deletePlaceTravel($id,Request $request){
        $lugaresviajes = LugaresViajes::where('id_intermedia',$id)->first();
        if(!$lugaresviajes){
            return(response(['respuesta'=>'Lugar-viaje no encontrado.'],404));
        }
        $lugaresviajes->delete();
        return(response(['respuesta'=>'Se eliminó '.$lugaresviajes['notas'].'.'],200));
    }

    public function validateData(){
        return[
            "id_lugar"=>"required|numeric",
            "id_viaje"=>"required|numeric",
            "notas"=>"required|string"
        ];
    }
}
