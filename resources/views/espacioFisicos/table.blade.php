@section('link')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
@endsection

<table id="tablitaRecurso" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Esp Fisico</th>
            <th>Ubicacion</th>
            <th>Capacidad</th>
            <th>Recursos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($espacioFisicos as $espacioFisico)
        <tr>
            <td>{!! $espacioFisico->esp_fisico !!}</td>
            <td>{!! $espacioFisico->ubicacion !!}</td>
            <td>{!! $espacioFisico->capacidad !!}</td>
            <td>{!! $espacioFisico->recursos !!}</td>
            <td style="width:120px;" class="btn-group">
                <a href="{!! route('admin.espaciofisico.show', [$espacioFisico->id]) !!}" class='btn btn-sm btn-info'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('admin.espaciofisico.edit', [$espacioFisico->id]) !!}" class='btn btn-sm btn-success'><i class="glyphicon glyphicon-edit"></i></a>
                <button type="button" class='btn btn-sm btn-danger' id='eliminar' data-target="#modalEliminar" data-ids={!! $espacioFisico->id !!}>
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </td>
        </tr>
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
                <h4>¿Eliminar el Espacio Fisico?</h4>
            </div>
            <div class="modal-footer">
                {!! Form::open(array('route' => 'admin.espaciofisico.destroy', 'method' => 'delete')) !!}
                    {!! Form::hidden('idEv', null, ['id' => 'idEv']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
                    {!! Form::submit('Eliminar Espacio Fisico', array('class'=>'btn btn-danger'))!!}
                {!! Form::close() !!}
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@section('scripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablitaRecurso').DataTable({        
                "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "all"]],
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                }
            });
        } );
    </script>
    
    <script type="text/javascript">
        $(document).on('click', '#eliminar', function(event) {
            event.preventDefault();
            var modal =$('#modalEliminar');
            var id = $(this).data('ids');
            modal.find('#idEv').val(id);
            modal.modal('show');
        });
    </script>
    
@endsection