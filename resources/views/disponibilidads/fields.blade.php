<!-- User Id Field -->
<!-- Condicion Field -->
    {!! Form::hidden('condicion', 1, ['class' => 'form-control']) !!}
    {!! Form::hidden('user_id', auth()->user()->id , ['class' => 'form-control']) !!}

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Comentario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comentario', 'Comentario:') !!}
    {!! Form::text('comentario', null, ['class' => 'form-control']) !!}
</div>

<!-- Medio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medio_id', 'Seleccionar Banco:') !!}
    {!! Form::select('medio_id', $Medios, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('disponibilidads.index') !!}" class="btn btn-default">Cancel</a>
</div>
