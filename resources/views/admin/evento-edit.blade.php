@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('link')
<link href="{{ asset('css/form-material.css') }}" rel='stylesheet' />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="{{ asset('css/jquery.timepicker.css') }}" rel='stylesheet' />
@endsection

@section('header')
<span class="titleBox">Evento: {{$datos['evento']->evento}} </span>
<a class="btn btn-primary" href="{!! url('admin/eventos') !!}">Volver</a>
@endsection

@section('body')
@include('flash::message')
@include('adminlte-templates::common.errors')
{!! Form::model($datos['evento'], ['url' => ['admin/eventos', $datos['evento']->id], 'method' => 'patch']) !!}
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="cont-form-material">
            <div class="form-material">
                <div class="form-group">
                    {!! Form::label('evento', 'Evento:') !!}
                    {!! Form::text('evento', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Evento']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('organizador', 'Organizador:') !!}
                    {!! Form::text('organizador', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Organizador']) !!}
                </div>
                <div class="form-group">
                     {!! Form::label('fecha', 'Fecha:') !!}
                    {!! Form::text('fecha', null, ['class' => 'form-control', 'id'=>'fecha']) !!}                    
                </div>
                <div class="row">
                    <div class='form-group col-sm-6 col-md-6'>
                        <label>Entrada:</label>
                        <input type='text' name='Entrada' id='Entrada' class='time form-control' 
                         value="{{$datos['Entrada']}}" required>
                    </div>
                    <div class='form-group col-sm-6 col-md-6'>
                        <label>Salida:</label>
                        <input type='text' name='Salida' id='Salida' class='time form-control'
                         value="{{$datos['Salida']}}"  required> 
                        <input type="hidden" name="id" id="id" value="{{$datos['evento']->id}}"> 
                    </div>
                    
                </div>

                <div class="row">
                    <div class='form-group col-sm-6 col-md-6'>
                        {!! Form::label('asistentes', 'Asistentes:') !!}
                        {!! Form::text('asistentes', null, ['id' => 'asistentes', 'class' => 'form-control', 'placeholder' => 'Cantidad de Asistentes', 'required']) !!}
                    </div>
                    <div class='col-sm-6 col-md-6'>
                        {!! Form::label('catering', 'Catering:') !!}
                        <div class="">
                            <select name="catering" class="selectpicker form-control">
                                <option @if($datos['evento']->catering == 0) selected @endif value="0" >Sin Catering</option>
                                <option @if($datos['evento']->catering == 1) selected @endif value="1" >Con Catering</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h3 class="text-primary text-center">Datos del Contacto</h3>
                    <div class="form-group">
                        {!! Form::label('apellidonombre', 'Apellido, Nombre:') !!}
                        <div class="input-group">
                            <span class="input-group-addon" id="celu"><i class="glyphicon glyphicon-user"></i></span>
                            {!! Form::text('apellidonombre', null, ['class' => 'form-control', 'placeholder' => 'Apellido y Nombre']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-Mail:') !!}
                        <div class="input-group">
                            <span class="input-group-addon" id="celu"><i class="glyphicon glyphicon-envelope"></i></span>
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefono', 'Nº Celular:') !!}
                        <small>( <strong class="text-danger">Carcteristica y Numero</strong> todo junto sin espacios ni punto )</small>
                        <div class="input-group">
                            <span class="input-group-addon" id="celu"><i class="glyphicon glyphicon-earphone"></i></span>
                            {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '381155XX..']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        {!! Form::label('objetivos', 'Objetivos:') !!} 
                        <br>
                        {!! Form::textarea('objetivos', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('destinatarios', 'Destinatarios:') !!} 
                        <br>
                        {!! Form::textarea('destinatarios', null, ['class' => 'form-control']) !!}
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="cont-form-material">
            <div class="form-material">
                <div class="input_group_material checkbox-material">
                    @foreach($datos['aulas'] as $aula)                        
                        <div class="col-sm-6 col-md-6">                         
                            <input type="checkbox" name="aulas[]" id="{{$aula->id}}" value="{{$aula->id}}" 
                            @foreach($datos['reservas'] as $key)
                                @if($key->espaciofisico_id == $aula->id)
                                    checked="true"
                                @endif 
                            @endforeach
                            >
                            <label for="{{$aula->id}}" >{{$aula->esp_fisico}}<br><small>{{$aula->capacidad}} p</small></label>
                        </div>                        
                    @endforeach

                </div>
            </div>
        </div>
    </div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('admin/eventos') !!}" class="btn btn-default">Cancelar</a>
</div>

{!! Form::close() !!}
@endsection
@section('scripts')

<script src="{{ asset('js/jquery.timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.numeric.min.js') }}" type="text/javascript"></script>

<script>
  $(function() {
    $('#fecha').datepicker({
        dateFormat: "yy-mm-dd"
        });
    $('.time').timepicker({'timeFormat': 'H:i:s'});        
  });  
</script>

<script>
$(document).ready(function(){
   $('#telefono').numeric();    // números
   // $('#numero').numeric('.'); // números con separador decimal
   // $('#numero').numeric(','); // números con separador decimal
});
</script>


@endsection