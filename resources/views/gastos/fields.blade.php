<!-- UserId, Condicion Field -->
    {!! Form::hidden('user_id', auth()->user()->id, null, ['class' => 'form-control']) !!}
    {!! Form::hidden('condicion', 1, ['class' => 'form-control']) !!}

<!-- Gasto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gasto', 'Gasto:') !!}
    {!! Form::text('gasto', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo De Gasto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_de_gasto_id', 'Tipo De Gasto Id:') !!}
    {!! Form::select('tipo_de_gasto_id', $TipoDeGastos, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gastos.index') !!}" class="btn btn-default">Cancel</a>
</div>
