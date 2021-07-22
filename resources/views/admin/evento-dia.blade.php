@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
    <span class="titleBox">Eventos en el Día</span>
    @include('admin.btn-eventos')
@endsection

@section('body')
@if($arreglo != null)
	@include('admin.evento-tabla')
	<hr>
	<div class="float-right">
		<a href="{{ url('admin/excel/dia') }}" class="btn btn-primary" title="Exportar" ><i class="fa fa-file-excel-o"></i> Excel</a>
		<a href="#" class="btn btn-primary"  title="Exportar" disabled ><i class="fa fa-file-pdf-o"></i> Pdf</a>
	</div>
@else
	<center>
		<h2>No tiene eventos programados en el dia de Hoy</h2>
	</center>
@endif
@endsection