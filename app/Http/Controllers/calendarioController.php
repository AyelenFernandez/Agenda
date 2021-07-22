<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Support\Collection as Collection;
use Carbon\Carbon;

class calendarioController extends Controller
{

    public function index()
    {
        return view('calendario.index');
    }

    public function userCalendario()
    {
        return view('user.user-calendario');
    }

    public function feedJson()
    {
        
        $arr= array();
        $i=0;
        $evento = Evento::all();
        
        foreach ($evento as $key) {

            $reservas = $key->reservas;
            $arr[$i]["title"] = $key->evento;
            $arr[$i]["start"] = date('Y-m-d', strtotime($key->fecha));
            $arr[$i]["fecha"] = date('d-m-Y', strtotime($key->fecha));
            $arr[$i]["organizador"] = $key->organizador;
            $arr[$i]["nombre"] = $key->evento;
            $arr[$i]["espaciofisico"] = array();
            $arr[$i]["apellidonombre"] = $key->apellidonombre;
            $arr[$i]["email"] = $key->email;
            $arr[$i]["telefono"] = $key->telefono;
            $arr[$i]["estado"] = $key->estado;
            
            if ($key->catering == 1) {
                $arr[$i]["catering"] = 'Con Catering';
            }else{
                $arr[$i]["catering"] = 'Sin Catering';
            }

            $arr[$i]["objetivos"] = $key->objetivos;
            $arr[$i]["destinatarios"] = $key->destinatarios;
            $arr[$i]["asistentes"] = $key->asistentes;
            
            foreach ($reservas as $unidad) {
                $arr[$i]["start"]=date('Y-m-d', strtotime($key->fecha))."T".$unidad->Entrada;
                $arr[$i]["end"]=date('Y-m-d', strtotime($key->fecha))."T".$unidad->Salida;
                $arr[$i]["entradasalida"]=$unidad->Entrada." - ".$unidad->Salida;  
                array_push($arr[$i]["espaciofisico"],$unidad->aulaAsignada->esp_fisico);
            }
            if($key->estado == 'cancelado'){
                    $arr[$i]["borderColor"]="#c0392b";
                    $arr[$i]["backgroundColor"]="#c0392b";
                    $arr[$i]["title"]= $arr[$i]["title"]." - Cancelado";
                }
                else{
                    $arr[$i]["borderColor"]=$key->color;
                    $arr[$i]["backgroundColor"]=$key->color;
                } 
            $i++;
        }
        return ($arr);
    }

    public function tv(){
        
        $arreglo = array();
        $arreglo2 = array();
        
        $i = 0;
        $evento = Evento::all();

        // dd($evento);

        $hoy = Carbon::now();

        foreach ($evento as $key) {

            if($hoy->toDateString() == $key->fecha){

                $reservas=$key->reservas;
                $arreglo[$i]["evento"]=$key->evento;
                $arreglo[$i]["organizador"]=$key->organizador;
                $arreglo[$i]["fecha"]=date('d-m-Y', strtotime($key->fecha));
                $arreglo[$i]["aulas"]=  array();
                $arreglo[$i]["ubicacion"]=  array();                
                $arreglo[$i]["estado"]=$key->estado;
                foreach ($reservas as $unidad) {
                    $arreglo[$i]["Entrada"]=$unidad->Entrada;
                    $arreglo[$i]["Salida"]=$unidad->Salida;
                    
                    array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                    array_push($arreglo[$i]["ubicacion"], $unidad->aulaAsignada->ubicacion);
                }
                $i++;
            }
        }
        // dd($arreglo);
        
        return view('calendario.reservaTv')->with('arreglo',$arreglo);

    }
}    