<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateeventoRequest;
use App\Http\Requests\UpdateeventoRequest;
use App\Repositories\eventoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Evento;
use App\Models\EspacioFisico;
use Carbon\Carbon;
use Faker;


class eventoController extends InfyOmBaseController
{
    /** @var  eventoRepository */
    private $eventoRepository;

    public function __construct(eventoRepository $eventoRepo)
    {
        $this->eventoRepository = $eventoRepo;
    }

    /**
     * Muestra Listado de Eventos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return redirect('admin/eventos-todos');
    }

    /**
     * Muestra el formulario para crear un nuevo evento
     *
     * @return Response
     */
    public function create()
    {
        $aulas = EspacioFisico::all();        
        return view('admin.evento-create')->with('aulas',$aulas);
    }

    public function createCalendario($fecha)
    {
        $aulas = EspacioFisico::all();
        $datos = ['aulas' => $aulas, 'fecha' => date('Y-m-d', strtotime($fecha))];   
        return view('admin.evento-calendario-create')->with('datos',$datos);
    }

    /**
     * Guarda un nuevo evento creado
     *
     * @param CreateeventoRequest $request
     *
     * @return Response
     */
    public function store(CreateeventoRequest $request)
    {
        $i=0;
        $input = $request->all();
        $var='aulas';
        $fechas = 'fecha';
        $faker = Faker\Factory::create();
        
        /* Controles */
        //Controla si elijo o no un aula
        if(array_key_exists($var, $input) == false)
        {
            Flash::error('No se seleccionaron aulas para el evento');
            return redirect(url('admin/eventos/create'));
        }
        //Controlo si ingrese al menos una fecha
        if(array_key_exists($fechas, $input) == false)
        {
            Flash::error('Ingrese fecha para el evento');
            return redirect(url('admin/eventos/create'));
        }
        //Controlo que no haya fechas repetidas
        if(count($input['fecha']) > count(array_unique($input['fecha']))) 
        { 
            Flash::error('Error, debe ingresar fechas distintas');
            return redirect(url('admin/eventos/create'));
        }
        
        foreach ($input['fecha'] as $fechaUnica) {
       
            $evento = $this->eventoRepository->create($input);
            $auxEvento = Evento::find($evento->id);
            $auxEvento->color =$faker->randomElement($array = array ('#1abc9c', '#f1c40f', '#1abc9c', '#2ecc71'));
            $auxEvento->log = "ALTA - ".currentUser()->name;
            $auxEvento->fecha = $fechaUnica;
            $auxEvento->save();

            $entrada = $input['Entrada'];
            $salida = $input['Salida'];

            foreach ($input['aulas'] as $aula) {
             
                $Reserva = new \App\Models\ReservaHora;
                $Reserva->Entrada=$entrada;
                $Reserva->Salida=$salida;
                $Reserva->evento_id=$evento->id;
                $Reserva->espaciofisico_id=$aula;
                $Reserva->save();
                $i++;
            }
        }
        Flash::success('Evento Guardado correctamente');

        return redirect(url('admin/eventos/create'));
    }

    /**
     * Muestra un evento especifico
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $arreglo = array();
        $evento = \App\Models\Evento::find($id);
        $reserva = \App\Models\ReservaHora::aulas($id)->get();

        $arreglo["evento"]      = $evento->evento;
        $arreglo["fecha"]       = $evento->fecha;
        $arreglo["organizador"] = $evento->organizador;
        $arreglo["estado"]      = $evento->estado;

        $arreglo["apellidonombre"]  = $evento->apellidonombre;
        $arreglo["email"]           = $evento->email;
        $arreglo["telefono"]        = $evento->telefono;
        $arreglo["asistentes"]       = $evento->asistentes;
        $arreglo["catering"]        = $evento->catering;
        $arreglo["objetivos"]        = $evento->objetivos;
        $arreglo["destinatarios"]        = $evento->destinatarios;

        $arreglo["aulas"]       =  array();

        foreach ($reserva as $unidad) {
            $arreglo["Entrada"]=$unidad->Entrada;
            $arreglo["Salida"]=$unidad->Salida;
            array_push($arreglo["aulas"], $unidad->aulaAsignada->esp_fisico);
        }

        return view('admin.evento-show')->with('arreglo',$arreglo);
    }

    /**
     * Muestra el formulario para editar un evento especifico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);
        
        if (empty($evento)) {
            Flash::error('Evento no Encontrado');

            return redirect(url('admin/evento'));
        }

        $aulas = \App\Models\EspacioFisico::all();
        $reservas = $evento->reservas;
        $Entrada = $reservas->first()->Entrada;
        $Salida = $reservas->first()->Salida;
        $datos = ['aulas' => $aulas , 'evento' => $evento, 'reservas' => $reservas, 
        'Entrada' => $Entrada, 'Salida' => $Salida];

        return view('admin.evento-edit')->with('datos',$datos);
        
    }

    /**
     * Actualiza un evento especifico.
     *
     * @param  int              $id
     * @param UpdateeventoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateeventoRequest $request)
    {
        $i=0;
        $var='aulas';
        $input = $request->all();
        if(array_key_exists($var,$input) == false)
            {
            Flash::error('No se seleccionaron aulas para el evento');
             return redirect(url('admin/eventos/'.$input['id'].'/edit'));
            }
        $evento = $this->eventoRepository->findWithoutFail($id);
        
        if (empty($evento)) {
            Flash::error('Evento no Encontrado');

            return back();
        }

        $reservas = $evento->reservas;
        
        foreach($reservas as $fecha){
            $aula = new \App\Models\ReservaHora;
            $aula = $aula->find($fecha->id);
            $aula->delete();
        }

        $entrada = $input['Entrada'];
        $salida = $input['Salida'];
        $fechaNueva = $input['fecha'];

        foreach ($input['aulas'] as $aula) {
         
            $Reserva = new \App\Models\ReservaHora;
            $Reserva->Entrada=$entrada;
            $Reserva->Salida=$salida;
            $Reserva->evento_id=$evento->id;
            $Reserva->espaciofisico_id=$aula;
            $Reserva->save();
            $i++;
        }
        

        $evento = $this->eventoRepository->update($request->all(), $id);

        $auxEvento = Evento::find($evento->id);
        $auxEvento->fecha = $fechaNueva = $input['fecha'];
        $auxEvento->log = "UPDATE - ".currentUser()->name;
        $auxEvento->save();

        Flash::success('Evento actualizado correctamente');
        return redirect(url('admin/eventos/'.$auxEvento->id.'/edit'));
       
    }

    /**
     * Borra un evento especifico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $evento = $this->eventoRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Evento no Encontrado');

            return redirect(url('admin/eventos'));
        }

        $this->eventoRepository->delete($id);

        Flash::success('Evento borrado correctamente');

        return redirect(url('admin/eventos'));
    }

    public function cancelar(Request $request)
    {
        $evento = \App\Models\Evento::findOrFail($request->idEv);

        if ($evento->estado == 'activo') {
            
            $evento->estado = "cancelado";
            $evento->save();
            Flash::success('Evento Cancelado');
            return back();

        } else {

            if ($evento->estado == 'cancelado'){
                $evento->estado = "activo";
                $evento->save();
                Flash::success('Evento Activado');
                return back();
            }
        }
        return redirect()->back;
    }
    public function eliminar(Request $request)
    {
        $evento = $this->eventoRepository->findWithoutFail($request->idEv);
        if (empty($evento)) {
            Flash::error('Evento no Encontrado');
            return back();
        }

        $this->eventoRepository->delete($request->idEv);
        Flash::success('Evento borrado correctamente');

        return back();
    }
    public function eventoDia()
    {
        $i = 0;
        $arreglo = array();
        $evento = \App\Models\Evento::all();
        $hoy = Carbon::now();
        foreach ($evento as $key) {
            if($hoy->toDateString() == $key->fecha){
                $reservas=$key->reservas;
                $arreglo[$i]["evento"]=$key->evento;
                $arreglo[$i]["fecha"]=date('d-m-Y', strtotime($key->fecha));
                $arreglo[$i]["organizador"]=$key->organizador;
                $arreglo[$i]["aulas"]=  array();
                $arreglo[$i]["estado"]=$key->estado;
                $arreglo[$i]["color"]=$key->color;
                $arreglo[$i]["id"]=$key->id;
                foreach ($reservas as $unidad) {
                    $arreglo[$i]["Entrada"]=$unidad->Entrada;
                    $arreglo[$i]["Salida"]=$unidad->Salida;
                    array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                }
                $i++;
            }
        }
        return view('admin.evento-dia')->with('arreglo',$arreglo);
    }
    
    public function eventoSemana()
    {
        $i = 0;
        $arreglo = array();
        $now = Carbon::now();
        $primerDia = Carbon::create($now->year, $now->month, $now->day,"00","00","00");
        $ultimoDia = Carbon::create($now->year, $now->month, $now->day,"23","59","59");
        $diaSemana = $now->dayOfWeek; # El día de la semana (0 - 7)
        if($diaSemana==0) { $diaSemana=7; } # el 0 equivale al domingo...
        $evento = \App\Models\Evento::SemanaMes($primerDia->subDays($diaSemana-1)->toDateString(), $ultimoDia->addDays(7-$diaSemana)->toDateString());
        foreach ($evento as $key) {
            $reservas=$key->reservas;
            $arreglo[$i]["evento"]=$key->evento;
            $arreglo[$i]["fecha"]=date('d-m-Y', strtotime($key->fecha));
            $arreglo[$i]["organizador"]=$key->organizador;
            $arreglo[$i]["aulas"]=  array();
            $arreglo[$i]["estado"]=$key->estado;
            $arreglo[$i]["color"]=$key->color;
            $arreglo[$i]["id"]=$key->id;
            foreach ($reservas as $unidad) {
                $arreglo[$i]["Entrada"]=$unidad->Entrada;
                $arreglo[$i]["Salida"]=$unidad->Salida;
                array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
            }
            $i++;
        }
        return view('admin.evento-semana')->with('arreglo',$arreglo);
    }
    public function eventoMes()
    {
        $i = 0;
        $arreglo = array();
        $now = Carbon::now();
        $primerDia = Carbon::create($now->year, $now->month, 1,"00","00","00");
        $mesproximo = Carbon::create($now->year, ($now->month)+1, 1,"23","59","59");
        $ultimoDia = $mesproximo->addDays(-1);
        $evento = \App\Models\Evento::SemanaMes($primerDia->toDateString(), $ultimoDia->toDateString());
        foreach ($evento as $key) {
            $reservas=$key->reservas;
            $arreglo[$i]["evento"]=$key->evento;
            $arreglo[$i]["fecha"]=date('d-m-Y', strtotime($key->fecha));
            $arreglo[$i]["organizador"]=$key->organizador;
            $arreglo[$i]["aulas"]=  array();
            $arreglo[$i]["estado"]=$key->estado;
            $arreglo[$i]["color"]=$key->color;
            $arreglo[$i]["id"]=$key->id;
            foreach ($reservas as $unidad) {
                $arreglo[$i]["Entrada"]=$unidad->Entrada;
                $arreglo[$i]["Salida"]=$unidad->Salida;
                array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
            }
            $i++;
        }
        return view('admin.evento-mes')->with('arreglo',$arreglo);
    }
    public function eventoTodos()
    {
        $i = 0;
        $arreglo = array();
        $evento = Evento::eventos()->get();
        foreach ($evento as $key) {
            $reservas=$key->reservas;
            $arreglo[$i]["evento"]=$key->evento;
            $arreglo[$i]["fecha"]=date('d-m-Y', strtotime($key->fecha));
            $arreglo[$i]["organizador"]=$key->organizador;
            $arreglo[$i]["aulas"]=  array();
            $arreglo[$i]["estado"]=$key->estado;
            $arreglo[$i]["color"]=$key->color;
            $arreglo[$i]["id"]=$key->id;
            foreach ($reservas as $unidad) {
                $arreglo[$i]["Entrada"]=$unidad->Entrada;
                $arreglo[$i]["Salida"]=$unidad->Salida;
                array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
            }
            $i++;
        }
        // dd($arreglo);
        return view('admin.evento-todos')->with('arreglo',$arreglo);
    }

    public function eventoFecha($fechaEvento)
    {

        $fechaRes = date('Y-m-d', strtotime($fechaEvento));

        $i = 0;
        $arreglo = array();
        $evento = Evento::FechaEvento($fechaRes);
        
        foreach ($evento as $key) {
            
                $reservas=$key->reservas;
                $arreglo[$i]["evento"]=$key->evento;
                $arreglo[$i]["fecha"]=$fechaRes;
                $arreglo[$i]["organizador"]=$key->organizador;
                $arreglo[$i]["aulas"]=  array();
                $arreglo[$i]["estado"]=$key->estado;
                $arreglo[$i]["color"]=$key->color;
                $arreglo[$i]["id"]=$key->id;
                foreach ($reservas as $unidad) {
                    $arreglo[$i]["Entrada"]=$unidad->Entrada;
                    $arreglo[$i]["Salida"]=$unidad->Salida;
                    array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                }
                $i++;
            
        }
        return $arreglo;
    }
}