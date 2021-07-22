@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
<span class="titleBox">Evento: {!! $arreglo['evento'] !!}</span>
<a class="btn btn-primary" href="{!! url('admin/eventos') !!}">Volver</a>
@endsection

@section('body')
@include('flash::message')
<div class="col-md-12 eventosShow boxShow">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('evento', 'Evento:') !!}&nbsp;&nbsp;
            {!! $arreglo['evento'] !!}
            <br>
            {!! Form::label('organizador', 'Organizador:') !!}&nbsp;&nbsp;
            {!! $arreglo['organizador'] !!}
            <br>
            {!! Form::label('fecha', 'Fecha:') !!}&nbsp;&nbsp;
            {!! date('d-m-Y', strtotime($arreglo['fecha'])) !!}
            <br>
            {!! Form::label('hora', 'Horario:') !!}&nbsp;&nbsp;
            {!! $arreglo['Entrada'] !!} / {!! $arreglo['Salida'] !!}
            <br>
            @if($arreglo['estado'] == 'cancelado')
                <span class="eventoCancelado">
                    {!! Form::label('estado', 'Estado:') !!}&nbsp;&nbsp;
                    {!! $arreglo['estado'] !!}
                </span>
            @else
                {!! Form::label('estado', 'Estado:') !!}&nbsp;&nbsp;
                {!! $arreglo['estado'] !!}
            @endif
            <br>
            {!! Form::label('asistentes', 'Asistente:') !!}&nbsp;&nbsp;
            {!! $arreglo['asistentes'] !!} personas
            <br>
            @if($arreglo['catering'] == 1)
                {!! Form::label('catering', 'Catering:') !!}&nbsp;&nbsp; Con Catering 
            @else
                {!! Form::label('catering', 'Catering:') !!}&nbsp;&nbsp; Sin Catering 
            @endif
            <br><hr>
            <h3 class="text-info">Datos del Contacto</h3>
            <br>
            {!! Form::label('apellidonombre', 'Apellido, Nombre:') !!}&nbsp;&nbsp;
            {!! $arreglo['apellidonombre'] !!} 
            <br>
            {!! Form::label('email', 'E-mail:') !!}&nbsp;&nbsp;
            {!! $arreglo['email'] !!} 
            <br>
            {!! Form::label('telefono', 'Telefono:') !!}&nbsp;&nbsp;
            {!! $arreglo['telefono'] !!}
            <br>
            {!! Form::label('objetivos', 'Objetivos:') !!}&nbsp;&nbsp;
            {!! $arreglo['objetivos'] !!} 
            <br>
            {!! Form::label('destinatarios', 'Destinatarios:') !!}&nbsp;&nbsp;
            {!! $arreglo['destinatarios'] !!}
        </div>
    </div>

    
    <div class="col-md-6">
        <h2 class="text-center"><small class="text-primary">Espacio Físico Reservado</small></h2>
        <div class="eventosShowEspFis">
            @foreach( $arreglo['aulas'] as $item )
                <span> {!! $item !!} </span>
            @endforeach
        </div>
    </div>

</div>


@endsection