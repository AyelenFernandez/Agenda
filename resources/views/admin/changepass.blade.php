@extends('layouts.tadmin')
@extends('admin.navigation')
@extends('layouts.tadmin-content')

@section('header')
<span class="titleBox">Cambiar Contraseña</span>
@endsection

@section('body')
<div class="row">
	<div class="col-xs-12">
  @include('flash::message')
		<div class="box">     
      	    <div class="box-header">
            	<h3 class="box-title">Ingrese su nueva contraseña:</h3>
          	</div><!-- /.box-header -->
            <!-- form start -->
          {!! Form::open(array('url' => 'admin/changepass')) !!}
            <div class="box-body">
              <div class="form-group">
                <label>Nueva Contraseña</label>
                {!! Form::password('newPassword' ,array("class" => "form-control", 'required' =>'required')) !!}
              </div>
              <div class="form-group">
                <label>Confirmar</label>
                {!! Form::password('newPassword_confirm' ,array("class" => "form-control",'required' =>'required')) !!}
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
            	<button class="btn btn-primary">Enviar</button>
            	<!-- {!! Form::submit('Enviar',array("class" => "btn btn-primary")) !!} -->
            </div>
          {!! Form::close() !!}
    	</div><!-- /.box -->
	</div>
</div>
@endsection
