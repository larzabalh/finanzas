<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $gasto->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $gasto->user_id !!}</p>
</div>

<!-- Gasto Field -->
<div class="form-group">
    {!! Form::label('gasto', 'Gasto:') !!}
    <p>{!! $gasto->gasto !!}</p>
</div>

<!-- Condicion Field -->
<div class="form-group">
    {!! Form::label('condicion', 'Condicion:') !!}
    <p>{!! $gasto->condicion !!}</p>
</div>

<!-- Tipo De Gasto Id Field -->
<div class="form-group">
    {!! Form::label('tipo_de_gasto_id', 'Tipo De Gasto Id:') !!}
    <p>{!! $gasto->tipo_de_gasto_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $gasto->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $gasto->updated_at !!}</p>
</div>

