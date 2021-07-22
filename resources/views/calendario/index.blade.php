@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('link')
<link href="{{ asset("css/fullcalendar.css") }}" rel='stylesheet' />
<link href="{{ asset("css/fullcalendar.print.css") }}" rel='stylesheet' media='print' />
<style>
    #agendacalendar {
        max-width: 1200px;
        font-size: 16px;
    }
</style>
@endsection


@section('header')
	<span class="titleBox">Calendario de Eventos</span>
@endsection

@section('body')
	@include('flash::message')
	<div class="clearfix">
		<div class="col-md-12">
			<div id='agendacalendar'></div>
		</div>
	</div>
	<div class="modal fade " id="fullCalModal">
		<div class="modal-dialog">
			<div class="modal-content boxShowModal">
				<div class="modal-header modal-info">
					<span id="btn-add-event"></span>
					
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">×</span> <span class="sr-only">cerrar</span>
					</button>

					<span id="modal-title"></span>
					
				</div>
				<div class="modal-body">
					<!-- <h3 id="modalTitle" class="modal-title text-center text-primary"><small>Fecha</small></h3> -->					
					@if(Auth::user()->role == 'admin')
					<div id="evento-todos" class="box-body">
						@section('link')
    					<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
						@endsection

						<table id="tablitaEvento" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Evento</th>
									<th>Organizador</th>
									<th>Horario</th>
									<th>Aulas</th>
									<th>Estado</th>
									<th style="width:100px;">accion</th>
								</tr>
							</thead>
							<tbody id="tcontent">
							</tbody>
						</table>
					</div>

					@endif


					<div id="evento-unidad" class="box-body text-center">
						<dl>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<dt>Organizador:</dt>
								<dd id="organizador"></dd>
								<dt>Fecha:</dt>
								<dd id="fecha"></dd>
								<dt>Horario:</dt>
								<dd id="entradasalida"></dd>
								<dt>Catering</dt>
								<dd id="catering"></dd>
								<dt>Asistentes</dt>
								<dd id="asistentes"></dd>
								<dt>Estado:</dt>
								<dd id="estado"></dd>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<dt>Contacto:</dt>
								<dd id="apellidonombre"></dd>
								<dt>E-Mail:</dt>
								<dd id="email"></dd>
								<dt>Telefono:</dt>
								<dd id="telefono"></dd>
								<dt>Objetivos</dt>
								<dd id="objetivos"></dd>
								<dt>Destinatarios</dt>
								<dd id="destinatarios"></dd>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<hr>
								<dt>Espacio Reservado:</dt>
								<dd id="espaciofisico"></dd>
							</div>
						</dl>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>


