<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\ReservaHora;
use App\Models\EspacioFisico;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class excelController extends Controller
{
    public function exp(Request $request)
    {
        $input = $request->input();
        // dd($input);
        return view ('planillas.planillaExcel');
    }


    public function index()
    {
        $arreglo = array();
        $datos = array();
        Excel::create('Eventos', function($excel)
        {
            $excel->sheet('Eventos', function($sheet) {
                $eventos = Evento::Eventos()->orderby('fecha')->get();
                $aulas = EspacioFisico::all();
                $i = 0;
                foreach ($eventos as $evento) {
                    $espFisico = '';
                    $reserva = ReservaHora::aulas($evento->id)->get();
                    $arreglo[$i]["Estado"] = $evento->estado;
                    $arreglo[$i]["Fecha"] = date('d-m-Y', strtotime($evento->fecha));
                    $arreglo[$i]["Nombre del Evento"] = $evento->evento;
                    $arreglo[$i]["Organizador"] = $evento->organizador;
                    $arreglo[$i]["Objetivos"] = $evento->objetivos;
                    $arreglo[$i]["Destinatarios"] = $evento->destinatarios;
                    $arreglo[$i]["Asistentes"] = $evento->asistentes;
                    if ($evento->catering == '1') {
                        $arreglo[$i]["Catering"] = 'Con Catering';
                    } else {
                        $arreglo[$i]["Catering"] = 'Sin Catering';
                    }
                    $arreglo[$i]["Contacto"] = $evento->apellidonombre;
                    $arreglo[$i]["E-Mail"] = $evento->email;
                    $arreglo[$i]["Telefono"] = $evento->telefono;
                    $arreglo[$i]["aulas"] = array();
                    foreach ($reserva as $unidad) {
                        $arreglo[$i]["Inicia"] = $unidad->Entrada;
                        $arreglo[$i]["Termina"] = $unidad->Salida;
                        array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                    }
                    foreach ($arreglo[$i]["aulas"] as $item) {
                        $espFisico = $espFisico.' - '.$item;
                    }
                    $arreglo[$i]["Espacio Fisico"] = $espFisico;
                    $i++;
                }
                $sheet->fromArray($arreglo);
            });
        })->export('xls');
    }

    public function dia()
    {
        $arreglo = array();
        $datos = array();
        Excel::create('Eventos del Dia', function($excel)
        {
            $excel->sheet('Eventos del Dia', function($sheet) {
                $eventos = Evento::Eventos()->orderby('fecha')->get();
                $aulas = EspacioFisico::all();
                $hoy = Carbon::now();
                $i = 0;
                foreach ($eventos as $evento) {
                    if($hoy->toDateString() == $evento->fecha){
                        $espFisico = '';
                        $reserva = ReservaHora::aulas($evento->id)->get();
                        $arreglo[$i]["Estado"] = $evento->estado;
                        $arreglo[$i]["Fecha"] = date('d-m-Y', strtotime($evento->fecha));
                        $arreglo[$i]["Nombre del Evento"] = $evento->evento;
                        $arreglo[$i]["Organizador"] = $evento->organizador;
                        $arreglo[$i]["Objetivos"] = $evento->objetivos;
                        $arreglo[$i]["Destinatarios"] = $evento->destinatarios;
                        $arreglo[$i]["Asistentes"] = $evento->asistentes;
                        if ($evento->catering == '1') {
                            $arreglo[$i]["Catering"] = 'Con Catering';
                        } else {
                            $arreglo[$i]["Catering"] = 'Sin Catering';
                        }
                        $arreglo[$i]["Contacto"] = $evento->apellidonombre;
                        $arreglo[$i]["E-Mail"] = $evento->email;
                        $arreglo[$i]["Telefono"] = $evento->telefono;
                        $arreglo[$i]["aulas"] = array();
                        foreach ($reserva as $unidad) {
                            $arreglo[$i]["Inicia"] = $unidad->Entrada;
                            $arreglo[$i]["Termina"] = $unidad->Salida;
                            array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                        }
                        foreach ($arreglo[$i]["aulas"] as $item) {
                            $espFisico = $espFisico.' - '.$item;
                        }
                        $arreglo[$i]["Espacio Fisico"] = $espFisico;
                        $i++;
                    }
                }
                
                $sheet->fromArray($arreglo);
            });
        })->export('xls');
    }

    public function semana()
    {
        $arreglo = array();
        $datos = array();
        Excel::create('Eventos de la Semana', function($excel)
        {
            $excel->sheet('Eventos de la Semana', function($sheet) {
                $now = Carbon::now();
                $primerDia = Carbon::create($now->year, $now->month, $now->day,"00","00","00");
                $ultimoDia = Carbon::create($now->year, $now->month, $now->day,"23","59","59");
                $diaSemana = $now->dayOfWeek; # El día de la semana (0 - 7)
                if($diaSemana==0) { $diaSemana=7; }
                $eventos = Evento::SemanaMes($primerDia->subDays($diaSemana-1)->toDateString(), $ultimoDia->addDays(7-$diaSemana)->toDateString());
                $aulas = EspacioFisico::all();
                $i = 0;
                foreach ($eventos as $evento) {
                    $espFisico = '';
                    $reserva = ReservaHora::aulas($evento->id)->get();
                    $arreglo[$i]["Estado"] = $evento->estado;
                    $arreglo[$i]["Fecha"] = date('d-m-Y', strtotime($evento->fecha));
                    $arreglo[$i]["Nombre del Evento"] = $evento->evento;
                    $arreglo[$i]["Organizador"] = $evento->organizador;
                    $arreglo[$i]["Objetivos"] = $evento->objetivos;
                    $arreglo[$i]["Destinatarios"] = $evento->destinatarios;
                    $arreglo[$i]["Asistentes"] = $evento->asistentes;
                    if ($evento->catering == '1') {
                        $arreglo[$i]["Catering"] = 'Con Catering';
                    } else {
                        $arreglo[$i]["Catering"] = 'Sin Catering';
                    }
                    $arreglo[$i]["Contacto"] = $evento->apellidonombre;
                    $arreglo[$i]["E-Mail"] = $evento->email;
                    $arreglo[$i]["Telefono"] = $evento->telefono;
                    $arreglo[$i]["aulas"] = array();
                    foreach ($reserva as $unidad) {
                        $arreglo[$i]["Inicia"] = $unidad->Entrada;
                        $arreglo[$i]["Termina"] = $unidad->Salida;
                        array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                    }
                    foreach ($arreglo[$i]["aulas"] as $item) {
                        $espFisico = $espFisico.' - '.$item;
                    }
                    $arreglo[$i]["Espacio Fisico"] = $espFisico;
                    $i++;
                }
                
                $sheet->fromArray($arreglo);
            });
        })->export('xls');
    }

    public function mes()
    {
        $arreglo = array();
        $datos = array();
        Excel::create('Eventos del Mes', function($excel)
        {
            $excel->sheet('Eventos del Mes', function($sheet) {
                $now = Carbon::now();
                $primerDia = Carbon::create($now->year, $now->month, 1,"00","00","00");
                $mesproximo = Carbon::create($now->year, ($now->month)+1, 1,"23","59","59");
                $ultimoDia = $mesproximo->addDays(-1);
                $eventos = Evento::SemanaMes($primerDia->toDateString(), $ultimoDia->toDateString());
                $aulas = EspacioFisico::all();
                $i = 0;
                foreach ($eventos as $evento) {
                    $espFisico = '';
                    $reserva = ReservaHora::aulas($evento->id)->get();
                    $arreglo[$i]["Estado"] = $evento->estado;
                    $arreglo[$i]["Fecha"] = date('d-m-Y', strtotime($evento->fecha));
                    $arreglo[$i]["Nombre del Evento"] = $evento->evento;
                    $arreglo[$i]["Organizador"] = $evento->organizador;
                    $arreglo[$i]["Objetivos"] = $evento->objetivos;
                    $arreglo[$i]["Destinatarios"] = $evento->destinatarios;
                    $arreglo[$i]["Asistentes"] = $evento->asistentes;
                    if ($evento->catering == '1') {
                        $arreglo[$i]["Catering"] = 'Con Catering';
                    } else {
                        $arreglo[$i]["Catering"] = 'Sin Catering';
                    }
                    $arreglo[$i]["Contacto"] = $evento->apellidonombre;
                    $arreglo[$i]["E-Mail"] = $evento->email;
                    $arreglo[$i]["Telefono"] = $evento->telefono;
                    $arreglo[$i]["aulas"] = array();
                    foreach ($reserva as $unidad) {
                        $arreglo[$i]["Inicia"] = $unidad->Entrada;
                        $arreglo[$i]["Termina"] = $unidad->Salida;
                        array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                    }
                    foreach ($arreglo[$i]["aulas"] as $item) {
                        $espFisico = $espFisico.' - '.$item;
                    }
                    $arreglo[$i]["Espacio Fisico"] = $espFisico;
                    $i++;
                }
                
                $sheet->fromArray($arreglo);
            });
        })->export('xls');
    }
}