<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $cobrador->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $cobrador->user->name !!}</p>
</div>

<!-- Cobrador Field -->
<div class="form-group">
    {!! Form::label('cobrador', 'Cobrador:') !!}
    <p>{!! $cobrador->cobrador !!}</p>
</div>

<!-- Comentario Field -->
<div class="form-group">
    {!! Form::label('comentario', 'Comentario:') !!}
    <p>{!! $cobrador->comentario !!}</p>
</div>

<!-- Condicion Field -->
<div class="form-group">
    {!! Form::label('condicion', 'Condicion:') !!}
    <p>{!! $cobrador->condicion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $cobrador->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $cobrador->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $cobrador->deleted_at !!}</p>
</div>

