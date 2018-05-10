<table class="table table-responsive" id="gastos-table">
    <thead>
        <th>User Id</th>
        <th>Gasto</th>
        <th>Condicion</th>
        <th>Tipo De Gasto Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($gastos as $gasto)
        <tr>
            <td>{!! $gasto->user->name !!}</td>
            <td>{!! $gasto->gasto !!}</td>
            <td>{!! $gasto->condicion !!}</td>
            <td>{!! $gasto->tipoDeGasto->tipo !!}</td>
            <td>
                {!! Form::open(['route' => ['gastos.destroy', $gasto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('gastos.show', [$gasto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('gastos.edit', [$gasto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>