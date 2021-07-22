<li class="{{ Request::is('eventos*') ? 'active' : '' }}">
    <a href="{!! route('eventos.index') !!}"><i class="fa fa-edit"></i><span>Eventos</span></a>
</li>
<li class="{{ Request::is('calendario*') ? 'active' : '' }}">
    <a href="{!! url('calendario') !!}"><i class="fa fa-edit"></i><span>Calendario</span></a>
</li>
<li class="{{ Request::is('espacioFisicos*') ? 'active' : '' }}">
    <a href="{!! route('espacioFisicos.index') !!}"><i class="fa fa-edit"></i><span>Espacio Fisicos</span></a>
</li>

<li class="{{ Request::is('fechas*') ? 'active' : '' }}">
    <a href="{!! route('fechas.index') !!}"><i class="fa fa-edit"></i><span>fechas</span></a>
</li>

