<table class="table table-responsive" id="tipoDeGastos-table">
    <thead>
        <th>User Id</th>
        <th>Tipo</th>
        <th>Condicion</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
        {{$tipoDeGastos}}
    @foreach($tipoDeGastos as $tipoDeGasto)
        <tr>
            <td>{!! $tipoDeGasto->user->name !!}</td>
            
            <td>{!! $tipoDeGasto->tipo !!}</td>
            <td>{!! $tipoDeGasto->condicion !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoDeGastos.destroy', $tipoDeGasto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoDeGastos.show', [$tipoDeGasto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipoDeGastos.edit', [$tipoDeGasto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>