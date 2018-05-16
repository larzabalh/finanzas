<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $formaDePago->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Usuario:') !!}
    <p>{!! $formaDePago->user->name !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $formaDePago->nombre !!}</p>
</div>

<!-- Condicion Field -->
<div class="form-group">
    {!! Form::label('condicion', 'Condicion:') !!}
    <p>{!! $formaDePago->condicion !!}</p>
</div>

<!-- Disponibilidad Id Field -->
<div class="form-group">
    {!! Form::label('disponibilidad_id', 'Disponibilidad:') !!}
    <p>{!! $formaDePago->disponibilidad->nombre !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $formaDePago->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $formaDePago->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $formaDePago->deleted_at !!}</p>
</div>

