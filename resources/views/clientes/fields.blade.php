<!-- User Id Field -->
<!-- Condicion Field -->
    {!! Form::hidden('condicion', 1, ['class' => 'form-control']) !!}
    {!! Form::hidden('user_id', auth()->user()->id , ['class' => 'form-control']) !!}

<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! Form::text('cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Honorario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('honorario', 'Honorario:') !!}
    {!! Form::number('honorario', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Facturador Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facturador_id', 'Facturador Id:') !!}
    {!! Form::select('facturador_id', $Facturadores, null, ['class' => 'form-control']) !!}
</div>

<!-- Liquidador Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('liquidador_id', 'Liquidador Id:') !!}
    {!! Form::select('liquidador_id', $Liquidadores,null, ['class' => 'form-control']) !!}
</div>

<!-- Cobrador Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cobrador_id', 'Cobrador Id:') !!}
    {!! Form::select('cobrador_id', $Cobradores,null, ['class' => 'form-control']) !!}
</div>

<!-- Disponibilidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disponibilidad_id', 'Disponibilidad Id:') !!}
    {!! Form::select('disponibilidad_id', $Disponibilidades,null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto', 'Contacto:') !!}
    {!! Form::text('contacto', null, ['class' => 'form-control']) !!}
</div>

<!-- Comentario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comentario', 'Comentario:') !!}
    {!! Form::text('comentario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancel</a>
</div>