<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h3 class="modal-title">Atencion</h3>
            </div>
            <div class="modal-body">
                <h4>¿Esta seguro que quiere Eliminar este evento?</h4>
            </div>
            <div class="modal-footer">
                {!! Form::open(array('url' => 'admin/eliminarEvento')) !!}
                    {!! Form::hidden('idEv', null, ['id' => 'idEv']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
                    {!! Form::submit('Eliminar Evento', array('class'=>'btn btn-danger'))!!}
                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h3 class="modal-title">Atencion</h3>
            </div>
            <div class="modal-body">
                <h4>¿Esta seguro que quiere Cancelar/Activar este evento?</h4>
            </div>
            <div class="modal-footer">
                {!! Form::open(array('url' => 'admin/cancelarEvento')) !!}
                    {!! Form::hidden('idEv', null, ['id' => 'idEv']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
                    {!! Form::submit('Activar/Desactivar',array('class'=>'btn btn-danger'))!!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset("js/moment.min.js") }}"></script>
<script src="{{ asset("js/fullcalendar.min.js") }}"></script>
<script src="{{ asset("js/lang-all.js") }}"></script>
@if(Auth::user()->role == 'admin')
<script>
	$(document).ready(function() {
		$('#agendacalendar').fullCalendar({
			lang: 'es',
			minTime:'06:00:00',
			maxTime:'22:00:00',
			firstDay: '1',
			events: "{{URL::to('admin/feedAgenda')}}",
			editable: false,
			header:{
				left:   'prev,next',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			eventRender: function(event, element) { 
				element.qtip({ content: event.fecha });
				element.qtip({ content: event.nombre });
				element.qtip({ content: event.organizador });
				element.qtip({ content: event.estado });
				element.qtip({ content: event.entradasalida });
				element.qtip({ content: event.apellidonombre });
				element.qtip({ content: event.email });
				element.qtip({ content: event.telefono });
				element.qtip({ content: event.catering });
				element.qtip({ content: event.asistentes });
				element.qtip({ content: event.objetivos });
				element.qtip({ content: event.destinatarios });
			},
			eventRender: function (event, element) {
				element.attr('href', 'javascript:void(0);');
				
				element.click(function() {
					$('#evento-todos').css({'display': 'none'});
					$('#evento-unidad').css({'display': 'block'});
					$('#modal-title').html("<h3 class='modal-title text-center text-primary'>"+event.nombre+" (<small>"+event.fecha+"</small>)</h3>");
					$('#btn-add-event').html("");
					$('#nombre').html(event.nombre);
					$('#fecha').html(event.fecha);
					$('#organizador').html(event.organizador);
					$('#estado').html(event.estado);
					$('#entradasalida').html(event.entradasalida);
					$("#apellidonombre").html(event.apellidonombre);
					$("#email").html(event.email);
					$("#telefono").html(event.telefono);
					$("#catering").html(event.catering);
					$("#asistentes").html(event.asistentes);
					$("#objetivos").html(event.objetivos);
					$("#destinatarios").html(event.destinatarios);
					var aux="";
					$.each( event.espaciofisico, function( key, value ) {
						aux = aux + "<a class='btn btn-primary' style='margin:5px;'>"+ value+"</a>";
  					});
					$("#espaciofisico").html(aux);
					$('#eventUrl').attr('href',event.url);
					$('#fullCalModal').modal();
					
				});
			}
		});
		$('.fc-day-number').click( function() {
			$('#evento-unidad').css({'display': 'none'});
			$('#evento-todos').css({'display': 'block'});
			var fechaSelect = $(this).attr('data-date')
			$('#modal-title').html("<h3 class='modal-title text-center text-primary'>Eventos (<small>"+fechaSelect+"</small>)</h3>");
			$("#tcontent").html('');
			$.getJSON('eventoFecha/'+fechaSelect, [], function (data) {
				$.each(data, function(i,item){
					var espFisico = [];
					espFisico.push($.each(item.aulas, function(i,aula){}));
					$("#tcontent").append(
						"<tr>"+
							"<td>"+item.evento+"</td>"+
							"<td>"+item.organizador+"</td>"+
							"<td>"+item.Entrada+ '-' +item.Salida+"</td>"+
							"<td>"+espFisico+"</td>"+
							"<td>"+item.estado+"</td>"+
							"<td>"+
								"<a href='eventos/"+item.id+"/edit' class='btn btn-xs btn-success' title='Editar'><i class='glyphicon glyphicon-edit'></i></a>"+
								"<button type='button' class='btn btn-xs btn-warning' id='cancelar' data-target='#modalCancelar' data-ids="+item.id+" title='Activar/Desactivar'><i class='glyphicon glyphicon-remove'></i></button>"+
								"<button type='button' class='btn btn-xs btn-danger' id='eliminar' data-target='#modalEliminar' data-ids="+item.id+" title='Eliminar'><i class='glyphicon glyphicon-trash'></i></button>"+
							"</td>"+
						"</tr>"
						);
				});
				$('#btn-add-event').html("<a href='eventos/create/"+fechaSelect+"' class='btn btn-info'>Agregar Evento</a>");
			});
			$('#eventUrl').attr('href',event.url);
			$('#fullCalModal').modal();
		});
	});

</script>

<script>
$(document).ready(function() {
	$('.fc-corner-right').click( function(){
		console.log('zorro');
		$('.fc-day-number').click( function() {
			$('#evento-unidad').css({'display': 'none'});
			$('#evento-todos').css({'display': 'block'});
			var fechaSelect = $(this).attr('data-date')
			$('#modal-title').html("<h3 class='modal-title text-center text-primary'>Eventos (<small>"+fechaSelect+"</small>)</h3>");
			$("#tcontent").html('');
			$.getJSON('eventoFecha/'+fechaSelect, [], function (data) {
				$.each(data, function(i,item){
					var espFisico = [];
					espFisico.push($.each(item.aulas, function(i,aula){}));
					$("#tcontent").append(
						"<tr>"+
							"<td>"+item.evento+"</td>"+
							"<td>"+item.organizador+"</td>"+
							"<td>"+item.Entrada+ '-' +item.Salida+"</td>"+
							"<td>"+espFisico+"</td>"+
							"<td>"+item.estado+"</td>"+
							"<td>"+
								"<a href='eventos/"+item.id+"/edit' class='btn btn-xs btn-success' title='Editar'><i class='glyphicon glyphicon-edit'></i></a>"+
								"<button type='button' class='btn btn-xs btn-warning' id='cancelar' data-target='#modalCancelar' data-ids="+item.id+" title='Activar/Desactivar'><i class='glyphicon glyphicon-remove'></i></button>"+
								"<button type='button' class='btn btn-xs btn-danger' id='eliminar' data-target='#modalEliminar' data-ids="+item.id+" title='Eliminar'><i class='glyphicon glyphicon-trash'></i></button>"+
							"</td>"+
						"</tr>"
						);
				});
				$('#btn-add-event').html("<a href='eventos/create/"+fechaSelect+"' class='btn btn-info'>Agregar Evento</a>");
			});
			$('#eventUrl').attr('href',event.url);
			$('#fullCalModal').modal();
		});
	});
});

$(document).ready(function() {
	$('.fc-corner-left').click( function(){
		console.log('zorro');
		$('.fc-day-number').click( function() {
			$('#evento-unidad').css({'display': 'none'});
			$('#evento-todos').css({'display': 'block'});
			var fechaSelect = $(this).attr('data-date')
			$('#modal-title').html("<h3 class='modal-title text-center text-primary'>Eventos (<small>"+fechaSelect+"</small>)</h3>");
			$("#tcontent").html('');
			$.getJSON('eventoFecha/'+fechaSelect, [], function (data) {
				$.each(data, function(i,item){
					var espFisico = [];
					espFisico.push($.each(item.aulas, function(i,aula){}));
					$("#tcontent").append(
						"<tr>"+
							"<td>"+item.evento+"</td>"+
							"<td>"+item.organizador+"</td>"+
							"<td>"+item.Entrada+ '-' +item.Salida+"</td>"+
							"<td>"+espFisico+"</td>"+
							"<td>"+item.estado+"</td>"+
							"<td>"+
								"<a href='eventos/"+item.id+"/edit' class='btn btn-xs btn-success' title='Editar'><i class='glyphicon glyphicon-edit'></i></a>"+
								"<button type='button' class='btn btn-xs btn-warning' id='cancelar' data-target='#modalCancelar' data-ids="+item.id+" title='Activar/Desactivar'><i class='glyphicon glyphicon-remove'></i></button>"+
								"<button type='button' class='btn btn-xs btn-danger' id='eliminar' data-target='#modalEliminar' data-ids="+item.id+" title='Eliminar'><i class='glyphicon glyphicon-trash'></i></button>"+
							"</td>"+
						"</tr>"
						);
				});
				$('#btn-add-event').html("<a href='eventos/create/"+fechaSelect+"' class='btn btn-info'>Agregar Evento</a>");
			});
			$('#eventUrl').attr('href',event.url);
			$('#fullCalModal').modal();
		});
	});
});
</script>

<script type="text/javascript">
	$(document).on('click', '#cancelar', function(event) {
		event.preventDefault();
		var modal =$('#modalCancelar');
		var id = $(this).data('ids');
		modal.find('#idEv').val(id);
		modal.modal('show');
	});
	$(document).on('click', '#eliminar', function(event) {
		event.preventDefault();
		var modal =$('#modalEliminar');
		var id = $(this).data('ids');
		modal.find('#idEv').val(id);
		modal.modal('show');
	});
</script>

@else
<script>
	$(document).ready(function() {
		$('#agendacalendar').fullCalendar({
			lang: 'es',
			minTime:'06:00:00',
			maxTime:'22:00:00',
			firstDay: '1',
			events: "{{URL::to('admin/feedAgenda')}}",
			editable: false,
			header:{
				left:   'prev,next',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			eventRender: function(event, element) { 
				element.qtip({ content: event.fecha });
				element.qtip({ content: event.nombre });
				element.qtip({ content: event.organizador });
				element.qtip({ content: event.estado });
				element.qtip({ content: event.entradasalida });
				element.qtip({ content: event.apellidonombre });
				element.qtip({ content: event.email });
				element.qtip({ content: event.telefono });
				element.qtip({ content: event.catering });
				element.qtip({ content: event.asistentes });
				element.qtip({ content: event.objetivos });
				element.qtip({ content: event.destinatarios });
			},
			eventRender: function (event, element) {
				element.attr('href', 'javascript:void(0);');
				element.click(function() {
					$('#modal-title').html("<h3 class='modal-title text-center text-primary'>"+event.nombre+" (<small>"+event.fecha+"</small>)</h3>");
					$('#btn-add-event').html("");
					$('#nombre').html(event.nombre);
					$('#fecha').html(event.fecha);
					$('#organizador').html(event.organizador);
					$('#estado').html(event.estado);
					$('#entradasalida').html(event.entradasalida);
					$("#apellidonombre").html(event.apellidonombre);
					$("#email").html(event.email);
					$("#telefono").html(event.telefono);
					$("#catering").html(event.catering);
					$("#asistentes").html(event.asistentes);
					$("#objetivos").html(event.objetivos);
					$("#destinatarios").html(event.destinatarios);
					var aux="";
					$.each( event.espaciofisico, function( key, value ) {
						aux = aux + "<a class='btn btn-primary' style='margin:5px;'>"+ value+"</a>";
  					});
					$("#espaciofisico").html(aux);
					$('#eventUrl').attr('href',event.url);
					$('#fullCalModal').modal();
				});
			}
		});
	});
</script>
@endif
@endsection