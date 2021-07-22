@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('link')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link href="{{ asset('css/MonthPicker.css') }}" rel='stylesheet' />
<link href="{{ asset('css/exportar.css') }}" rel='stylesheet' />
@endsection

@section('header')
	<span class="titleBox">Generar planilla Excel</span>
@endsection

@section('body')
<style>
.no-inputtypes .box { color: red; }
.inputtypes .box { color: green; }
</style>
{!! Form::open(['url' => '#']) !!}
<div class='clearfix col-sm-12 col-md-12'>
	<span class="form-inline">
		<label for="fecha-mes"><i class="glyphicon glyphicon-calendar"></i> Seleccione Mes:</label>
		<input id="fecha-mes" name="fecha-mes"  class="form-control" required>
	</span>
</div>
<hr>
<div class="cont-form-material">
	<div class="form-material">
		<div class="input_group_material checkbox-material">
			<div class="col-md-4">
				<input type="checkbox" id="objetivos">
				<label class="" for="objetivos">Objetivos</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="destinatarios">
				<label class="" for="destinatarios">Destinatarios</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="asistentes">
				<label class="" for="asistentes">Asistentes</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="contacto">
				<label class="" for="contacto">Contacto</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="email">
				<label class="" for="email">E-mail</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="telefono">
				<label class="" for="telefono">Telefono</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="catering">
				<label class="" for="catering">Catering</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="recursos">
				<label class="" for="recursos">Recursos</label>
			</div>
			<div class="col-md-4">
				<input type="checkbox" id="espFisico">
				<label class="" for="espFisico">Espacio Fisico</label>
			</div>
		</div>
		<div class="clearfix"></div><br>
		<div class="input_group_material radio-material">			
			<strong>Eventos:</strong>			
			<input type="radio" name="eventos" id="estadoTodos">
			<label class="" for="estadoTodos">Todos</label>
			<input type="radio" name="eventos" id="estadoActivo">
			<label class="" for="estadoActivo">Activos</label>
			<input type="radio" name="eventos" id="estadoCancelado">
			<label class="" for="estadoCancelado">Cancelados</label>
		</div>
		<div class="bt-s-c">
			<button type="submit" id="btn_submit"><i class="fa fa-file-excel-o"></i> Generar</button>
			<a href="#"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
		</div>
	</div>
</div>
{!! Form::close() !!}

<div class='col-sm-12 col-md-12'>
	<div class="well well-sm">
		<p><strong>Los siguientes campos se generan en todas las planillas:</strong></p>
		<span class="bg-primary">&nbsp;&nbsp;Nombre del Evento&nbsp;&nbsp;</span>
		<span class="bg-primary">&nbsp;&nbsp;Organizador&nbsp;&nbsp;</span>
		<span class="bg-primary">&nbsp;&nbsp;Horario&nbsp;&nbsp;</span>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/MonthPicker.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script>$('#fecha-mes').MonthPicker({ Button: false });</script>
<script>
	$(function() {
		$( "input[name='fecha'" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
</script>
@endsection