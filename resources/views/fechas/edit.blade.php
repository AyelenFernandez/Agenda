@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            fecha
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fecha, ['route' => ['fechas.update', $fecha->id], 'method' => 'patch']) !!}

                        @include('fechas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection