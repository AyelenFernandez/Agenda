<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\Evento;
use Illuminate\Support\Collection as Collection;
use Carbon\Carbon;
use Flash;



class adminController extends Controller

{
    public function index()
    {
        $arreglo = array();
        $i = 0;
        $evento = Evento::all();
        $hoy = Carbon::now();

        foreach ($evento as $key) {

            
            if($hoy->toDateString() == $key->fecha){

                $reservas=$key->reservas;
                $arreglo[$i]["evento"]=$key->evento;
                $arreglo[$i]["fecha"]=date('d-m-Y', strtotime($key->fecha));
                $arreglo[$i]["organizador"]=$key->organizador;
                $arreglo[$i]["aulas"]=  array();
                $arreglo[$i]["estado"]=$key->estado;

                foreach ($reservas as $unidad) {
                    $arreglo[$i]["Entrada"]=$unidad->Entrada;
                    $arreglo[$i]["Salida"]=$unidad->Salida;
                    array_push($arreglo[$i]["aulas"], $unidad->aulaAsignada->esp_fisico);
                }
                $i++;
            }
        }
        
        return view('admin.index')->with('arreglo',$arreglo);
    }

    public function vista()
    {
    	return view('admin.changepass');
    }

    public function updatePassword(Request $request){

       $input = $request->all();
       $id = auth()->user()->id;
       $user = User::findOrFail($id);

       if($input['newPassword'] == $input['newPassword_confirm'] && $input['newPassword'] != "" && $input['newPassword_confirm'] != "" )
       { 
            $user->fill([
                   'password' => Hash::make(($input['newPassword']))
               ])->save();
            Flash::success('Contraseña cambiada');
            return redirect(url('admin/changepass'));
       }
       else{

            Flash::error('Error - No se pudo cambien la contraseña');
            return redirect(url('admin/changepass'));


       }
    }

    public function denegado()
    {
      return view('denegado');
    }

    public function sistemaOffline(){

      return view('offline');

    }

    

}

