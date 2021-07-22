@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'eventos.store']) !!}
                    <div class="col-sm-6">
                        @include('eventos.fields')

                    </div>
                    <div class="col-sm-6">
                        @include('fechas.fields')
                    </div>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
