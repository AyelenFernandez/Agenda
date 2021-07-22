<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $evento->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('evento', 'Evento:') !!}
    <p>{!! $evento->evento !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('organizador', 'Organizador:') !!}
    <p>{!! $evento->organizador !!}</p>
</div>

<!-- Lugar Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{!! $evento->fecha !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $evento->estado !!}</p>
</div>

