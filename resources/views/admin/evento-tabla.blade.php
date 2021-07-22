@section('link')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
@endsection

<table id="tablitaEvento" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Evento</th>
			<th>Organizador</th>
			<th>Horario</th>
			<th>Fecha</th>
			<th>Lugar</th>
			@if(Auth::user()->role == 'admin')
			<th>Accion</th>
			@endif
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		@foreach($arreglo as $key)
			@if(($i%2) == 1)
				@if($key['estado'] == 'cancelado')
				<tr class="eventoCancelado">
					<td>{!! $key['evento'] !!}</td>
					<td>{!! $key['organizador'] !!}</td>
					<td>{!! $key['Entrada'] !!} - {!! $key['Salida'] !!}</td>
					<td>{!! $key['fecha'] !!}</td>
					<td>Cancelado</td>
					@if(Auth::user()->role == 'admin')
						<td style="width:150px;" class="btn-group">
			                <a href="{!! url('admin/eventos', $key['id'])!!} " class='btn btn-sm btn-info' title="Ver"><i class="glyphicon glyphicon-eye-open"></i></a>
			                <a href="{!! url('admin/eventos/'.$key['id'].'/edit')!!}" class='btn btn-sm btn-success' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
			                <button type="button" class='btn btn-sm btn-warning' id='cancelar' data-target="#modalCancelar" data-ids={!! $key['id'] !!} title="Activar/Desactivar"><i class="glyphicon glyphicon-ok"></i></button>
			                <button type="button" class='btn btn-sm btn-danger' id='eliminar' data-target="#modalEliminar" data-ids={!! $key['id'] !!} title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>
		            	</td>
		            @endif
		        </tr>
				@else
				<tr  class="eventoActivo1">
					<td>{!! $key['evento'] !!}</td>
					<td>{!! $key['organizador'] !!}</td>
					<td>{!! $key['Entrada'] !!} - {!! $key['Salida'] !!}</td>
					<td>{!! $key['fecha'] !!}</td>
					<td class="eventosShowEspFisTabla">
						@foreach($key['aulas'] as $aula)
							<div class="">{!! $aula !!}</div>
						@endforeach
					</td>	
					@if(Auth::user()->role == 'admin')
						<td style="width:150px;" class="btn-group">
				            <a href="{!! url('admin/eventos', $key['id'])!!} " class='btn btn-sm btn-info' title="Ver"><i class="glyphicon glyphicon-eye-open"></i></a>
				            <a href="{!! url('admin/eventos/'.$key['id'].'/edit')!!}" class='btn btn-sm btn-success' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
				            <button type="button" class='btn btn-sm btn-warning' id='cancelar' data-target="#modalCancelar" data-ids={!! $key['id'] !!} title="Activar/Desactivar"><i class="glyphicon glyphicon-remove"></i></button>
				            <button type="button" class='btn btn-sm btn-danger' id='eliminar' data-target="#modalEliminar" data-ids={!! $key['id'] !!} title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>
				        </td>
			        @endif
			    </tr>		
				@endif
				<?php $i++; ?>
			@else
			@if($key['estado'] == 'cancelado')
				<tr class="eventoCancelado">
					<td>{!! $key['evento'] !!}</td>
					<td>{!! $key['organizador'] !!}</td>
					<td>{!! $key['Entrada'] !!} - {!! $key['Salida'] !!}</td>
					<td>{!! $key['fecha'] !!}</td>
					<td>Cancelado</td>
					@if(Auth::user()->role == 'admin')
						<td style="width:150px;" class="btn-group">
			                <a href="{!! url('admin/eventos', $key['id'])!!} " class='btn btn-sm btn-info' title="Ver"><i class="glyphicon glyphicon-eye-open"></i></a>
			                <a href="{!! url('admin/eventos/'.$key['id'].'/edit')!!}" class='btn btn-sm btn-success' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
			                <button type="button" class='btn btn-sm btn-warning' id='cancelar' data-target="#modalCancelar" data-ids={!! $key['id'] !!} title="Activar/Desactivar"><i class="glyphicon glyphicon-ok"></i></button>
			                <button type="button" class='btn btn-sm btn-danger' id='eliminar' data-target="#modalEliminar" data-ids={!! $key['id'] !!} title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>
		            	</td>
		            @endif
		        </tr>
				@else
				<tr  class="eventoActivo2">
					<td>{!! $key['evento'] !!}</td>
					<td>{!! $key['organizador'] !!}</td>
					<td>{!! $key['Entrada'] !!} - {!! $key['Salida'] !!}</td>
					<td>{!! $key['fecha'] !!}</td>
					<td class="eventosShowEspFisTabla">
						@foreach($key['aulas'] as $aula)
							<div class="">{!! $aula !!}</div>
						@endforeach
					</td>	
					@if(Auth::user()->role == 'admin')
						<td style="width:150px;" class="btn-group">
				            <a href="{!! url('admin/eventos', $key['id'])!!} " class='btn btn-sm btn-info' title="Ver"><i class="glyphicon glyphicon-eye-open"></i></a>
				            <a href="{!! url('admin/eventos/'.$key['id'].'/edit')!!}" class='btn btn-sm btn-success' title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
				            <button type="button" class='btn btn-sm btn-warning' id='cancelar' data-target="#modalCancelar" data-ids={!! $key['id'] !!} title="Activar/Desactivar"><i class="glyphicon glyphicon-remove"></i></button>
				            <button type="button" class='btn btn-sm btn-danger' id='eliminar' data-target="#modalEliminar" data-ids={!! $key['id'] !!} title="Eliminar"><i class="glyphicon glyphicon-trash"></i></button>
				        </td>
			        @endif
			    </tr>				
				@endif				
				<?php $i++; ?>
			@endif
		@endforeach
	</tbody>
</table>

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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
@section('scripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablitaEvento').DataTable({        
                "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "all"]],
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                }
            });
        } );
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
    
@endsection