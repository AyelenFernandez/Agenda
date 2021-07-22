@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
<span class="titleBox">Espacio Fisico</span>
<a class="btn btn-primary" href="{!! route('admin.espaciofisico.index') !!}">Volver</a>
@endsection

@section('body')
    @include('adminlte-templates::common.errors')
    {!! Form::open(['route' => 'admin.espaciofisico.store']) !!}
        @include('espacioFisicos.fields')
    {!! Form::close() !!}
@endsection