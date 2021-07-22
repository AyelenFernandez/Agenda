@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
    <span class="titleBox">Todos los Eventos Agendados</span>
    @include('admin.btn-eventos')
@endsection

@section('body')
@include('flash::message')
@if($arreglo != null)
	@include('admin.evento-tabla')
	<hr>
	<div class="float-right">
		<a href="{{ url('admin/excel/eventos') }}" class="btn btn-primary" title="Exportar" >
			<i class="fa fa-file-excel-o"></i> Excel
		</a>
		<a href="#" class="btn btn-primary"  title="Exportar" disabled >
			<i class="fa fa-file-pdf-o"></i> Pdf
		</a>
	</div>
@else
	<center>
		<h2>No tiene ningun Eventos</h2>
	</center>
@endif
@endsection