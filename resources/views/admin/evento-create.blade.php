@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('link')
<link href="{{ asset('css/form-material.css') }}" rel='stylesheet' />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="{{ asset('css/jquery.timepicker.css') }}" rel='stylesheet' />
@endsection

@section('header')
<span class="titleBox">Agregar Evento</span>
<a class="btn btn-primary" href="{!! url('admin/eventos') !!}">Volver</a>
@endsection

@section('body')
@include('flash::message')
{!! Form::open(['url' => 'admin/eventos']) !!}
	<div class="col-xs-12 col-sm-12 col-md-6">
		<div class="cont-form-material">
			<div class="form-material">
				<div class="form-group">
					{!! Form::label('evento', 'Evento:') !!}
					{!! Form::text('evento', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Evento', 'required']) !!}
				</div><br>
				<div class="form-group">
					{!! Form::label('organizador', 'Organizador:') !!}
					{!! Form::text('organizador', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Organizador', 'required']) !!}
				</div><br>
				<div class="form-group">
					{!! Form::label('fecha', 'Fecha:') !!}
					<div class="row" id="campos-fecha-1">
						<div class="col-xs-9 col-sm-10 col-md-10">
							<input class='dtfecha form-control' placeholder='Fecha del Evento' required='required' name='fecha[]' type='text' id='fecha1'>
						</div>
						
						<div class="col-xs-3 col-sm-2 col-md-2">
							<button class="btn btn-info pull-right" id="btn-add-fecha"><i class="glyphicon glyphicon-plus"></i></button>
						</div>
					</div>
				</div><br>
				<div class="form-group" id="bloque-fecha"></div>
				<div class="row">
					<div class='form-group col-sm-6 col-md-6'>
						<label>Entrada:</label>
						<input type='text' name='Entrada' id='Entrada' class='time form-control' placeholder='00:00:00' required>
						
					</div>
					<div class='form-group col-sm-6 col-md-6'>
						<label>Salida:</label>
						<input type='text' name='Salida' id='Salida' class='time form-control' placeholder='00:00:00' required>
					</div>
				</div><br>

				<div class="row">
					<div class='form-group col-sm-6 col-md-6'>
						{!! Form::label('asistentes', 'Asistentes:') !!}
						{!! Form::text('asistentes', null, ['id' => 'asistentes', 'class' => 'form-control', 'placeholder' => 'Cantidad de Asistentes', 'required']) !!}
					</div>
					<div class='col-sm-6 col-md-6'>
						{!! Form::label('catering', 'Catering:') !!}
						<div class="">
							<select name="catering" class="selectpicker form-control">
								<option value="0" >Sin Catering</option>
                                <option value="1" >Con Catering</option>
							</select>
						</div>
					</div>
				</div><br>

				<div class="row">
					<h3 class="text-primary text-center">Datos del Contacto</h3>
					<div class="form-group">
						{!! Form::label('apellidonombre', 'Apellido, Nombre:') !!}
						<div class="input-group">
							<span class="input-group-addon" id="celu"><i class="glyphicon glyphicon-user"></i></span>
							{!! Form::text('apellidonombre', null, ['class' => 'form-control', 'placeholder' => 'Apellido y Nombre' ]) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('email', 'E-Mail:') !!}
						<div class="input-group">
							<span class="input-group-addon" id="celu"><i class="glyphicon glyphicon-envelope"></i></span>
							{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail' ]) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('telefono', 'Nº Celular:') !!}
						<small>( <strong class="text-danger">Carcteristica y Numero</strong> todo junto sin espacios ni punto )</small>
						<div class="input-group">
							<span class="input-group-addon" id="celu"><i class="glyphicon glyphicon-earphone"></i></span>
							{!! Form::text('telefono', null, ['id' => 'telefono', 'class' => 'form-control', 'placeholder' => '381155XX..' ]) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('objetivos', 'Objetivos:') !!} 
						<br>
						<textarea name="objetivos" rows="5" class="form-control" style="resize: none;"></textarea>
					</div>

					<div class="form-group">
						{!! Form::label('destinatarios', 'Destinatarios:') !!} 
						<br>
						<textarea name="destinatarios" rows="5" class="form-control" style="resize: none;"></textarea>
					</div>
				</div><br>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 mxs">
		<div class="cont-form-material">
			<div class="form-material">
				<div class="input_group_material checkbox-material">
					@foreach($aulas as $aula)
						<div class="col-xs-6 col-sm-6 col-md-6 mxs">
							<input type="checkbox" name="aulas[]" id="{{$aula->id}}" value="{{$aula->id}}">
							<label for="{{$aula->id}}" >{{$aula->esp_fisico}}<br><small>{{$aula->capacidad}} p</small></label>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			{!! Form::submit('Reservar', ['class' => 'btn btn-primary', 'id' => 'btn_submit']) !!}
			<a href="{!! url('admin/eventos/create') !!}" class="btn btn-default">Cancelar</a>
		</div>
	</div>
{!! Form::close() !!}
@endsection

@section('scripts')
<script src="{{ asset('js/jquery.timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.numeric.min.js') }}" type="text/javascript"></script>


<script>
	$(function() {
		$( "input[name='fecha[]'" ).datepicker({ dateFormat: "yy-mm-dd" });
		$('.time').timepicker({'timeFormat': 'H:i:s','minTime': '6:00am', 'maxTime': '22:00pm',});
	});
</script>


<script>

var campo=1;

$('#btn-add-fecha').click(function(event) {
	// console.log(event);
	campo++;
	$('#bloque-fecha').append(
	"<span id='campos-fecha-"+campo+"'><div class='row'>"+
		"<div class='col-xs-9 col-sm-10 col-md-10'>"+
			"<input class='dtfecha form-control' placeholder='Fecha del Evento' required='required' name='fecha[]' type='text' id='fecha"+campo+"'>"+
		"</div>"+
		"<div class='col-xs-3 col-sm-2 col-md-2'>"+
			"<button class='btn btn-info pull-right' id='btn-delete-fecha' name='"+campo+"' onClick='deleteFecha(name)'><i class='glyphicon glyphicon-minus'></i></button>"+
		"</div>"+
	"</div><br></span>"
	);

	$(function() {
		$( "input[name='fecha[]']" ).datepicker({ dateFormat: "yy-mm-dd" });
		$('.time').timepicker({'timeFormat': 'H:i:s','minTime': '6:00am', 'maxTime': '22:00pm',});
	});
});


function deleteFecha(name) {
	campo--;
	console.log(campo);
	$('#campos-fecha-'+name).remove();
};


// $('button[name='+campo+']').click(function(event) {
// 	console.log('zorro');
// });
</script>


<script>
$(document).ready(function(){
   $('#telefono').numeric();    // números
   $('#asistentes').numeric();    // números
   // $('#numero').numeric('.'); // números con separador decimal
   // $('#numero').numeric(','); // números con separador decimal
});
</script>
@endsection