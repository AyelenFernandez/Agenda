<?php

namespace App\Models;
use Eloquent as Model;

class Evento extends Model
{
    
    public $table = 'eventos';
    
    public $fillable = [
        'evento',
        'organizador',
        'color',
        'estado',
        'apellidonombre',
        'email',
        'telefono',
        'asistentes',
        'catering',
        'objetivos',
        'destinatarios'
    ];

    protected $casts = [
        //'fecha' => 'datetime',
        'evento' => 'string',
        'organizador' => 'string',
        'color' => 'string',
        'estado' => 'string',
        'apellidonombre' => 'string',
        'email' => 'email',
        'telefono' => 'string',
        'asistentes' => 'integer',
        'catering' => 'string',
        'objetivos' => 'text',
        'destinatarios' => 'text'
    ];

    public static $rules = [
        //'fecha' => 'date',
        //'evento' => 'required',
        //'organizador' => 'required',
        'asistentes' => 'integer',
        //'apellidonombre' => 'required',
        'email' => 'email'
        //'telefono' => 'required',
        //'objetivos' => 'required',
        //'destinatarios' => 'required'
    ];

    public function reservas(){

        return $this->hasmany('\App\Models\ReservaHora','evento_id');
    }
    public function scopeEventos($query)
    {
        return $query->where('estado', '!=', 'eliminado');
    }

    public function scopeEventosActivos($query)
    {
        return $query->where('estado', '=', 'activo');
    }

    public function scopeEventosCancelado($query)
    {
        return $query->where('estado', '=', 'cancelado');
    }

    public function scopeEliminar($query, $id)
    {
        return $query->where('id', '=', $id)->update(['estado' => 'eliminado']);
    }
    public function scopeSemanaMes($query, $fechaini, $fechafin)
    {
        return $query->whereBetween('fecha', array($fechaini, $fechafin))->orderBy('fecha')->get();
    }

    public function scopeFechaEvento($query, $fechaEvento){

     return $query->where('fecha', '=', $fechaEvento)->get();

    }
} 