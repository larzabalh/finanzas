<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Gasto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gasto', 'Gasto:') !!}
    {!! Form::text('gasto', null, ['class' => 'form-control']) !!}
</div>

<!-- Condicion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('condicion', 'Condicion:') !!}
    {!! Form::text('condicion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo De Gasto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_de_gasto_id', 'Seleccione el tipo de Gasto') !!}
    {!! Form::select('tipo_de_gasto_id', $TipoDeGasto, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gastos.index') !!}" class="btn btn-default">Cancel</a>
</div>
