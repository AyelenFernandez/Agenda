@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
<span class="titleBox">Recursos</span>
<a class="btn btn-primary" href="{!! route('admin.espaciofisico.create') !!}">Agregar Recurso</a>
@endsection

@section('body')
    @include('flash::message')
    @include('espacioFisicos.table')
@endsection