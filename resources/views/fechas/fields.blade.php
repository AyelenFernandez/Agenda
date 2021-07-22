<!-- Entrada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Entrada', 'Entrada:') !!}
    {!! Form::text('Entrada', null, ['class' => 'form-control']) !!}
</div>

<!-- Salida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Salida', 'Salida:') !!}
    {!! Form::text('Salida', null, ['class' => 'form-control']) !!}
</div>

<!-- Evento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('evento_id', 'Evento Id:') !!}
    {!! Form::number('evento_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Espaciofisico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('espaciofisico_id', 'Espaciofisico Id:') !!}
    {!! Form::number('espaciofisico_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fechas.index') !!}" class="btn btn-default">Cancel</a>
</div>
