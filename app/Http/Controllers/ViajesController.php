<?php

namespace App\Http\Controllers;
use App\Models\Viajes;
use Illuminate\Http\Request;

class ViajesController extends Controller
{
    public function getAllTravels(){
        return Viajes::all();
    }

    public function getTravel($id){
        return viajes::find($id);
    }

    public function addTravel(Request $request){
        $datos = $request->validate($this->validateData());
        $viajes = Viajes::create($datos);
        return(response(['respuesta'=>'Se registró '.$viajes['Nombre'].'.'],200));
    }

    public function modifyTravel($id,Request $request){
        $viajes = Viajes::where('id_viaje',$id)->first();
        if(!$viajes){
            return(response(['respuesta'=>'Viaje no encontrado.'],404));
        }
        $datos = $request->validate($this->validateData());
        $viajes -> update($datos);
        return(response(['respuesta'=>'Se modificó '.$viajes['Nombre'].'.'],200));
    }

    public function deleteTravel($id,Request $request){
        $viajes = Viajes::where('id_viaje',$id)->first();
        if(!$viajes){
            return(response(['respuesta'=>'Viaje no encontrado.'],404));
        }
        $viajes->delete();
        return(response(['respuesta'=>'Se eliminó '.$viajes['Nombre'].'.'],200));
    }

    public function validateData(){
        return[
            "nombre"=>"required|string"
        ];
    }
}
