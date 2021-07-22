@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
<span class="titleBox">Espacio Fisico: {{ $espacioFisico->esp_fisico }}</span>
<a class="btn btn-primary" href="{!! route('admin.espaciofisico.index') !!}">Volver</a>
@endsection

@section('body')
  @include('adminlte-templates::common.errors')
  {!! Form::model($espacioFisico, ['route' => ['admin.espaciofisico.update', $espacioFisico->id], 'method' => 'patch']) !!}
    @include('espacioFisicos.fields')
  {!! Form::close() !!}
@endsection