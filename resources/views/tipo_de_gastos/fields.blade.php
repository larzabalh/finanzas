<!-- User_Id,Condicion Field -->
	{!! Form::hidden('user_id', auth()->user()->id, null, ['class' => 'form-control']) !!}
    {!! Form::hidden('condicion', 1, ['class' => 'form-control']) !!}

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tipoDeGastos.index') !!}" class="btn btn-default">Cancel</a>
</div>
