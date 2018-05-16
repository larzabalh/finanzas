<!-- User Id Field -->
<!-- Condicion Field -->
    {!! Form::hidden('condicion', 1, ['class' => 'form-control']) !!}
    {!! Form::hidden('user_id', auth()->user()->id , ['class' => 'form-control']) !!}

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Disponibilidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disponibilidad_id', 'Disponibilidad Id:') !!}
    {!! Form::select('disponibilidad_id', $Disponibilidades, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('formaDePagos.index') !!}" class="btn btn-default">Cancel</a>
</div>
