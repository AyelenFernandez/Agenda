<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\ReservaHora;
use App\Models\EspacioFisico;
use Carbon\Carbon;
use Dompdf\Dompdf;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function exp(Request $request)
    {
        $input = $request->input();
        // dd($input);
        return view ('planillas.planillaPDF');
    }

    public function exportDefault()
    {       
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


        /*$variable = Evento::all();  */
        $pdf = \PDF::loadView('planillas.planilla_general', compact('arreglo', $arreglo));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
        /*return $pdf->download('Planilla de Eventos.pdf');*/
    }




    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
