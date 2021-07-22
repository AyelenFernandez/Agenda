@section('navigation')
<ul class="sidebar-menu">
	<li class="{{ Request::is('admin') ? 'active' : '' }}">
		<a href="{!! url('/admin') !!}">
			<i class="col-i fa fa-dashboard"></i> 
			<span> Inicio</span>
		</a>
	</li>

	<li class="{{ Request::is('admin/eventos') ? 'active' : '' }}">
		<a href="{!! url('admin/eventos') !!}">
			<i class="col-i fa fa-list-ul"></i> 
			<span> Eventos</span>
		</a>
	</li>
	@if(Auth::user()->role == 'admin')
	<li class="{{ Request::is('admin/eventos/create') ? 'active' : '' }}">
		<a href="{!! url('admin/eventos/create') !!}">
			<i class="col-i fa fa-plus-circle"></i> 
			<span> Nuevo Evento</span>
		</a>
	</li>
	@endif

	<li class="{{ Request::is('admin/calendario') ? 'active' : '' }}">
		<a href="{!! url('admin/calendario') !!}">
			<i class="col-i fa fa-calendar"></i> 
			<span> Calendario</span>
		</a>
	</li>
	<li class="treeview">
        <a href="#">
            <i class="col-i glyphicon glyphicon-copy"></i>
            <span>Exportar</span>
            <i class="col-i fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="">
                <a href="{{ asset('/exportar-excel') }}"><i class="col-i fa fa-file-text-o text-primary"></i><span>Planilla Excel</span></a>
            </li>
            <li class="">
                <a href="{{ asset('exportar-PDF') }}"><i class="col-i fa fa-file-text-o text-primary"></i><span>Formato PDF</span></a>
            </li>
        </ul>
    </li>
	@if(Auth::user()->role == 'admin')
	<li class="{{ Request::is('admin/espacioFisicos*') ? 'active' : '' }}">
		<a href="{!! url('admin/espaciofisico') !!}">
			<i class="col-i fa fa-tags"></i>
			<span> Espacio Fisicos</span>
		</a>
	</li>
	@endif

	<li>
		<a href="{!! url('/admin') !!}">
			<i class="col-i fa 	fa-tv"></i> 
			<span> Visor de TV</span>
		</a>
	</li>
	<li>
        <a href="#" style="cursor:default; text-decoration:none;" onclick="event.preventDefault();">
        	<span id="liveclock"></span>
        </a>
    </li>
</ul>
@endsection