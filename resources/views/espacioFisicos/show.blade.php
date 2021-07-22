@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
<span class="titleBox">Espacio Fisico: {!! $espacioFisico->esp_fisico !!}</span>
<a class="btn btn-primary" href="{!! route('admin.espaciofisico.index') !!}">Volver</a>
@endsection

@section('body')
<div class="col-md-12 eventosShow boxShow">
    <div class="col-md-6">
        <div class="form-group">
		    {!! Form::label('esp_fisico', 'Esp. Fisico:') !!}
		    <p>{!! $espacioFisico->esp_fisico !!}</p>
		</div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
		    {!! Form::label('ubicacion', 'Ubicacion:') !!}
		    <p>{!! $espacioFisico->ubicacion !!}</p>
		</div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
		    {!! Form::label('capacidad', 'Capacidad:') !!}
		    <p>{!! $espacioFisico->capacidad !!} personas</p>
		</div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
		    {!! Form::label('recursos', 'Recursos:') !!}
		    <p>{!! $espacioFisico->recursos !!}</p>
		</div>
    </div>
</div>
@endsection