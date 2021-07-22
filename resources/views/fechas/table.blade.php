<table class="table table-responsive" id="fechas-table">
    <thead>
        
        <th>Entrada</th>
        <th>Salida</th>
        <th>Evento Id</th>
        <th>Espaciofisico Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($fechas as $fecha)
        <tr>
            
            <td>{!! $fecha->Entrada !!}</td>
            <td>{!! $fecha->Salida !!}</td>
            <td>{!! $fecha->evento_id !!}</td>
            <td>{!! $fecha->espaciofisico_id !!}</td>
            <td>
                {!! Form::open(['route' => ['fechas.destroy', $fecha->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fechas.show', [$fecha->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fechas.edit', [$fecha->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>