<!-- Evento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('evento', 'Evento:') !!}
    {!! Form::text('evento', null, ['class' => 'form-control']) !!}
</div>

<!-- Organizador Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('organizador', 'Organizador:') !!}
    {!! Form::text('organizador', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', ['Activo' => 'Activo', 'Cancelado' => 'Cancelado'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventos.index') !!}" class="btn btn-default">Cancel</a>
</div>
