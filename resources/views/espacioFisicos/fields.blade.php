<!-- Esp Fisico Field -->
<div class="form-group col-sm-4">
    {!! Form::label('esp_fisico', 'Espacio Fisico:') !!}
    {!! Form::text('esp_fisico', null, ['class' => 'form-control']) !!}
</div>

<!-- Ubicacion Field -->
<div class="form-group col-sm-4">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    <div class="">
        <select name="ubicacion" class="selectpicker form-control">
            <option value="0" >Planta Alta</option>
            <option value="1" >Planta Baja</option>
        </select>
    </div>
</div>

<!-- Capacidad Field -->
<div class="form-group col-sm-4">
    {!! Form::label('capacidad', 'Capacidad:') !!}
    {!! Form::number('capacidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Recursos Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('recursos', 'Recursos:') !!}
    {!! Form::textarea('recursos', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.espaciofisico.index') !!}" class="btn btn-default">Cancelar</a>
</div>
